<?php

namespace App\Filament\Main\Resources\ArchiveResource\Pages;

use App\Filament\Exports\ArchiveExporter;
use App\Filament\Main\Resources\ArchiveResource;
use App\Models\Archive;
use App\Models\Statusdoc;
use Filament\Actions;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Support\Collection;

class ListArchives extends ListRecords
{
    protected static string $resource = ArchiveResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Dokumen Baru')
                ->visible(fn (): bool => auth()->user()->isArsip()),
            Actions\ExportAction::make()->label('Export')
                ->exporter(ArchiveExporter::class)
                ->formats([
                    ExportFormat::Xlsx,
                ])
                ->visible(fn (): bool => auth()->user()->isArsip()),
        ];
    }

    public function getTabs(): array
    {
        return [
            'Semua' => Tab::make('Semua')->badge(Archive::query()->count()),

            // 'Tidak Butuh Tanda Tangan' => Tab::make()
            // ->badge(Archive::query()->where('statusdoc_id', 1)->count())
            // ->modifyQueryUsing(function ($query) {
            //     return $query->where('statusdoc_id', 1);
            // }),
            'Butuh Tanda Tangan' => Tab::make()
            ->badge(Archive::query()->where('statusdoc_id', 2)->count())
            ->modifyQueryUsing(function ($query) {
                return $query->where('statusdoc_id', 2);
            }),
            'Dokumen Belum Lengkap' => Tab::make()
            ->badge(Archive::query()->where('statusdoc_id', 3)->count())
            ->modifyQueryUsing(function ($query) {
                return $query->where('statusdoc_id', 3);
            }),
            'Dokumen Lengkap' => Tab::make('Dokumen Lengkap')
            ->badge(Archive::query()->where('statusdoc_id', 4)->count())
            ->modifyQueryUsing(function ($query) {
                return $query->where('statusdoc_id', 4);
            }),
        ];
    }
}
