<?php

namespace App\Filament\Resources\KeukategoriResource\Pages;

use App\Filament\Resources\KeukategoriResource;
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
