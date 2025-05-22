<?php

namespace App\Filament\Main\Resources\MasutaResource\Pages;

use App\Filament\Main\Resources\MasutaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMasuta extends EditRecord
{
    protected static string $resource = MasutaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
