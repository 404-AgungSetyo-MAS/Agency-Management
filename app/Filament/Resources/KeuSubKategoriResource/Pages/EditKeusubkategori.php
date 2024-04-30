<?php

namespace App\Filament\Resources\KeusubkategoriResource\Pages;

use App\Filament\Resources\KeusubkategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKeusubkategori extends EditRecord
{
    protected static string $resource = KeusubkategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
