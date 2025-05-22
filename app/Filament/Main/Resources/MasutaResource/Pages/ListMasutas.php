<?php

namespace App\Filament\Main\Resources\MasutaResource\Pages;

use App\Filament\Main\Resources\MasutaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasutas extends ListRecords
{
    protected static string $resource = MasutaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Klasifikasi Dokumen Baru')
                ->visible(fn (): bool => auth()->user()->isArsip()),
        ];
    }
}
