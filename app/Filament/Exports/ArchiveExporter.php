<?php

namespace App\Filament\Exports;

use App\Models\Archive;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class ArchiveExporter extends Exporter
{
    protected static ?string $model = Archive::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            // ExportColumn::make('masuta_id'),
            // ExportColumn::make('subMasuta.name'),
            // ExportColumn::make('subSubMasuta.name'),
            ExportColumn::make('full_code')->label('kode dokumen'),
            ExportColumn::make('nama')->label('nama dokumen'),
            ExportColumn::make('statusdoc.name')->label('status'),
            ExportColumn::make('detil_status'),
            // ExportColumn::make('file'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your archive export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
