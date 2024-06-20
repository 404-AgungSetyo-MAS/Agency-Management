<?php

namespace App\Filament\Resources\MonetaryResource\Pages;

use App\Filament\Resources\MonetaryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMonetary extends EditRecord
{
    protected static string $resource = MonetaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        $resource = static::getResource();

        return $resource::getUrl('index');
    }
}
