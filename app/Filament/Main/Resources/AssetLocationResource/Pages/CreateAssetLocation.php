<?php

namespace App\Filament\Main\Resources\AssetLocationResource\Pages;

use App\Filament\Main\Resources\AssetLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAssetLocation extends CreateRecord
{
    protected static string $resource = AssetLocationResource::class;
    protected function getRedirectUrl(): string
    {
        $resource = static::getResource();

        return $resource::getUrl('index');
    }
}
