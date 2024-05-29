<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetLocationResource\Pages;
use App\Filament\Resources\AssetLocationResource\RelationManagers;
use App\Models\AssetLocation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssetLocationResource extends Resource
{
    protected static ?string $model = AssetLocation::class;
    protected static ?string $modelLabel = 'Asset Locations';
    protected static ?string $navigationLabel = 'Lokasi Aset';
    protected static ?string $navigationGroup = 'Aset / Inventaris';
    protected static ?string $navigationIcon = 'heroicon-o-bars-2';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->label('Nama Lokasi')
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
                Tables\Columns\TextColumn::make('nama')->label('Nama Lokasi')
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
            'index' => Pages\ListAssetLocations::route('/'),
            'create' => Pages\CreateAssetLocation::route('/create'),
            'view' => Pages\ViewAssetLocation::route('/{record}'),
            'edit' => Pages\EditAssetLocation::route('/{record}/edit'),
        ];
    }
}
