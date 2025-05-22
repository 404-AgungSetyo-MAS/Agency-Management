<?php

namespace App\Filament\Main\Resources\KeusubkategoriResource\Pages;

use App\Filament\Main\Resources\KeusubkategoriResource;
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
