<?php

namespace App\Filament\Main\Resources\MonetaryResource\Pages;

use App\Filament\Main\Resources\MonetaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMonetary extends ViewRecord
{
    protected static string $resource = MonetaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
