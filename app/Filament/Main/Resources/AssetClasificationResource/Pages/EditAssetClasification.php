<?php

namespace App\Filament\Main\Resources\AssetClasificationResource\Pages;

use App\Filament\Main\Resources\AssetClasificationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssetClasification extends EditRecord
{
    protected static string $resource = AssetClasificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
