<?php

namespace App\Filament\Main\Resources\SubSubMasutaResource\Pages;

use App\Filament\Main\Resources\SubSubMasutaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSubSubMasuta extends ViewRecord
{
    protected static string $resource = SubSubMasutaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
