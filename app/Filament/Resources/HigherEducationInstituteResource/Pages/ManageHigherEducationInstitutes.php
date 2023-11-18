<?php

namespace App\Filament\Resources\HigherEducationInstituteResource\Pages;

use App\Filament\Resources\HigherEducationInstituteResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageHigherEducationInstitutes extends ManageRecords
{
    protected static string $resource = HigherEducationInstituteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
