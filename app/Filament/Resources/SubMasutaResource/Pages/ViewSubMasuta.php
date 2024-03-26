<?php

namespace App\Filament\Resources\SubMasutaResource\Pages;

use App\Filament\Resources\SubMasutaResource;
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
