<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Sponsor;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Filament\Resources\SponsorResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SponsorResource\RelationManagers;

class SponsorResource extends Resource
{
    protected static ?string $model = Sponsor::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Accueil';

    protected static ?int $navigationSort = 3;

    protected static ?string $label = 'Soutien';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Group::make()
                    ->schema([
                        Section::make('Soutien')
                            ->schema([
                                FileUpload::make('image')
                                    ->directory('form-attachments')
                                    ->preserveFilenames()
                                    ->image()
                                    ->imageEditor(),
                                TextInput::make('alt')
                                    ->label('Alt')
                                    ->required(),
                                TextInput::make('url')
                                    ->label('Lien')
                                    ->required(),
                            ]),
                        Section::make('Status')
                            ->schema([
                                Toggle::make('status')
                                    ->label('Visibility')
                                    ->helperText('Enable or disable products visibility')
                                    ->default(true),

                            ]),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('logo'),
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
            'index' => Pages\ListSponsors::route('/'),
            'create' => Pages\CreateSponsor::route('/create'),
            'edit' => Pages\EditSponsor::route('/{record}/edit'),
        ];
    }
}
