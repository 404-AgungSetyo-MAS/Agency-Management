<?php

namespace App\Filament\Main\Resources\EmployeeResource\Pages;

use App\Filament\Main\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEmployee extends ViewRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
            ->visible(fn (): bool => auth()->user()->isKepeg()),
        ];
    }
}
