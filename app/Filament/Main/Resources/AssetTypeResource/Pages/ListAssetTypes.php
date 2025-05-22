<?php

namespace App\Filament\Main\Resources\AssetTypeResource\Pages;

use App\Filament\Main\Resources\AssetTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssetTypes extends ListRecords
{
    protected static string $resource = AssetTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tipe Aset Baru')
                ->visible(fn (): bool => auth()->user()->isAset()),
        ];
    }
}
