<?php

namespace App\Filament\Resources\StatusasetResource\Pages;

use App\Filament\Resources\StatusasetResource;
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
