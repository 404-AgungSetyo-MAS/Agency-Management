<?php

namespace App\Filament\Resources\StatusdocResource\Pages;

use App\Filament\Resources\StatusdocResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewStatusdoc extends ViewRecord
{
    protected static string $resource = StatusdocResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\EditAction::make(),
    //     ];
    // }
}
