<?php

namespace App\Filament\Exports;

use App\Models\Employee;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class EmployeeExporter extends Exporter
{
    protected static ?string $model = Employee::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('nama_lengkap'),
            ExportColumn::make('nomor_telepon'),
            ExportColumn::make('email')->label('E-Mail'),
            ExportColumn::make('tempat_lahir'),
            ExportColumn::make('tgl_lahir')->label('Tanggal Lahir'),
            ExportColumn::make('jenis_kelamin'),
            ExportColumn::make('agama'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Data Pegawai Telah di Ekspor sebanyak ' . number_format($export->successful_rows) . ' ' . ' Data.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
