<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatusasetResource\Pages;
use App\Filament\Resources\StatusasetResource\RelationManagers;
use App\Models\Statusaset;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StatusasetResource extends Resource
{
    protected static ?string $model = Statusaset::class;

    protected static ?string $pluralModelLabel = 'Input Status Aset';
    protected static ?string $navigationLabel = 'Status Aset';
    protected static ?string $navigationGroup = 'Aset / Inventaris';
    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStatusasets::route('/'),
            'create' => Pages\CreateStatusaset::route('/create'),
            'view' => Pages\ViewStatusaset::route('/{record}'),
            'edit' => Pages\EditStatusaset::route('/{record}/edit'),
        ];
    }
}
