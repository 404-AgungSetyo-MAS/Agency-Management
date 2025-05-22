<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Infolists\Components\Section as InfoSection;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;
    protected static ?string $pluralModelLabel = 'Data Pegawai';
    protected static ?string $navigationLabel = 'Data Pegawai';
    protected static ?string $navigationGroup = 'Kepegawaian';
    protected static ?string $navigationIcon = 'heroicon-o-identification';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('upload Foto Profil')
                ->columnSpan(1)
                ->schema([
                    Forms\Components\FileUpload::make('img')->label('')
                        ->image()
                        ->imagePreviewHeight('250')
                        ->panelAspectRatio('1:1')
                        ->disk('public')
                        ->directory('images/pegawai')
                        ->preserveFilenames(),
                ]),
                Section::make('Data Pegawai')
                ->columnSpan(1)
                ->schema([
                    Forms\Components\TextInput::make('nama_lengkap')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('tempat_lahir')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('tgl_lahir')->label('Tanggal Lahir')
                        ->required(),
                    Forms\Components\TextInput::make('jenis_kelamin')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('agama')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('nomor_telepon')
                        ->tel()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->nullable()
                        ->maxLength(255),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->striped()
            ->columns([
                Tables\Columns\ImageColumn::make('img')->label('')
                    ->rounded(),
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempat_lahir')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tgl_lahir')->label('Tanggal Lahir')
                    ->date('d-m-Y'),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('agama')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nomor_telepon')
                    ->searchable(),
            ])->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            // ->visible(fn (): bool => auth()->user()->isKepeg())
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->recordAction(Tables\Actions\ViewAction::class)
            ->recordUrl(null)
            ;
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfoSection::make('Foto Pegawai')
                ->description('detail data pegawai')
                ->columnSpan(1)
                ->schema([
                    ImageEntry::make('img')->label('')
                    ->square()
                    ->width(350)
                    ->height(350),
                ]),
                InfoSection::make('Profil Pegawai')
                ->columnSpan(1)
                ->schema([
                    TextEntry::make('nama_lengkap')->columnSpan(2),
                    TextEntry::make('tempat_lahir'),
                    TextEntry::make('tgl_lahir')->label('Tanggal Lahir'),
                    TextEntry::make('jenis_kelamin'),
                    TextEntry::make('agama'),
                    TextEntry::make('nomor_telepon'),
                    TextEntry::make('email'),
                    // TextEntry::make('created_at'),
                    // TextEntry::make('updated_at'),
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
            'index' => Pages\ListEmployees::route('/'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
