<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MonetaryResource\Pages;
use App\Filament\Resources\MonetaryResource\RelationManagers;
use Filament\Actions\ActionGroup;
use Filament\Forms\Get;
use App\Models\Monetary;
use App\Models\Keusubkategori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Collection;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MonetaryResource extends Resource
{
    protected static ?string $model = Monetary::class;

    protected static ?string $title = 'Data Keuangan';
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Keuangan';
    protected static ?string $navigationLabel = 'Data Keuangan';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('keukategori_id')
                    ->required()
                    ->relationship(name:'keukategori', titleAttribute:'nama')
                    ->preload()
                    ->native(false),
                Forms\Components\Select::make('keusubkategori_id')
                    ->options(fn (Get $get) => Keusubkategori::query()
                        ->where('keukategori_id', $get('keukategori_id'))
                        ->pluck('nama', 'id')
                    )
                    ->required()
                    ->native(false),
                    Forms\Components\TextInput::make('nomor')
                        ->required()
                        ->numeric(),
                Forms\Components\TextInput::make('nama')->label('Keterangan Detil')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tgl')
                    ->required(),
                Forms\Components\TextInput::make('value')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('keukategori.nama')->label('kategori')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('keusubkategori.nama')->label('sub-kategori')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nama')->label('detil')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tgl')->label('Tanggal Pelaksanaan/Pembelian')
                    ->date($format = 'd F Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('value')
                    ->numeric()
                    ->money('idr')
                    // ->formatStateUsing(function (Monetary $order) {
                    //     return 'Rp. '. $order->value;
                    // })
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ])->dropdownPlacement('top-end'),
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
            'index' => Pages\ListMonetaries::route('/'),
            // 'create' => Pages\CreateMonetary::route('/create'),
            // 'view' => Pages\ViewMonetary::route('/{record}'),
            // 'edit' => Pages\EditMonetary::route('/{record}/edit'),
        ];
    }
}
