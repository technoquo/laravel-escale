<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Video;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use App\Filament\Resources\VideoResource\Pages;

class VideoResource extends Resource
{
    protected static ?string $model = Video::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    protected static ?string $navigationGroup = 'Photos & Données';

    protected static ?int $navigationSort = 12;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make([
                            TextInput::make('name')
                                ->label('Nom')
                                ->required(),
                            TextInput::make('title')
                                ->label('Titre')
                                ->required(),
                            TextInput::make('url')
                                ->label('URL Cloudinary')
                                ->url()
                                ->required()
                                ->columnSpanFull(),
                            DatePicker::make('published_at')
                                ->label('Date de publication')
                                ->columnSpanFull(),
                        ])->columns(2),
                    ])->columnSpan(2),

                Group::make()
                    ->schema([
                        Section::make([
                            Toggle::make('status')
                                ->label('Visible')
                                ->default(true),
                        ]),
                    ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nom')
                    ->searchable(),
                TextColumn::make('title')
                    ->label('Titre')
                    ->searchable(),
                TextColumn::make('url')
                    ->label('URL')
                    ->limit(40)
                    ->tooltip(fn ($record) => $record->url),
                TextColumn::make('published_at')
                    ->label('Date publication')
                    ->date('d/m/Y')
                    ->sortable(),
                IconColumn::make('status')
                    ->toggleable()
                    ->sortable()
                    ->boolean()
                    ->label('Visible'),
            ])
            ->filters([
                TernaryFilter::make('status')
                    ->label('Visibilité')
                    ->boolean()
                    ->trueLabel('Vidéos visibles')
                    ->falseLabel('Vidéos cachées')
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListVideos::route('/'),
            'create' => Pages\CreateVideo::route('/create'),
            'edit'   => Pages\EditVideo::route('/{record}/edit'),
        ];
    }
}
