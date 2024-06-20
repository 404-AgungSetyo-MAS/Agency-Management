<?php

namespace App\Filament\Widgets;

use App\Models\Employee;
use App\Models\InventoryAsset;
use App\Models\Monetary;
use App\Models\Monetarytarget;
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
            ->color('warning'),

            Stat::make('Barang dan Aset', InventoryAsset::query()->count())
            ->description('Total Barang dan Aset')
            ->color('success'),
        ];
    }
        protected function getColumns(): int
    {
        return 2;
    }
}
