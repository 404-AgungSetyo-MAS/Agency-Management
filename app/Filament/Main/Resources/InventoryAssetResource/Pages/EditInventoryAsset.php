<?php

namespace App\Filament\Main\Resources\InventoryAssetResource\Pages;

use App\Filament\Main\Resources\InventoryAssetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInventoryAsset extends EditRecord
{
    protected static string $resource = InventoryAssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        $resource = static::getResource();

        return $resource::getUrl('index');
    }
}
