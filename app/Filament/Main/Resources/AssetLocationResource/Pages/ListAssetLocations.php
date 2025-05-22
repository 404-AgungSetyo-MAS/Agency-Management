<?php

namespace App\Filament\Main\Resources\AssetLocationResource\Pages;

use App\Filament\Main\Resources\AssetLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssetLocations extends ListRecords
{
    protected static string $resource = AssetLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Lokasi Aset Baru')
                ->visible(fn (): bool => auth()->user()->isAset()),
        ];
    }
}
