<?php

namespace App\Filament\Resources\MonetarytargetResource\Pages;

use App\Filament\Resources\MonetarytargetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMonetarytargets extends ListRecords
{
    protected static string $resource = MonetarytargetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
