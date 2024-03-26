<?php

namespace App\Filament\Resources\SubMasutaResource\Pages;

use App\Filament\Resources\SubMasutaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubMasutas extends ListRecords
{
    protected static string $resource = SubMasutaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
