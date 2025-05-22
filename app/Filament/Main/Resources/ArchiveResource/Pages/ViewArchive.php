<?php

namespace App\Filament\Main\Resources\ArchiveResource\Pages;

use App\Filament\Main\Resources\ArchiveResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewArchive extends ViewRecord
{
    protected static string $resource = ArchiveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->visible(fn (): bool => auth()->user()->isArsip()),
        ];
    }
}
