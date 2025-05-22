<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\AssetTypeResource\Pages;
use App\Filament\Main\Resources\AssetTypeResource\RelationManagers;
use App\Models\AssetType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssetTypeResource extends Resource
{
    protected static ?string $model = AssetType::class;
    protected static ?string $pluralModelLabel = 'Tipe Aset';
    protected static ?string $navigationLabel = 'Tipe Aset';
    protected static ?string $navigationGroup = 'Aset / Inventaris';
    protected static ?string $navigationIcon = 'heroicon-o-bars-3';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('asset_clasification_id')->label('Klasifikasi Aset')
                ->required()
                ->relationship(name:'assetclasification', titleAttribute:'nama')
                ->preload()
                ->native(false),
                Forms\Components\TextInput::make('nama')->label('Nama Tipe Aset')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('asset_clasification_id')->label('No. Klasifikasi Aset')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('assetclasification.nama')->label('Klasifikasi Aset')
                    ->searchable(),
                Tables\Columns\TextColumn::make('id')->label('no. Tipe Aset')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')->label('Nama Tipe Aset')
                    ->searchable(),
            ])->defaultSort('asset_clasification_id')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->visible(fn (): bool => auth()->user()->isAset()),
                Tables\Actions\EditAction::make()->visible(fn (): bool => auth()->user()->isAset()),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->visible(fn (): bool => auth()->user()->isAset()),
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
            'index' => Pages\ListAssetTypes::route('/'),
            // 'create' => Pages\CreateAssetType::route('/create'),
            // 'view' => Pages\ViewAssetType::route('/{record}'),
            // 'edit' => Pages\EditAssetType::route('/{record}/edit'),
        ];
    }
}
