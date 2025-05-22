<?php

namespace App\Filament\Main\Resources\AssetSubTypeResource\Pages;

use App\Filament\Main\Resources\AssetSubTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAssetSubType extends ViewRecord
{
    protected static string $resource = AssetSubTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
