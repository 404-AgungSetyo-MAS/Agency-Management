<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Exports\EmployeeExporter;
use App\Filament\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Resources\Pages\ListRecords;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Data Baru'),
            Actions\ExportAction::make()->label('Export')
            ->exporter(EmployeeExporter::class)
            ->formats([
                ExportFormat::Xlsx,
            ]),
        ];
    }
}
