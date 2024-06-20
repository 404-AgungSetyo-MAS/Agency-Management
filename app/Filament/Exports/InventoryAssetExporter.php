<?php

namespace App\Filament\Exports;

use App\Models\InventoryAsset;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class InventoryAssetExporter extends Exporter
{
    protected static ?string $model = InventoryAsset::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('code')->label('Kode Aset'),
            ExportColumn::make('assetLocation.name')->label('Lokasi Aset'),
            ExportColumn::make('nama')->label('Nama Aset'),
            ExportColumn::make('description')->label('Deskripsi Aset'),
            ExportColumn::make('statusaset')->label('Status'),
            ExportColumn::make('tanggal')->label('Tanggal Masuk'),
            ExportColumn::make('updated_at')->label('Terakhir Diubah'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Data Keuangan Telah di Ekspor sebanyak ' . number_format($export->successful_rows) . ' ' . ' Data.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
