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
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section as InfoSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InventoryAssetResource extends Resource
{
    protected static ?string $model = InventoryAsset::class;
    protected static ?string $pluralModelLabel = 'Aset dan Inventaris';
    protected static ?string $navigationLabel = 'Data Barang / Aset';
    protected static ?string $navigationGroup = 'Aset / Inventaris';
    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('asset_clasification_id')->label('Klasifikasi Aset')
                    ->required()
                    ->relationship(name:'assetclasification', titleAttribute:'nama')
                    ->afterStateUpdated(function ($set) {
                        $set('asset_type_id', null);
                        $set('asset_sub_type_id', null);
                    })
                    ->preload()
                    ->native(false),
                Forms\Components\Select::make('asset_type_id')->label('Tipe Aset')
                    ->options(fn (Get $get) => AssetType::query()
                        ->where('asset_clasification_id', $get('asset_clasification_id'))
                        ->pluck('nama', 'id')
                    )->afterStateUpdated(function ($set) {
                        $set('asset_sub_type_id', null);
                    })
                    ->required()
                    ->native(false),
                Forms\Components\Select::make('asset_sub_type_id')->label('Sub Tipe Aset')
                    ->options(fn (Get $get) => AssetSubType::query()
                        ->where('asset_type_id', $get('asset_type_id'))
                        ->pluck('nama', 'id')
                    )
                    ->required()
                    ->native(false),
                Forms\Components\Select::make('asset_location_id')->label('Lokasi Aset')
                    ->relationship(name:'assetlocation', titleAttribute:'nama')
                    ->native(false)
                    ->preload()
                    ->nullable(),
                Forms\Components\DatePicker::make('tanggal')->label('Tanggal Masuk')
                    ->default(now())
                    ->required(),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')->label('Deskripsi detil')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\Select::make('statusaset')->label('Status')
                    ->native(false)
                    ->relationship(name:'statusaset', titleAttribute:'name'),
                Forms\Components\Section::make()
                ->schema([
                    Forms\Components\FileUpload::make('img')->label('')
                        ->default(null)
                        ->image()
                        ->imagePreviewHeight('250')
                        ->imageEditor()
                        ->imageEditorAspectRatios([
                            '16:9',
                            '4:3',
                            '1:1',
                        ])
                        ->multiple()
                        ->reorderable()
                        ->openable()
                        ->disk('public')
                        ->directory('images/aset'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')->label('Kode Aset')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('img')->label('Foto')
                    ->stacked()
                    ->limit(3)
                    ->checkFileExistence(false)
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal')->label('Tanggal Masuk')
                    ->date('d-m-Y')
                    ->toggleable(isToggledHiddenByDefault: true)
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
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('statusaset.name')->label('Status')
                    ->color(fn (string $state): string => match ($state) {
                        'Baik' => 'success',
                        'Perawatan' => 'warning',
                        'Rusak/tidak dapat digunakan' => 'danger',
                        'Tidak ada/sudah ganti' => 'danger',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'Baik' => 'heroicon-o-check-circle',
                        'Perawatan' => 'heroicon-o-clock',
                        'Rusak/tidak dapat digunakan' => '',
                        'Tidak ada/sudah ganti' => '',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal Data Dimasukkan')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->label('Terakhir di update')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultGroup('assetlocation.nama')
            ->groups([
                Group::make('assetlocation.nama')
                    ->label('Lokasi')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ExportBulkAction::make(),
            ])
            ->recordUrl(null);
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfoSection::make('Foto Aset')
                ->description('detail data pegawai')
                ->columnSpan(1)
                ->schema([
                    ImageEntry::make('img')->label('')
                    ,
                ]),
                InfoSection::make('Detil Aset')
                ->columnSpan(1)
                ->schema([
                    TextEntry::make('code')->label('kode'),
                    TextEntry::make('assetclasification.nama')->label('Klasifikasi Aset'),
                    TextEntry::make('assettype.nama')->label('Tipe Aset'),
                    TextEntry::make('assetsubtype.nama')->label('sub Tipe Aset'),
                    TextEntry::make('assetlocation.nama')->label('Lokasi Aset'),
                    TextEntry::make('nama'),
                    TextEntry::make('description')->label('Deskripsi'),
                    TextEntry::make('tanggal')->label('Tanggal masuk'),
                    TextEntry::make('updated_at')->label('Terakhir Diubah'),
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
            'index' => Pages\ListInventoryAssets::route('/'),
            // 'create' => Pages\CreateInventoryAsset::route('/create'),
            // 'view' => Pages\ViewInventoryAsset::route('/{record}'),
            // 'edit' => Pages\EditInventoryAsset::route('/{record}/edit'),
        ];
    }
}
