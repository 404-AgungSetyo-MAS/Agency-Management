<?php

namespace App\Filament\Resources\AssetClasificationResource\Pages;

use App\Filament\Resources\AssetClasificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssetClasifications extends ListRecords
{
    protected static string $resource = AssetClasificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Klasifiksi Aset Baru'),
        ];
    }
}
