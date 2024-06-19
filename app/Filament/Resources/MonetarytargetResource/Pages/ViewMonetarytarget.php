<?php

namespace App\Filament\Resources\MonetarytargetResource\Pages;

use App\Filament\Resources\MonetarytargetResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMonetarytarget extends ViewRecord
{
    protected static string $resource = MonetarytargetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
