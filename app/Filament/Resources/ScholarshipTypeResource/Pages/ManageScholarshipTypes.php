<?php

namespace App\Filament\Resources\ScholarshipTypeResource\Pages;

use App\Filament\Resources\ScholarshipTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageScholarshipTypes extends ManageRecords
{
    protected static string $resource = ScholarshipTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
