<?php

namespace App\Filament\Resources;

use App\Enums\RolesType;
use App\Enums\StatusType;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use App\Models\PostTag;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-s-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make([
                    Section::make('Post Data')->schema([
                        TextInput::make('title')
                            ->label('Judul Postingan')
                            ->string()
                            ->minLength(5)
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, $set) {
                                if ($operation !== 'create') {
                                    return;
                                }
                                $set('slug', Str::slug($state));
                            })
                            ->required(),
                        TextInput::make('slug')
                            ->label('Post Slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255)
                            ->unique(static::getModel(), 'slug', ignorable: fn($record) => $record),
                        Select::make('category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->options(\App\Models\Category::all()->pluck('name', 'id'))
                            ->native(false)
                            ->required(),
                        TagsInput::make('tag')->label('Post Tag')
                            ->nestedRecursiveRules([
                                'min:3',
                                'max:255',
                            ])
                            ->reorderable()
                            ->suggestions(PostTag::all()->pluck('name'))
                    ])->columns(2),
                    Section::make('Content')->schema([
                        TiptapEditor::make('content')
                            ->label('Konten Postingan')
                            ->output(TiptapOutput::Html)
                            ->required(),
                    ]),
                    Section::make('Header Image')->schema([
                        FileUpload::make('image')
                            ->image()
                            ->required()
                            ->imageEditor()
                            ->maxSize(2048),
                        TextInput::make('image_caption')
                            ->label('Header Image Caption')
                            ->string()
                            ->maxLength(255)
                    ])
                ])->columnSpan(['lg' => 2]),
                Group::make([
                    Section::make('Post Setting')->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->inline()
                            ->onIcon('heroicon-c-check-circle')
                            ->onColor('success')
                            ->offIcon('heroicon-c-x-circle'),
                        Toggle::make('is_published')
                            ->label('Published')
                            ->inline()
                            ->onColor('success'),
                        ToggleButtons::make('status')
                            ->label('Post Status')
                            ->options(StatusType::class)
                            ->inline(),
                        DateTimePicker::make('published_at')
                            ->label('Published At')
                            ->required()
                            ->default(now())
                            ->timezone('Asia/Jakarta')
                            ->native(false)
                            ->minDate(now())
                            ->maxDate(now()->addYear(1)),
                        Select::make('user_id')
                            ->label('User Author')
                            ->relationship('user', 'name', modifyQueryUsing: fn($query) => $query->where('role', RolesType::STAFF))
                            ->required()
                            ->native(false)
                            ->searchable()
                            ->searchingMessage('Searching user...'),
                        Select::make('kementerian_id')
                            ->label('Kementerian')
                            ->relationship('kementerian', 'name')
                            ->options(\App\Models\Kementerian::all()->pluck('name', 'id'))
                            ->requiredWithout('kemenkoan_id')
                            ->native(false)
                            ->searchable(),
                        Select::make('kemenkoan_id')
                            ->label('Kemenkoan / Kabinet')
                            ->relationship('kemenkoan', 'name')
                            ->options(\App\Models\Kemenkoan::all()->pluck('name', 'id'))
                            ->requiredWithout('kementerian_id')
                            ->native(false)
                    ])
                ])->columnSpan(['lg' => 1]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
