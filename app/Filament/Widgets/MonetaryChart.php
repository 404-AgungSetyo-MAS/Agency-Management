<?php

namespace App\Filament\Widgets;

use App\Models\Monetary;
use App\Models\Monetarytarget;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class MonetaryChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Keuangan';
    protected static bool $isLazy = false;
    protected int | string | array $columnSpan = 'full';
    protected function getData(): array
    {
            $datamoneyout = Trend::model(Monetary::class)
            ->dateColumn('tanggal')
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->sum('value');

            $datatarget = Trend::model(Monetarytarget::class)
            ->dateColumn('tanggal_target')
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->sum('nominal');

        return [
            'datasets' => [
                [
                    'label' => 'Pengeluaran Bulan ini',
                    'data' => $datamoneyout->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#c72e2e',
                    'borderColor' => '#c72e2e',
                ],
                [
                    'label' => 'Target Pengeluaran',
                    'data' => $datatarget->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#2e96c7',
                    'borderColor' => '#2e96c7',
                ]
            ],
            'labels' => $datamoneyout->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): RawJs
        {
            return RawJs::make(<<<JS
                {
                    indexAxis: 'x',
                }
            JS);
        }
    }
