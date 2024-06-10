<?php

namespace App\Filament\Resources\AssetSubTypeResource\Pages;

use App\Filament\Resources\AssetSubTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssetSubTypes extends ListRecords
{
    protected static string $resource = AssetSubTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('sub Tipe Aset Baru'),
        ];
    }
}
