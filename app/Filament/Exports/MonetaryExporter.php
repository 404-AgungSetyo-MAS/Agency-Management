<?php

namespace App\Filament\Exports;

use App\Models\Monetary;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class MonetaryExporter extends Exporter
{
    protected static ?string $model = Monetary::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('code')->label('Kode Dokumen'),
            ExportColumn::make('name')->label('Nama Dokumen'),
            ExportColumn::make('value')->label('Nominal'),
            ExportColumn::make('tanggal'),
            ExportColumn::make('updated_at')->label('terakhir diubah'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Data Keuangan Telah di Ekspor ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' ter-Ekspor.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
