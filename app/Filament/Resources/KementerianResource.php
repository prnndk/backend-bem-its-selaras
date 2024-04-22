<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KementerianResource\Pages;
use App\Filament\Resources\KementerianResource\RelationManagers;
use App\Models\Kemenkoan;
use App\Models\Kementerian;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KementerianResource extends Resource
{
    protected static ?string $model = Kementerian::class;

    protected static ?string $navigationLabel = 'Kementerian BEM ITS';
    protected static ?string $navigationGroup = 'Data BEM ITS';
    protected static ?string $slug = 'kementerian';
    protected static ?string $navigationIcon = 'heroicon-s-wallet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Information')->description('Informasi mendasar mengenai kementerian')->schema([
                    TextInput::make('name')
                        ->label('Name')
                        ->required()->unique(Kementerian::class)->autocomplete(false),
                    Textarea::make('description')
                        ->label('Description')
                        ->required(),
                    Select::make('kemenkoan_id')
                        ->label('Kemenkoan')
                        ->options(Kemenkoan::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required(),
                ]),
                Section::make('Program Kerja')->description('Program kerja yang dimiliki oleh kementerian')->schema([
                    Repeater::make('program_kerja')
                        ->label('Program Kerja')
                        ->schema([
                            TextInput::make('name')
                                ->label('Name')
                                ->required(),
                            Textarea::make('description')
                                ->label('Description')
                                ->required(),
                        ])->addActionLabel('Add Program Kerja')->reorderableWithButtons(),
                ]),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kemenkoan.name')
                    ->label('Kementerian Koordinator')
                    ->searchable()
                    ->sortable(),
            ])
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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKementerians::route('/'),
            'create' => Pages\CreateKementerian::route('/create'),
            'edit' => Pages\EditKementerian::route('/{record}/edit'),
        ];
    }
}
