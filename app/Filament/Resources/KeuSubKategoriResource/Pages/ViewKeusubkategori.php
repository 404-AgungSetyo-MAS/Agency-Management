<?php

namespace App\Filament\Resources\KeusubkategoriResource\Pages;

use App\Filament\Resources\KeusubkategoriResource;
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
