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
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('img'),
            ExportColumn::make('code'),
            ExportColumn::make('assetClasification.id'),
            ExportColumn::make('assetType.id'),
            ExportColumn::make('assetSubType.id'),
            ExportColumn::make('assetLocation.id'),
            ExportColumn::make('tanggal'),
            ExportColumn::make('nama'),
            ExportColumn::make('description'),
            ExportColumn::make('statusaset'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your inventory asset export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
