<?php

namespace App\Filament\Resources\AssetSubTypeResource\Pages;

use App\Filament\Resources\AssetSubTypeResource;
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
