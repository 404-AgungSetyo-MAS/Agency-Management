<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubMasutaResource\Pages;
use App\Filament\Resources\SubMasutaResource\RelationManagers;
use App\Models\SubMasuta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubMasutaResource extends Resource
{
    protected static ?string $model = SubMasuta::class;
    protected static ?string $pluralModelLabel = 'sub-Klasifikasi Dokumen';
    protected static ?string $navigationLabel = 'Sub Klasifikasi Dokumen';
    protected static ?string $navigationGroup = ' Kearsipan';
    protected static ?string $navigationIcon = 'heroicon-o-bars-2';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('masuta_id')
                    ->required()
                    ->relationship(name: 'masuta', titleAttribute:'name')
                    ->preload()
                    ,
                // Forms\Components\TextInput::make('code')
                //     ->required()
                //     ->mask('99')
                //     ->numeric(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('masuta.id')->label('Kode Utama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('id')->label('Sub-Kode')
                    // ->formatStateUsing( fn (SubMasuta $code) => $code)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('masuta.name')->label('')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')->label('')
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
            'index' => Pages\ListSubMasutas::route('/'),
            // 'create' => Pages\CreateSubMasuta::route('/create'),
            // 'view' => Pages\ViewSubMasuta::route('/{record}'),
            // 'edit' => Pages\EditSubMasuta::route('/{record}/edit'),
        ];
    }
}
