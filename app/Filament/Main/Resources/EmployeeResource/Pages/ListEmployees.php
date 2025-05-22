<?php

namespace App\Filament\Main\Resources\EmployeeResource\Pages;

use App\Filament\Exports\EmployeeExporter;
use App\Filament\Main\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Resources\Pages\ListRecords;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Data Baru')
            ->visible(fn (): bool => auth()->user()->isKepeg()),
            Actions\ExportAction::make()->label('Export')
            ->visible(fn (): bool => auth()->user()->isKepeg())
            ->exporter(EmployeeExporter::class)
            ->formats([
                ExportFormat::Xlsx,
            ]),
        ];
    }
}
