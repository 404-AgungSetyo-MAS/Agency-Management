<?php

namespace App\Filament\Resources\KeukategoriResource\Pages;

use App\Filament\Resources\KeukategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKeukategori extends EditRecord
{
    protected static string $resource = KeukategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
