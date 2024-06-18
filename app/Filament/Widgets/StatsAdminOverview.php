<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use App\Models\InventoryAsset;
use App\Models\Monetary;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Pegawai', Employee::query()->count())
            ->description('Total Pegawai')
            ->color('info'),
            Stat::make('Barang dan Aset', InventoryAsset::query()->count())
            ->description('Total Barang dan Aset')
            ->color('success'),
            Stat::make('Keuangan', Monetary::query()->whereYear('tanggal', Carbon::parse(Carbon::now()))->sum('value'))
            ->label('')
            ->description('Total Pengeluaran Tahun ini')
            ->chart([7, 2, 10, 17, 15, 4, 17])
            ->color('danger'),
            Stat::make('Keuangan', Monetary::query()->whereMonth('tanggal', Carbon::parse(Carbon::now()))->sum('value'))
            ->label('')
            ->description('Total Pengeluaran Bulan ini')
            ->color('warning'),
        ];
    }
}
