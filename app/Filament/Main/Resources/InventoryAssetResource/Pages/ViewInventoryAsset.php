<?php

namespace App\Filament\Main\Resources\InventoryAssetResource\Pages;

use App\Filament\Main\Resources\InventoryAssetResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewInventoryAsset extends ViewRecord
{
    protected static string $resource = InventoryAssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
