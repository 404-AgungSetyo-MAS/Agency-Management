<?php

namespace App\Filament\Main\Resources\MasutaResource\Pages;

use App\Filament\Main\Resources\MasutaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMasuta extends ViewRecord
{
    protected static string $resource = MasutaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
