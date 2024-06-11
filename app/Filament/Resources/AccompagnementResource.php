<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\Accompagnement;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AccompagnementResource\Pages;
use App\Filament\Resources\AccompagnementResource\RelationManagers;
use App\Filament\Forms\Components\CloudinaryFileUpload;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;

class AccompagnementResource extends Resource
{
    protected static ?string $model = Accompagnement::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'Groupe d\'accompagnement';

    protected static ?string $navigationLabel = 'ASBL';


    protected static ?int $navigationSort = 3;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make([
                            TextInput::make('title')->live()->required()->minLength(1)->maxLength(150)
                                ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                    if ($operation === 'edit') {
                                        return;
                                    }
                                    $set('slug', Str::slug($state));
                                }),
                            TextInput::make('slug')->required()->unique(ignoreRecord: true),
                            MarkdownEditor::make('description')
                                ->required(),

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
                            TextInput::make('youtube')
                                ->label('Youtube'),
                            TextInput::make('vimeo')
                                ->label('Vimeo'),

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
                    ->sortable()
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
            'index' => Pages\ListAccompagnements::route('/'),
            'create' => Pages\CreateAccompagnement::route('/create'),
            'edit' => Pages\EditAccompagnement::route('/{record}/edit'),
        ];
    }
}
