<?php

namespace App\Filament\Main\Resources\MonetarytargetResource\Pages;

use App\Filament\Main\Resources\MonetarytargetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMonetarytarget extends EditRecord
{
    protected static string $resource = MonetarytargetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
