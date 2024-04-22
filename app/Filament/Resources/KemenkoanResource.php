<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KemenkoanResource\Pages;
use App\Filament\Resources\KemenkoanResource\RelationManagers;
use App\Models\Kemenkoan;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class KemenkoanResource extends Resource
{
    protected static ?string $model = Kemenkoan::class;
    protected static ?string $navigationLabel = 'Kementerian Koordinator';
    protected static ?string $navigationIcon = 'heroicon-c-users';

    protected static ?string $navigationGroup = 'Data BEM ITS';

    protected static ?string $slug = 'kementrian-koordinator';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi')->description('Informasi Umum Kemenkoan')->schema([
                    TextInput::make('name')
                        ->label('Name')
                        ->required()
                        ->unique(static::getModel(), 'name')
                        ->autocomplete(false),
                    Textarea::make('description')
                        ->label('Description')
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->description(fn(Kemenkoan $record): string => $record->description)
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListKemenkoans::route('/'),
            'create' => Pages\CreateKemenkoan::route('/create'),
            'edit' => Pages\EditKemenkoan::route('/{record}/edit'),
        ];
    }
}
