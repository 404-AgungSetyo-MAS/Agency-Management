<?php

namespace App\Filament\Resources\MasutaResource\Pages;

use App\Filament\Resources\MasutaResource;
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
