<?php

namespace App\Filament\Resources\StatusasetResource\Pages;

use App\Filament\Resources\StatusasetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatusasets extends ListRecords
{
    protected static string $resource = StatusasetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
