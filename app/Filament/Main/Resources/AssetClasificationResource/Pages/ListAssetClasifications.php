<?php

namespace App\Filament\Main\Resources\AssetClasificationResource\Pages;

use App\Filament\Main\Resources\AssetClasificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssetClasifications extends ListRecords
{
    protected static string $resource = AssetClasificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Klasifiksi Aset Baru')
                ->visible(fn (): bool => auth()->user()->isAset()),
        ];
    }
}
