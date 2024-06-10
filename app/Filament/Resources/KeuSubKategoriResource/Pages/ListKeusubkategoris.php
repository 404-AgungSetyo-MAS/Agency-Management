<?php

namespace App\Filament\Resources\KeusubkategoriResource\Pages;

use App\Filament\Resources\KeusubkategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKeusubkategoris extends ListRecords
{
    protected static string $resource = KeusubkategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('sub Kategori Keuangan baru'),
        ];
    }
}
