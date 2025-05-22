<?php

namespace App\Filament\Main\Resources\MonetarytargetResource\Pages;

use App\Filament\Main\Resources\MonetarytargetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMonetarytargets extends ListRecords
{
    protected static string $resource = MonetarytargetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->visible(fn (): bool => auth()->user()->isKeua()),
        ];
    }
}
