<?php

namespace App\Filament\Main\Resources\SubSubMasutaResource\Pages;

use App\Filament\Main\Resources\SubSubMasutaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubSubMasutas extends ListRecords
{
    protected static string $resource = SubSubMasutaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('sub sub klasifikasi dokumen baru')
                ->visible(fn (): bool => auth()->user()->isArsip()),
        ];
    }
}
