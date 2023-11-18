<?php

namespace App\Filament\Resources;

use App\Exports\ScholarExport;
use App\Filament\Resources\ScholarResource\Pages;
use App\Filament\Resources\ScholarResource\RelationManagers;
use App\Models\Scholar;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Maatwebsite\Excel\Facades\Excel;
use OpenSpout\Common\Entity\Row;
use OpenSpout\Writer\XLSX\Options;
use OpenSpout\Writer\XLSX\Writer;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use Spatie\SimpleExcel\SimpleExcelWriter;

class ScholarResource extends Resource
{
    protected static ?string $model = Scholar::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('profile_photo')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '1:1',
                    ])
                    ->disk('profile_photos'),
                Section::make('Scholarship Details')
                    ->schema([
                        Forms\Components\Select::make('scholarship_status_id')
                            ->required()
                            ->relationship('scholarship_status', 'name')
                            ->preload()
                            ->default(1)
                            ->searchable()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                            ]),
                        Forms\Components\Select::make('scholarship_type_id')
                            ->required()
                            ->live()
                            ->relationship('scholarship_type', 'name')
                            ->default(1)
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                            ]),
                        Forms\Components\Select::make('scholarship_category_id')
                            ->required()
                            ->visible(fn ($get) => $get('scholarship_type_id') == 1)
                            ->relationship('scholarship_category', 'name')
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                            ]),
                        Forms\Components\Select::make('degree_program_id')
                            ->required()
                            ->relationship('degree_program', 'name')
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                            ]),
                        Forms\Components\Select::make('higher_education_institute_id')
                            ->required()
                            ->relationship('higher_education_institute', 'name')
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                            ]),
                    ])
                    ->columns(2),
                Section::make('Name')
                    ->schema([
                        Forms\Components\TextInput::make('first_name')
                            ->required()
                            ->maxLength(125),
                        Forms\Components\TextInput::make('last_name')
                            ->required()
                            ->maxLength(125),
                        Forms\Components\TextInput::make('middle_initial')
                            ->maxLength(125),
                    ])
                    ->columns(3),
                Section::make('Contract Details')
                    ->schema([
                        Forms\Components\DatePicker::make('contract_start_date')
                            ->native(false)
                            ->required(),
                        Forms\Components\DatePicker::make('contract_end_date')
                            ->native(false)
                            ->required(),
                        Forms\Components\TextInput::make('extension_period')
                            ->maxLength(125),
                        Forms\Components\DatePicker::make('date_of_graduation')
                            ->native(false),
                        Forms\Components\DatePicker::make('end_of_service_obligation_date')
                            ->native(false),
                        Forms\Components\Textarea::make('remarks')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('connected_to_hei')
                            ->label('Connected to HEI')
                            ->helperText("Is the scholar still connected with the Sending Higher Education Institution?"),
                        Forms\Components\Toggle::make('extension_requested')
                            ->helperText("Does the scholar have a request for extension?"),
                        Forms\Components\TextInput::make('extension_status')
                            ->columnSpanFull()
                            ->maxLength(125),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('profile_photo')->disk('profile_photos')->alignCenter()->label('')->height(100)->circular(),
                Tables\Columns\TextColumn::make('alt_full_name')
                    ->label('Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('scholarship_status.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('scholarship_type.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('scholarship_category.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('degree_program.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('higher_education_institute.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('contract_start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contract_end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('extension_period')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_of_graduation')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_of_service_obligation_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('connected_to_hei')
                    ->boolean(),
                Tables\Columns\IconColumn::make('extension_requested')
                    ->boolean(),
                Tables\Columns\TextColumn::make('extension_status')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                Action::make('export')
                    ->action(function ($table) {
                        // return Excel::download((new ScholarExport($table->getRecords())), 'scholars.xlsx');
                        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(storage_path('templates/' . 'scholars.xlsx'));
                        $worksheet = $spreadsheet->getActiveSheet();
                        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
                        $path = storage_path('app/livewire-tmp/' . date_timestamp_get(now()) .  '-scholars.xlsx');
                        $activeRow = 4;
                        $table->getRecords()->each(function (Scholar $scholar) use ($writer, $worksheet, &$activeRow) {
                            $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                            $drawing->setPath(storage_path('app/public/profile_photos/' . $scholar->profile_photo));
                            $drawing->setHeight(100);
                            $drawing->setWidth(100);
                            $drawing->setCoordinates('A' . $activeRow);
                            $drawing->setWorksheet($worksheet);
                            $drawing->setOffsetX(20);
                            $worksheet->getRowDimension($activeRow)->setRowHeight(100, 'px');
                            $worksheet->fromArray([
                                'Name' => $scholar->full_name,
                                'Type of Scholarship' => $scholar->scholarship_type->name,
                                'Category' => $scholar->scholarship_category?->name,
                                'Degree Program' => $scholar->degree_program->name,
                                'Delivering HEI' => $scholar->higher_education_institute->name,
                                'Contract Period' => $scholar->contract_start_date->format('F Y') . ' - ' . $scholar->contract_end_date->format('F Y'),
                                'Extension Period' => $scholar->extension_period,
                                'Status' => $scholar->scholarship_status->name,
                                'Date of Graduation' => $scholar->date_of_graduation?->format('m/d/Y'),
                                'Number of Service Obligation' => $scholar->contract_start_date?->startOfYear()->diffInYears($scholar->contract_end_date?->startOfYear()) == 0 ? 2 :  $scholar->contract_start_date?->startOfYear()->diffInYears($scholar->contract_end_date?->startOfYear()) * 2,
                                'End of Service Obligation' => $scholar->end_of_service_obligation_date?->format('m/d/Y'),
                                'Remarks' => $scholar->remarks,
                                'Is the scholar still connected with the Sending Higher Education Institution? (Yes / No)' => $scholar->connected_to_hei ? 'Yes' : 'No',
                                'The scholar is no longer connected due to: (Resignation, Termination, Health Reasons, Others)' => '',
                                'Does the scholar have a request for extension? (Yes / No)' => $scholar->extension_requested ? 'Yes' : 'No',
                                'If yes, what is the status of the request? (Pending, Approved, Disapproved)' => $scholar->extension_status
                            ], null, 'B' . $activeRow, true);
                            $activeRow++;
                        });
                        $writer->save($path);
                        return response()->download($path);
                    })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageScholars::route('/'),
        ];
    }


    // $options = new Options();
    // $writer = new Writer($options);
    // $writer->openToFile(storage_path('app/livewire-tmp/' . date_timestamp_get(now()) .  '-scholars.xlsx'));
    // // $writer = SimpleExcelWriter::create(storage_path('app/livewire-tmp/' . date_timestamp_get(now()) .  '-scholars.xlsx'));
    // $table->getRecords()->each(function (Scholar $scholar) use ($writer) {
    //     $writer->addRow(Row::fromValues([
    //         'Name' => $scholar->full_name,
    //         'Type of Scholarship' => $scholar->scholarship_type->name,
    //         'Category' => $scholar->scholarship_category?->name,
    //         'Degree Program' => $scholar->degree_program->name,
    //         'Delivering HEI' => $scholar->higher_education_institute->name,
    //         'Contract Period' => $scholar->contract_start_date->format('F Y') . ' - ' . $scholar->contract_end_date->format('F Y'),
    //         'Extension Period' => $scholar->extension_period,
    //         'Status' => $scholar->scholarship_status->name,
    //         'Date of Graduation' => $scholar->date_of_graduation?->format('m/d/Y'),
    //         'Number of Service Obligation' => ($scholar->contract_start_date?->startOfYear()->diffInYears($scholar->contract_end_date?->startOfYear()) ?? 1) * 2,
    //         'End of Service Obligation' => $scholar->end_of_service_obligation_date?->format('m/d/Y'),
    //         'Remarks' => $scholar->remarks,
    //         'Is the scholar still connected with the Sending Higher Education Institution? (Yes / No)' => $scholar->connected_to_hei ? 'Yes' : 'No',
    //         'The scholar is no longer connected due to: (Resignation, Termination, Health Reasons, Others)' => '',
    //         'Does the scholar have a request for extension? (Yes / No)' => $scholar->extension_requested ? 'Yes' : 'No',
    //         'If yes, what is the status of the request? (Pending, Approved, Disapproved)' => $scholar->extension_status
    //     ]));
    //     // $writer->addRow([
    //     //     'Name' => $scholar->full_name,
    //     //     'Type of Scholarship' => $scholar->scholarship_type->name,
    //     //     'Category' => $scholar->scholarship_category?->name,
    //     //     'Degree Program' => $scholar->degree_program->name,
    //     //     'Delivering HEI' => $scholar->higher_education_institute->name,
    //     //     'Contract Period' => $scholar->contract_start_date->format('F Y') . ' - ' . $scholar->contract_end_date->format('F Y'),
    //     //     'Extension Period' => $scholar->extension_period,
    //     //     'Status' => $scholar->scholarship_status->name,
    //     //     'Date of Graduation' => $scholar->date_of_graduation?->format('m/d/Y'),
    //     //     'Number of Service Obligation' => ($scholar->contract_start_date?->startOfYear()->diffInYears($scholar->contract_end_date?->startOfYear()) ?? 1) * 2,
    //     //     'End of Service Obligation' => $scholar->end_of_service_obligation_date?->format('m/d/Y'),
    //     //     'Remarks' => $scholar->remarks,
    //     //     'Is the scholar still connected with the Sending Higher Education Institution? (Yes / No)' => $scholar->connected_to_hei ? 'Yes' : 'No',
    //     //     'The scholar is no longer connected due to: (Resignation, Termination, Health Reasons, Others)' => '',
    //     //     'Does the scholar have a request for extension? (Yes / No)' => $scholar->extension_requested ? 'Yes' : 'No',
    //     //     'If yes, what is the status of the request? (Pending, Approved, Disapproved)' => $scholar->extension_status
    //     // ]);
    // });
    // return response()->download($writer->getPath());
}
