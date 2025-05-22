<?php

namespace App\Filament\Main\Resources\ArchiveResource\Pages;

use App\Filament\Main\Resources\ArchiveResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArchive extends EditRecord
{
    protected static string $resource = ArchiveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make()
                ->visible(fn (): bool => auth()->user()->isArsip()),
            Actions\DeleteAction::make()
                ->visible(fn (): bool => auth()->user()->isArsip()),
        ];
    }
    protected function getRedirectUrl(): string
    {
        $resource = static::getResource();

        return $resource::getUrl('index');
    }
}
