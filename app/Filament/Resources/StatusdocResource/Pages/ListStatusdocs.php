<?php

namespace App\Filament\Resources\StatusdocResource\Pages;

use App\Filament\Resources\StatusdocResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatusdocs extends ListRecords
{
    protected static string $resource = StatusdocResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
