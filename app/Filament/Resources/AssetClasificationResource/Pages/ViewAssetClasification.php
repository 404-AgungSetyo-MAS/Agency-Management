<?php

namespace App\Filament\Resources\AssetClasificationResource\Pages;

use App\Filament\Resources\AssetClasificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAssetClasification extends ViewRecord
{
    protected static string $resource = AssetClasificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
