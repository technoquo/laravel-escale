<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Slider;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Filters\TernaryFilter;
use App\Filament\Resources\SliderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Forms\Components\CloudinaryFileUpload;
use App\Filament\Resources\SliderResource\RelationManagers;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Accueil';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make([
                            TextInput::make('title')
                                ->label('Titre')
                                ->required(),
                            TextInput::make('description')
                                ->required(),
                        ])

                    ]),
                Group::make()
                    ->schema([
                        Section::make('Status')
                            ->schema([
                                Toggle::make('status')
                                    ->label('Visibility')
                                    ->helperText('Enable or disable products visibility')
                                    ->default(true),

                            ]),
                        Section::make('Slider')
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
                            ])->collapsible(),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('description')
                    ->searchable()
                    ->sortable(),
                IconColumn::make('status')
                    ->toggleable()
                    ->sortable()
                    ->boolean()
                    ->label('Visibility'),
            ])
            ->filters([
                TernaryFilter::make('status')
                    ->label('Visibility')
                    ->boolean()
                    ->trueLabel('Only Visible Product')
                    ->falseLabel('Only Hidden Product')
                    ->native(false),
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
