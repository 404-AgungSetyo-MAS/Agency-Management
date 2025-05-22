<?php

namespace App\Filament\Main\Resources\KeukategoriResource\Pages;

use App\Filament\Main\Resources\KeukategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKeukategoris extends ListRecords
{
    protected static string $resource = KeukategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Kategori Keuangan Baru')
                ->visible(fn (): bool => auth()->user()->isKeua()),
        ];
    }
}
