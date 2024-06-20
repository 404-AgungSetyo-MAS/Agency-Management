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
            ExportColumn::make('full_code')->label('kode dokumen'),
            ExportColumn::make('nama')->label('nama dokumen'),
            ExportColumn::make('statusdoc.name')->label('status'),
            ExportColumn::make('detil_status'),
            ExportColumn::make('file'),
            ExportColumn::make('created_at')->label('Dokumen Dibuat'),
            ExportColumn::make('updated_at')->label('Terakhir diubah'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Data Arsip Telah di Ekspor sebanyak ' . number_format($export->successful_rows) . ' ' . ' Data.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
