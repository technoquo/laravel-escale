<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Gallery;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GalleryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Filament\Forms\Components\CloudinaryFileUpload;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';


    protected static ?string $navigationGroup = 'Photos & Données';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make([
                            TextInput::make('title')
                                ->required(),
                            TextInput::make('alt')
                                ->required(),
                        ])

                    ]),
                Group::make()
                    ->schema([
                        Section::make('Status')
                            ->schema([
                                Toggle::make('status')
                                    ->label('Visibilité')
                                    ->helperText('Activer ou désactiver la visibilité des années')
                                    ->default(true),

                            ]),
                        Section::make('Images')
                            ->schema([
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
                                Select::make('year_id')
                                    ->label('année')
                                    ->relationship('years', 'title')
                                    ->required(),
                            ])->collapsible(),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('image')
                    ->label('photos'),
                TextColumn::make('years.title')
                    ->label('Année')
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
