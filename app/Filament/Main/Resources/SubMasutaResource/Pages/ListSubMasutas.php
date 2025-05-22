<?php

namespace App\Filament\Main\Resources\SubMasutaResource\Pages;

use App\Filament\Main\Resources\SubMasutaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubMasutas extends ListRecords
{
    protected static string $resource = SubMasutaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('sub klasifikasi dokumen')
                ->visible(fn (): bool => auth()->user()->isArsip()),
        ];
    }
}
