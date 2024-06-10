<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Filament\Forms\Components\CloudinaryFileUpload;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Accueil';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make([
                            TextInput::make('title')->live()->required()->minLength(1)->maxLength(150)
                                ->label('Titre')
                                ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                    if ($operation === 'edit') {
                                        return;
                                    }
                                    $set('slug', Str::slug($state));
                                }),
                            TextInput::make('slug')->required()->unique(ignoreRecord: true),
                            MarkdownEditor::make('description')
                                ->label('Description')
                                ->toolbarButtons([
                                    'attachFiles',
                                    'blockquote',
                                    'bold',
                                    'bulletList',
                                    'codeBlock',
                                    'heading',
                                    'italic',
                                    'link',
                                    'orderedList',
                                    'redo',
                                    'strike',
                                    'table',
                                    'undo',
                                ])
                                ->required(),
                            DatePicker::make('date_published')
                                ->label('Date de publication')
                                ->native(false)
                                ->displayFormat('d/m/Y'),
                            Toggle::make('status')
                                ->onColor('success')
                                ->offColor('danger')
                                ->default(true)
                        ])

                    ])->columns(2),
                Group::make()
                    ->schema([
                        Section::make([
                            CloudinaryFileUpload::make('image')
                                ->label('Cloudinary Slider')
                                ->preserveFilenames()
                                ->image()
                                ->default(fn ($record) => $record ? $record->image : null)
                                ->visible(fn ($record) => !$record || !$record->image),
                            Placeholder::make('Preview')
                                ->content(function ($record) {
                                    return $record && $record->image
                                        ? new HtmlString('<img src="' . $record->image . '" style="max-width: 200px; max-height: 200px;">')
                                        : '';
                                })
                                ->label('Aperçu de l\' image')
                                ->visible(fn ($record) => $record && $record->image),
                            CloudinaryFileUpload::make('image')
                                ->label('Charger une nouvelle image')
                                ->preserveFilenames()
                                ->image()
                                ->visible(fn ($record) => $record && $record->image),
                            TextInput::make('alt')
                                ->label('Alterner'),
                            TextInput::make('youtube')
                                ->label('Youtube'),
                            TextInput::make('vimeo')
                                ->label('Vimeo'),
                            Toggle::make('share_facebook')
                                ->onColor('success')
                                ->offColor('danger')
                                ->default(false),
                            Toggle::make('whatsapp')
                                ->onColor('success')
                                ->offColor('danger')
                                ->default(false),
                            TextInput::make('link'),
                        ])

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('date_published')
                    ->date('d/m/Y')
                    ->searchable()
                    ->sortable(),
                IconColumn::make('status')
                    ->label('statut')
                    ->toggleable()
                    ->sortable()
                    ->boolean()
                    ->label('Visibilité'),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
