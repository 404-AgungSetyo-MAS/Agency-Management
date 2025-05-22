<?php

namespace App\Filament\Main\Resources\KeusubkategoriResource\Pages;

use App\Filament\Main\Resources\KeusubkategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKeusubkategoris extends ListRecords
{
    protected static string $resource = KeusubkategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('sub Kategori Keuangan baru')
                ->visible(fn (): bool => auth()->user()->isKeua()),
        ];
    }
}
