<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InventoryAssetResource\Pages;
use App\Filament\Resources\InventoryAssetResource\RelationManagers;
use App\Models\AssetSubType;
use App\Models\InventoryAsset;

use App\Models\AssetType;

use Filament\Forms;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InventoryAssetResource extends Resource
{
    protected static ?string $model = InventoryAsset::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('img')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Select::make('asset_clasification_id')
                    ->required()
                    ->relationship(name:'assetclasification', titleAttribute:'nama')
                    ->afterStateUpdated(function ($set) {
                        $set('asset_type_id', null);
                        $set('asset_sub_type_id', null);
                    })
                    ->preload()
                    ->native(false),
                Forms\Components\Select::make('asset_type_id')
                    ->options(fn (Get $get) => AssetType::query()
                        ->where('asset_clasification_id', $get('asset_clasification_id'))
                        ->pluck('nama', 'id')
                    )->afterStateUpdated(function ($set) {
                        $set('asset_sub_type_id', null);
                    })
                    ->required()
                    ->native(false),
                Forms\Components\Select::make('asset_sub_type_id')
                    ->options(fn (Get $get) => AssetSubType::query()
                        ->where('asset_type_id', $get('asset_type_id'))
                        ->pluck('nama', 'id')
                    )
                    ->required()
                    ->native(false),
                Forms\Components\Select::make('asset_location_id')
                    ->relationship(name:'assetlocation', titleAttribute:'nama')
                    ->native(false)
                    ->preload()
                    ->nullable(),
                Forms\Components\DatePicker::make('tgl')
                    ->required(),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')->label('Kode Aset')
                    ->searchable(),
                Tables\Columns\TextColumn::make('img')->label('Foto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tgl')->label('Tanggal Masuk')
                    ->date('d-m-Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('assetclasification.nama')->label('Klasifikasi Aset')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('assettype.nama')->label('Tipe Aset')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('assetsubtype.nama')->label('Sub Tipe Aset')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')->label('Nama Aset')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')->label('Deskripsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultGroup('assetlocation.nama')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListInventoryAssets::route('/'),
            // 'create' => Pages\CreateInventoryAsset::route('/create'),
            // 'view' => Pages\ViewInventoryAsset::route('/{record}'),
            // 'edit' => Pages\EditInventoryAsset::route('/{record}/edit'),
        ];
    }
}
