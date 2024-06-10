<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArchiveResource\Pages;
use App\Filament\Resources\ArchiveResource\RelationManagers;
use App\Models\Archive;
use App\Models\Masuta;
use App\Models\SubMasuta;
use App\Models\SubSubMasuta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArchiveResource extends Resource
{
    protected static ?string $model = Archive::class;
    protected static ?string $pluralModelLabel = 'Kumpulan Dokumen';
    protected static ?string $navigationLabel = 'Data - data Dokumen';
    protected static ?string $navigationGroup = ' Kearsipan';
    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';
    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Kode Dokumen')
                ->schema([
                    Forms\Components\Select::make('masuta_id')->label('Kode Utama')
                    ->relationship(name:'masuta', titleAttribute:'desc')
                    ->afterStateUpdated(function ($set) {
                        $set('sub_masuta_id', null);
                        $set('sub_sub_masuta_id', null);
                    })
                    ->preload()
                    ->live()
                    ->required()
                    ->native(false),
                    Forms\Components\Select::make('sub_masuta_id')->label('Sub-Kode')
                    // ->relationship(name:'subMasuta', titleAttribute:'name')
                    ->options(fn ($get) => SubMasuta::query()
                        ->where('masuta_id', $get('masuta_id'))
                        ->pluck('name', 'id'))
                    ->preload()
                    ->live()
                    ->required()
                    ->afterStateUpdated(function ($set) {
                        $set('sub_sub_masuta_id', null);
                    })
                    ->native(false),
                    Forms\Components\Select::make('sub_sub_masuta_id')->label('sub-sub-Kode')
                    ->options(fn ($get) => SubSubMasuta::query()
                        ->where('sub_masuta_id', $get('sub_masuta_id'))
                        ->pluck('name', 'id'))
                    ->preload()
                    ->live()
                    ->required()
                    ->native(false),
                ])->columns(3),
                Forms\Components\Section::make('Tanggal Dokumen')
                ->description('Tanggal Dokumen dibuat/diajukan')
                ->Schema([
                    Forms\Components\TextInput::make('Bulan')
                        ->maxValue(12)
                        ->mask('99')
                        ->placeholder('Contoh : 08')
                        ->required(),
                    Forms\Components\TextInput::make('Tahun')
                        ->mask('9999')
                        ->placeholder('Contoh : 2024')
                        ->required(),
                ])->columns(2),
                Forms\Components\section::make('Detail Dokumen')->schema([
                    Forms\Components\TextInput::make('nama')->label('Nama Dokumen')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('status')
                        ->options([
                            'Tidak Butuh Tanda Tangan',
                            'Butuh Tanda Tangan',
                            'Dokumen Lengkap',
                            'Dokumen Ditolak',
                        ]),
                    Forms\Components\FileUpload::make('file')
                    ->acceptedFileTypes([
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/pdf',
                        'image/jpeg',
                        'image/png',
                        'image/bmp',
                        ])
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([

                // Tables\Columns\ColumnGroup::make('Kode', [
                    Tables\Columns\TextColumn::make('masuta.name')->label('')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('full_code')->label('Kode')
                        ->searchable()
                    // ->formatStateUsing(function (Archive $order) {
                    //     return $order->subMasuta->code .'.'. $order->subSubMasuta->code .'.'. $order->id;
                    // })
                    ,
                Tables\Columns\TextColumn::make('nama')
                ->searchable(),
                Tables\Columns\Layout\Split::make([
                    Tables\Columns\TextColumn::make('status')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('detil status')
                        ->searchable(),
                ]),
                Tables\Columns\TextColumn::make('file')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->searchable()
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
            'index' => Pages\ListArchives::route('/'),
            // 'create' => Pages\CreateArchive::route('/create'),
            // 'view' => Pages\ViewArchive::route('/{record}'),
            'edit' => Pages\EditArchive::route('/{record}/edit'),
        ];
    }
}
