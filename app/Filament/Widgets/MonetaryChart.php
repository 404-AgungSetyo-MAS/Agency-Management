<?php

namespace App\Filament\Widgets;

use App\Models\Monetary;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class MonetaryChart extends ChartWidget
{
    protected static ?string $heading = 'Keuangan';
    protected static bool $isLazy = false;
    protected int | string | array $columnSpan = 'full';
    protected function getData(): array
    {
            $data = Trend::model(Monetary::class)
            ->dateColumn('tanggal')
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->sum('value');

        return [
            'datasets' => [
                [
                    'label' => 'Pengeluaran Bulan ini',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    // 'backgroundColor' => '#36A2EB',
                    // 'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date)
        ];
    }

    protected function getType(): string
    {
        return 'bar';
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
