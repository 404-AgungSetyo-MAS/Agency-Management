<?php

namespace App\Filament\Resources\KeukategoriResource\Pages;

use App\Filament\Resources\KeukategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKeukategoris extends ListRecords
{
    protected static string $resource = KeukategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
