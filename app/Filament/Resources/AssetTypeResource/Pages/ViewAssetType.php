<?php

namespace App\Filament\Resources\AssetTypeResource\Pages;

use App\Filament\Resources\AssetTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAssetType extends ViewRecord
{
    protected static string $resource = AssetTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
