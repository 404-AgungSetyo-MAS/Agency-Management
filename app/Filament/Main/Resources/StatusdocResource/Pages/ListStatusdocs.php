<?php

namespace App\Filament\Main\Resources\StatusdocResource\Pages;

use App\Filament\Main\Resources\StatusdocResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatusdocs extends ListRecords
{
    protected static string $resource = StatusdocResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make()
            // ->visible(fn (): bool => auth()->user()->isArsip()),
        ];
    }
}
