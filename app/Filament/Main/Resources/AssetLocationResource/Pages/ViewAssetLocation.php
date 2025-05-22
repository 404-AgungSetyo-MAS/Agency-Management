<?php

namespace App\Filament\Main\Resources\AssetLocationResource\Pages;

use App\Filament\Main\Resources\AssetLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAssetLocation extends ViewRecord
{
    protected static string $resource = AssetLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
