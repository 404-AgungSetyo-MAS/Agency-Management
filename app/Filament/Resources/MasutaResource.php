<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasutaResource\Pages;
use App\Filament\Resources\MasutaResource\RelationManagers;
use App\Models\Masuta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MasutaResource extends Resource
{
    protected static ?string $model = Masuta::class;
    protected static ?string $modelLabel = 'Kode Utama';
    protected static ?string $navigationGroup = 'Klasifikasi Arsip';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('desc')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Kode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desc')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListMasutas::route('/'),
            // 'create' => Pages\CreateMasuta::route('/create'),
            // 'view' => Pages\ViewMasuta::route('/{record}'),
            // 'edit' => Pages\EditMasuta::route('/{record}/edit'),
        ];
    }
}
