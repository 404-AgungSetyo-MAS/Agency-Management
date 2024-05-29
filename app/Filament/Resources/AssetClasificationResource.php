<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetClasificationResource\Pages;
use App\Filament\Resources\AssetClasificationResource\RelationManagers;
use App\Models\AssetClasification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssetClasificationResource extends Resource
{
    protected static ?string $model = AssetClasification::class;
    protected static ?string $modelLabel = 'Asset Classification';
    protected static ?string $navigationLabel = 'Klasifikasi Aset';
    protected static ?string $navigationGroup = 'Aset / Inventaris';
    protected static ?string $navigationIcon = 'heroicon-o-ellipsis-horizontal';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('no.')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')->label('Klasifikasi Aset')
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
            'index' => Pages\ListAssetClasifications::route('/'),
            'create' => Pages\CreateAssetClasification::route('/create'),
            'view' => Pages\ViewAssetClasification::route('/{record}'),
            'edit' => Pages\EditAssetClasification::route('/{record}/edit'),
        ];
    }
}
