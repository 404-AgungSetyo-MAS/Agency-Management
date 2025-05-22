<?php

namespace App\Filament\Main\Resources\SubMasutaResource\Pages;

use App\Filament\Main\Resources\SubMasutaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSubMasuta extends ViewRecord
{
    protected static string $resource = SubMasutaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
