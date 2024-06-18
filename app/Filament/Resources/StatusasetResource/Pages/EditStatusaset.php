<?php

namespace App\Filament\Resources\StatusasetResource\Pages;

use App\Filament\Resources\StatusasetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatusaset extends EditRecord
{
    protected static string $resource = StatusasetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
