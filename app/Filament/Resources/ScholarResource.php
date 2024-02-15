<?php

namespace App\Filament\Resources;

use App\Actions\GenerateScholarsSummaryReport;
use App\Actions\GenerateWorksheetForScholarsProfileReport;
use App\Filament\Resources\ScholarResource\Pages;
use App\Models\Scholar;
use App\Models\ScholarshipType;
use Awcodes\TableRepeater\Components\TableRepeater;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
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
                        Select::make('campus_id')
                            ->required()
                            ->relationship('campus', 'name'),
                        Select::make('scholarship_status_id')
                            ->required()
                            ->relationship('scholarship_status', 'name')
                            ->preload()
                            ->default(1)
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                        Select::make('scholarship_type_id')
                            ->required()
                            ->live()
                            ->relationship('scholarship_type', 'name')
                            ->default(1)
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                        Select::make('scholarship_category_id')
                            ->required()
                            ->visible(fn ($get) => $get('scholarship_type_id') == 1)
                            ->relationship('scholarship_category', 'name')
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                        Select::make('degree_program_id')
                            ->required()
                            ->relationship('degree_program', 'name')
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                        Select::make('higher_education_institute_id')
                            ->required()
                            ->relationship('higher_education_institute', 'name')
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                    ])
                    ->columns(2),
                Section::make('Name')
                    ->schema([
                        TextInput::make('first_name')
                            ->required()
                            ->maxLength(125),
                        TextInput::make('last_name')
                            ->required()
                            ->maxLength(125),
                        TextInput::make('middle_initial')
                            ->maxLength(125),
                    ])
                    ->columns(3),
                Section::make('Contract Details')
                    ->schema([
                        DatePicker::make('contract_start_date')
                            ->native(false)
                            ->required(),
                        DatePicker::make('contract_end_date')
                            ->native(false)
                            ->required(),
                        TextInput::make('extension_period')
                            ->maxLength(125),
                        DatePicker::make('date_of_graduation')
                            ->native(false),
                        DatePicker::make('end_of_service_obligation_date')
                            ->native(false),
                        Textarea::make('remarks')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        Toggle::make('connected_to_hei')
                            ->label('Connected to HEI')
                            ->helperText('Is the scholar still connected with the Sending Higher Education Institution?'),
                        Toggle::make('extension_requested')
                            ->helperText('Does the scholar have a request for extension?'),
                        TextInput::make('extension_status')
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
                Action::make('scholars_profile')
                    ->action(function (Table $table, $livewire) {
                        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(storage_path('templates/' . 'revised scholars profile.xlsx'));
                        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
                        $worksheetTemplate = clone $spreadsheet->getActiveSheet();
                        $spreadsheet->removeSheetByIndex(0);
                        $path = storage_path('app/livewire-tmp/' . date_timestamp_get(now()) . '-scholars-profile.xlsx');
                        if ($livewire->tableFilters['scholarship_type']['value']) {
                            $scholarship_type = ScholarshipType::find($livewire->tableFilters['scholarship_type']['value']);
                            GenerateWorksheetForScholarsProfileReport::handle($table->getRecords()->collect(), $scholarship_type?->name, $worksheetTemplate, $spreadsheet);
                        } else {
                            $grouped_records = $table->getRecords()->groupBy('scholarship_type.name');
                            foreach ($grouped_records as $scholarship_type => $scholars) {
                                GenerateWorksheetForScholarsProfileReport::handle($scholars, $scholarship_type, $worksheetTemplate, $spreadsheet);
                            }
                        }
                        $writer->save($path);

                        return response()->download($path);
                    }),
                Action::make('scholars_summary')
                    ->action(function () {
                        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(storage_path('templates/' . 'scholars profile summary.xlsx'));
                        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
                        $path = storage_path('app/livewire-tmp/' . date_timestamp_get(now()) . '-scholars-summary.xlsx');
                        GenerateScholarsSummaryReport::handle($spreadsheet);
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
