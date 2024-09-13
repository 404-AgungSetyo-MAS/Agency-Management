<?php

namespace App\Filament\Widgets;

use App\Models\Monetary;
use App\Models\Monetarytarget;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MonetaryStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Keuangan', 'Rp.'.' '.number_format(Monetarytarget::query()->whereYear('tanggal_target', Carbon::parse(Carbon::now()))->sum('nominal')))
            ->label('')
            ->description('Target Pengeluaran Tahun ini')
            ->color('info'),

            Stat::make('Keuangan', 'Rp.'.' '.number_format(Monetarytarget::query()->whereMonth('tanggal_target', Carbon::parse(Carbon::now()))->sum('nominal')))
            ->label('')
            ->description('Target Pengeluaran Bulan ini')
            ->color('info'),

            Stat::make('Keuangan', 'Rp.'.' '.number_format(Monetary::query()->whereYear('tanggal', Carbon::parse(Carbon::now()))->sum('value')))
            ->label('')
            ->description('Pengeluaran Tahun ini')
            ->chart([12, 8, 3, 5, 10, 7, 10])
            ->color('danger'),

            Stat::make('Keuangan', 'Rp.'.' '.number_format(Monetary::query()->whereMonth('tanggal', Carbon::parse(Carbon::now()))->sum('value')))
            ->label('')
            ->description('Pengeluaran Bulan ini')
            ->chart([7, 2, 10, 17, 15, 4, 17])
            ->color('danger'),
        ];
    }
}
