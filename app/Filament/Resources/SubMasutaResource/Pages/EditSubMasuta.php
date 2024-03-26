<?php

namespace App\Filament\Resources\SubMasutaResource\Pages;

use App\Filament\Resources\SubMasutaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubMasuta extends EditRecord
{
    protected static string $resource = SubMasutaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
