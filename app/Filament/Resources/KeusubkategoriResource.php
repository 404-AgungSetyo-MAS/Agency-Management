<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeusubkategoriResource\Pages;
use App\Filament\Resources\KeusubkategoriResource\RelationManagers;
use App\Models\Keusubkategori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Contracts\Support\Htmlable;

class KeusubkategoriResource extends Resource
{
    protected static ?string $model = Keusubkategori::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-2';
    protected static ?string $navigationGroup = 'Keuangan';
    protected static ?string $navigationLabel = 'Sub Kategori Keuangan';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('keukategori_id')
                    ->required()
                    ->relationship(name:'keukategori', titleAttribute:'name')
                    ->preload()
                    ->native(false),
                Forms\Components\TextInput::make('name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('keukategori.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            // ->defaultSort('keukategori.name')
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListKeusubkategoris::route('/'),
        ];
    }
}
