<?php

namespace App\Filament\Resources\StatusdocResource\Pages;

use App\Filament\Resources\StatusdocResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatusdoc extends EditRecord
{
    protected static string $resource = StatusdocResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\ViewAction::make(),
    //         Actions\DeleteAction::make(),
    //     ];
    // }
}
