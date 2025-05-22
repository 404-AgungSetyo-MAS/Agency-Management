<?php

namespace App\Filament\Main\Resources\KeukategoriResource\Pages;

use App\Filament\Main\Resources\KeukategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKeukategori extends ViewRecord
{
    protected static string $resource = KeukategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
