<?php

namespace App\Filament\Resources\ScholarshipCategoryResource\Pages;

use App\Filament\Resources\ScholarshipCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageScholarshipCategories extends ManageRecords
{
    protected static string $resource = ScholarshipCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
