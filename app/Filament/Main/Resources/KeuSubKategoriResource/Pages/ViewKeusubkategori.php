<?php

namespace App\Filament\Main\Resources\KeusubkategoriResource\Pages;

use App\Filament\Main\Resources\KeusubkategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKeusubkategori extends ViewRecord
{
    protected static string $resource = KeusubkategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
