<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\StatusdocResource\Pages;
use App\Filament\Main\Resources\StatusdocResource\RelationManagers;
use App\Models\Statusdoc;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StatusdocResource extends Resource
{
    protected static ?string $model = Statusdoc::class;
    protected static ?string $pluralModelLabel = 'Input Status Dokumen';
    protected static ?string $navigationLabel = 'Status Dokumen';
    protected static ?string $navigationGroup = ' Kearsipan';
    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

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
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->visible(fn (): bool => auth()->user()->isArsip()),
                Tables\Actions\EditAction::make()->visible(fn (): bool => auth()->user()->isArsip()),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn (): bool => auth()->user()->isArsip()),
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
            'index' => Pages\ListStatusdocs::route('/'),
        ];
    }
}
