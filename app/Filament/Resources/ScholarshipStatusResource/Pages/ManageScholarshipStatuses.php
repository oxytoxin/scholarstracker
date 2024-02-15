<?php

namespace App\Filament\Resources\ScholarshipStatusResource\Pages;

use App\Filament\Resources\ScholarshipStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageScholarshipStatuses extends ManageRecords
{
    protected static string $resource = ScholarshipStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
