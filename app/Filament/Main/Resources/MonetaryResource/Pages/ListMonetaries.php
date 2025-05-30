<?php

namespace App\Filament\Main\Resources\MonetaryResource\Pages;

use App\Filament\Exports\ArchiveExporter;
use App\Filament\Main\Resources\MonetaryResource;
use Filament\Actions;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListMonetaries extends ListRecords
{
    protected static string $resource = MonetaryResource::class;
    protected static ?string $title = 'Data Keuangan';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Buat Data Keuangan baru')
            ->visible(fn (): bool => auth()->user()->isKeua()),
            Actions\ExportAction::make()->label('Export')
            ->exporter(ArchiveExporter::class)
            ->formats([
                ExportFormat::Xlsx,
            ])
            ->visible(fn (): bool => auth()->user()->isKeua()),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Semua' => Tab::make(),
            'Minggu ini' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('tanggal' ,'>=', now()->subWeek())),
            'Bulain ini' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('tanggal' ,'>=', now()->subMonth())),
            'Tahun ini' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('tanggal' ,'>=', now()->subYear())),
        ];
    }
}
