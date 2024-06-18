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
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Tables\Grouping\Group;
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
                Forms\Components\Select::make('keukategori_id')->label('Kategori')
                    ->required()
                    ->relationship(name:'keukategori', titleAttribute:'name')
                    ->preload()
                    ->native(false),
                Forms\Components\Select::make('keusubkategori_id')->label('sub-Kategori')
                    ->options(fn (Get $get) => Keusubkategori::query()
                        ->where('keukategori_id', $get('keukategori_id'))
                        ->pluck('name', 'id')
                    )
                    ->required()
                    ->native(false),
                Forms\Components\TextInput::make('name')->label('Keterangan Detil')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal')->label('Tanggal Pembelian/Pelaksanaan')
                    ->default(now())
                    ->required(),
                Forms\Components\TextInput::make('value')->label('Nominal')
                    ->required()
                    ->prefix('IDR')
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->striped()
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('keukategori.name')->label('kategori')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('keusubkategori.name')->label('sub-kategori')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('name')->label('Keterangan')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('tanggal')->label('Tanggal Pembayaran')
                        ->date('d-m-Y')
                        ->alignCenter()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('value')->label('Nominal Pengeluaran')
                        ->numeric()
                        ->money('idr')
                        // ->formatStateUsing(function (Monetary $money) {
                        //     return 'Rp. '. $money->value;
                        // })
                        // ->Summarize(
                        //     Tables\Columns\Summarizers\Sum::make()
                        //     ->label('Total')
                        //     ->money('idr')
                        // )
                        ,
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            // ->groups([
            //     Group::make('tanggal')
            //     ->label('Tanggal')
            //     ])
                ->defaultGroup('tanggal')
                // ->groupingSettingsHidden()
                ->defaultSort('tanggal', 'desc')
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
            'index' => Pages\ListMonetaries::route('/'),
            // 'create' => Pages\CreateMonetary::route('/create'),
            // 'view' => Pages\ViewMonetary::route('/{record}'),
            // 'edit' => Pages\EditMonetary::route('/{record}/edit'),
        ];
    }
}
