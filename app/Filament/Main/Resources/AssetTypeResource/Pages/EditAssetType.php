<?php

namespace App\Filament\Main\Resources\AssetTypeResource\Pages;

use App\Filament\Main\Resources\AssetTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssetType extends EditRecord
{
    protected static string $resource = AssetTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
