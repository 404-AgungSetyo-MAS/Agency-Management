<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetSubTypeResource\Pages;
use App\Filament\Resources\AssetSubTypeResource\RelationManagers;
use App\Models\AssetSubType;
use App\Models\AssetType;
use Filament\Forms;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssetSubTypeResource extends Resource
{
    protected static ?string $model = AssetSubType::class;
    protected static ?string $modelLabel = 'Asset Sub-Types';
    protected static ?string $navigationLabel = 'Sub Tipe Aset';
    protected static ?string $navigationGroup = 'Aset / Inventaris';
    protected static ?string $navigationIcon = 'heroicon-o-bars-4';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('asset_clasification_id')->label('Klasifikasi Aset')
                    ->required()
                    ->placeholder('Pilih Klasifikasi Aset')
                    ->relationship(name:'assetclasification', titleAttribute:'nama')
                    ->afterStateUpdated(function ($set) {
                        $set('asset_type_id', null);
                    })
                    ->preload()
                    ->native(false),
                Forms\Components\Select::make('asset_type_id')->label('Tipe Aset')
                ->placeholder('Pilih Tipe Aset')
                    ->options(fn (Get $get) => AssetType::query()
                        ->where('asset_clasification_id', $get('asset_clasification_id'))
                        ->pluck('nama', 'id')
                    )
                    ->required()
                    ->native(false),
                Forms\Components\TextInput::make('nama')->label('Nama Sub Tipe Aset')
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
                Tables\Columns\TextColumn::make('asset_type_id')->label('No. Tipe Aset')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('id')->label('No. Sub Tipe Aset')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')->label('Sub Tipe Aset')
                    ->searchable(),
            ])->defaultSort('asset_clasification_id')
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
            'index' => Pages\ListAssetSubTypes::route('/'),
            'create' => Pages\CreateAssetSubType::route('/create'),
            'view' => Pages\ViewAssetSubType::route('/{record}'),
            'edit' => Pages\EditAssetSubType::route('/{record}/edit'),
        ];
    }
}
