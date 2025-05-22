<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\MonetarytargetResource\Pages;
use App\Filament\Main\Resources\MonetarytargetResource\RelationManagers;
use App\Models\Monetarytarget;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MonetarytargetResource extends Resource
{
    protected static ?string $model = Monetarytarget::class;

    protected static ?string $title = 'Target Keuangan Perbulan';
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Keuangan';
    protected static ?string $navigationLabel = 'Target Keuangan Perbulan';
    protected static ?int $navigationSort = 1;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('tanggal_target')
                    ->default(now())
                    ->required(),
                Forms\Components\TextInput::make('nominal')
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
            ->columns([
                Tables\Columns\TextColumn::make('tanggal_target')
                    ->date('F-Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nominal')
                    ->prefix('Rp.')
                    ->numeric(),
            ])->defaultSort('tanggal_target', 'asc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListMonetarytargets::route('/'),
        ];
    }
}
