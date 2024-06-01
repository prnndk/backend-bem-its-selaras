<?php

namespace App\Filament\Resources;

use App\Enums\RolesType;
use App\Filament\Resources\StaffDetailResource\Pages;
use App\Filament\Resources\StaffDetailResource\RelationManagers;
use App\Models\Jabatan;
use App\Models\Kedirjenan;
use App\Models\Kemenkoan;
use App\Models\Kementerian;
use App\Models\StaffDetail;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StaffDetailResource extends Resource
{
    protected static ?string $model = StaffDetail::class;

    protected static ?string $navigationIcon = 'heroicon-c-identification';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make([
                    Forms\Components\Section::make('Data Personal Staff')->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('User')
                            ->relationship('user', 'name')
                            ->options(User::all()->where('role', RolesType::STAFF)->pluck('name', 'id'))
                            ->required()
                            ->native(false)
                            ->searchable()
                            ->unique(static::getModel(), 'user_id', ignorable: fn($record) => $record),
                        Forms\Components\TextInput::make('linkedin')
                            ->url()
                            ->activeUrl()
                            ->helperText('Please input the link fully, including the https://linkedin.com/in/'),
                        Forms\Components\TextInput::make('instagram')
                            ->url()
                            ->activeUrl()
                            ->helperText('Please input the link fully, including the https://instagram.com/'),
                    ]),
                    Forms\Components\Section::make('Personal Image')->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->required()
                            ->imageEditor()
                            ->maxSize(2048),
                    ]),
                    Forms\Components\Section::make('Data Pada BEM ITS')->schema([
                        Forms\Components\Select::make('kementerian_id')
                            ->label('Kementerian')
                            ->relationship('kementerian', 'name')
                            ->options(Kementerian::all()->pluck('name', 'id'))
                            ->requiredWithout('kemenkoan_id')
                            ->native(false)->searchable(),
                        Forms\Components\Select::make('kemenkoan_id')
                            ->label('Kemenkoan / Kabinet')
                            ->relationship('kemenkoan', 'name')
                            ->options(Kemenkoan::all()->pluck('name', 'id'))
                            ->requiredWithout('kementerian_id')
                            ->native(false)->searchable(),
                        Forms\Components\Select::make('kedirjenan_id')
                            ->label('Kedirjenan')
                            ->relationship('kedirjenan', 'name')
                            ->options(Kedirjenan::all()->pluck('name', 'id'))
                            ->nullable()
                            ->native(false)->searchable(),
                        Forms\Components\Select::make('jabatan_id')
                            ->label('Jabatan')
                            ->relationship('jabatan', 'name')
                            ->options(Jabatan::all()->pluck('name', 'id'))
                            ->required()
                            ->native(false)->searchable(),
                    ])
                ]),
                Forms\Components\Group::make([
                    Forms\Components\Section::make('Settings')->schema([
                        Forms\Components\Toggle::make('is_active')->label('Active')->required(),
                    ]),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStaffDetails::route('/'),
            'create' => Pages\CreateStaffDetail::route('/create'),
            'view' => Pages\ViewStaffDetail::route('/{record}'),
            'edit' => Pages\EditStaffDetail::route('/{record}/edit'),
        ];
    }
}
