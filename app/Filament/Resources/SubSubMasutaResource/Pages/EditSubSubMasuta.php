<?php

namespace App\Filament\Resources\SubSubMasutaResource\Pages;

use App\Filament\Resources\SubSubMasutaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubSubMasuta extends EditRecord
{
    protected static string $resource = SubSubMasutaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
