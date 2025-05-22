<?php

namespace App\Filament\Main\Resources\AssetSubTypeResource\Pages;

use App\Filament\Main\Resources\AssetSubTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssetSubType extends EditRecord
{
    protected static string $resource = AssetSubTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
