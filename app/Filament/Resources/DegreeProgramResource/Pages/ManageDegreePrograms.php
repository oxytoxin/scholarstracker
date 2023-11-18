<?php

namespace App\Filament\Resources\DegreeProgramResource\Pages;

use App\Filament\Resources\DegreeProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDegreePrograms extends ManageRecords
{
    protected static string $resource = DegreeProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
