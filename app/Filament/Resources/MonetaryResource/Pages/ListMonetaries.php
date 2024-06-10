<?php

namespace App\Filament\Resources\MonetaryResource\Pages;

use App\Filament\Resources\MonetaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMonetaries extends ListRecords
{
    protected static string $resource = MonetaryResource::class;
    protected static ?string $title = 'Data Keuangan';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Buat Data Keuangan baru'),
        ];
    }
}
