<?php

namespace App\Filament\Main\Resources\StatusasetResource\Pages;

use App\Filament\Main\Resources\StatusasetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatusasets extends ListRecords
{
    protected static string $resource = StatusasetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->visible(fn (): bool => auth()->user()->isAset()),
        ];
    }
}
