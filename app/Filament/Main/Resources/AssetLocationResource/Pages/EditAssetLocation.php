<?php

namespace App\Filament\Main\Resources\AssetLocationResource\Pages;

use App\Filament\Main\Resources\AssetLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssetLocation extends EditRecord
{
    protected static string $resource = AssetLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
