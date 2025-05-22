<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\SubSubMasutaResource\Pages;
use App\Filament\Main\Resources\SubSubMasutaResource\RelationManagers;
use App\Models\SubMasuta;
use App\Models\SubSubMasuta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Collection;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Get;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubSubMasutaResource extends Resource
{
    protected static ?string $model = SubSubMasuta::class;
    protected static ?string $pluralModelLabel = 'sub-sub-Klasifikasi Dokumen';
    protected static ?string $navigationLabel = 'Sub Sub Klasifikasi Dokumen';
    protected static ?string $navigationGroup = ' Kearsipan';
    protected static ?string $navigationIcon = 'heroicon-o-bars-3';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('masuta_id')
                ->required()
                ->relationship(name: 'masuta', titleAttribute:'name'),
                Forms\Components\Select::make('sub_masuta_id')
                // ->relationship(name: 'submasuta', titleAttribute:'name')
                ->options(fn($get) => SubMasuta::query()
                ->where('masuta_id', $get('masuta_id'))
                ->pluck('name', 'id'))
                ->native(false)
                ->required(),
                // Forms\Components\TextInput::make('id')
                //     ->required()
                //     ->numeric(),
                Forms\Components\TextInput::make('name')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('masuta.id')->label('Kode')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('submasuta.id')->label('Sub-Kode')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('id')->label('Sub-Sub-Kode')
                ->numeric()
                ->sortable(),
                Tables\Columns\TextColumn::make('masuta.name')->label('')
                ->searchable(),
                Tables\Columns\TextColumn::make('submasuta.name')->label('')
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
            'index' => Pages\ListSubSubMasutas::route('/'),
            // 'create' => Pages\CreateSubSubMasuta::route('/create'),
            // 'view' => Pages\ViewSubSubMasuta::route('/{record}'),
            // 'edit' => Pages\EditSubSubMasuta::route('/{record}/edit'),
        ];
    }
}
