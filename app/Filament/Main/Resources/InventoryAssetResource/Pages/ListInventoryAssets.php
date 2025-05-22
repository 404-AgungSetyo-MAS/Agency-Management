<?php

namespace App\Filament\Main\Resources\InventoryAssetResource\Pages;

use App\Filament\Main\Resources\InventoryAssetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInventoryAssets extends ListRecords
{
    protected static string $resource = InventoryAssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Masukkan Aset Baru')
                ->visible(fn (): bool => auth()->user()->isAset()),
        ];
    }
}
