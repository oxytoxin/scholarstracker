<?php

namespace App\Filament\Resources;

use App\Exports\ScholarExport;
use App\Filament\Resources\ScholarResource\Pages;
use App\Filament\Resources\ScholarResource\RelationManagers;
use App\Models\Scholar;
use Awcodes\FilamentTableRepeater\Components\TableRepeater;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
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
                        Forms\Components\Select::make('campus_id')
                            ->required()
                            ->relationship('campus', 'name'),
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
                    ->columns(2),
                TableRepeater::make('reentry_plan')
                    ->schema([
                        DatePicker::make('date')
                            ->date(),
                        Textarea::make('plan')
                            ->required(),
                    ])
                    ->hideLabels()
                    ->columnSpanFull(),
                TableRepeater::make('updates')
                    ->schema([
                        DatePicker::make('date')
                            ->default(today())
                            ->date(),
                        Textarea::make('details')
                            ->required(),
                    ])
                    ->hideLabels()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('profile_photo')->disk('profile_photos')->alignCenter()->label('')->height(100)->circular(),
                TextColumn::make('alt_full_name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('campus.name')
                    ->sortable(),
                TextColumn::make('scholarship_status.name')
                    ->sortable(),
                TextColumn::make('scholarship_type.name')
                    ->sortable(),
                TextColumn::make('scholarship_category.name')
                    ->sortable(),
                TextColumn::make('degree_program.name')
                    ->sortable(),
                TextColumn::make('higher_education_institute.name')
                    ->sortable(),
                TextColumn::make('contract_start_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('contract_end_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('extension_period')
                    ->searchable(),
                TextColumn::make('date_of_graduation')
                    ->date()
                    ->sortable(),
                TextColumn::make('end_of_service_obligation_date')
                    ->date()
                    ->sortable(),
                IconColumn::make('connected_to_hei')
                    ->boolean(),
                IconColumn::make('extension_requested')
                    ->boolean(),
                TextColumn::make('extension_status'),
            ])
            ->filters([
                SelectFilter::make('scholarship_status')
                    ->relationship('scholarship_status', 'name'),
                SelectFilter::make('scholarship_type')
                    ->relationship('scholarship_type', 'name'),
                SelectFilter::make('scholarship_category')
                    ->relationship('scholarship_category', 'name'),
                SelectFilter::make('degree_program')
                    ->relationship('degree_program', 'name'),
                SelectFilter::make('campus')
                    ->relationship('campus', 'name'),
                SelectFilter::make('higher_education_institute')
                    ->searchable()
                    ->preload()
                    ->relationship('higher_education_institute', 'name'),
            ])
            ->filtersLayout(FiltersLayout::AboveContent)
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->headerActions([
                Action::make('export')
                    ->action(function (Table $table) {
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
                                'Name' => $scholar->alt_full_name,
                                'Campus' => $scholar->campus?->name,
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
}
