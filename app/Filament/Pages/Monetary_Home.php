<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\MonetaryChart;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Widgets\StatsOverviewWidget;

class Monetary_Home extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'Graph Keuangan';
    protected static ?string $navigationLabel = 'Graph Keuangan';
    protected static string $view = 'filament.pages.monetary-home';

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Action::make('edit')
    //             // ->url(route('posts.edit', ['post' => $this->post]))
    //             ,
    //         Action::make('delete')
    //             ->requiresConfirmation()
    //             ->action(fn () => $this->post->delete()),
    //     ];
    // }


    protected function getHeaderWidgets(): array
    {
        return [
            MonetaryChart::class,
        ];
    }
}
