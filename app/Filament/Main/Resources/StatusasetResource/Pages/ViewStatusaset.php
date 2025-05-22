<?php

namespace App\Filament\Main\Resources\StatusasetResource\Pages;

use App\Filament\Main\Resources\StatusasetResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewStatusaset extends ViewRecord
{
    protected static string $resource = StatusasetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
