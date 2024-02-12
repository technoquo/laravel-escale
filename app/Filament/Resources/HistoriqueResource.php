<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Historique;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HistoriqueResource\Pages;
use App\Filament\Resources\HistoriqueResource\RelationManagers;

class HistoriqueResource extends Resource
{
    protected static ?string $model = Historique::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

    protected static ?string $navigationGroup = 'Photos & Données';

    protected static ?int $navigationSort = 11;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make([
                            MarkdownEditor::make('description')
                                ->required(),
                            TextInput::make('year')
                                ->label('année')
                                ->required(),
                            Toggle::make('status')
                                ->onColor('success')
                                ->offColor('danger')
                                ->default(true)
                        ])

                    ])->columns(2),
                Group::make()
                    ->schema([
                        Section::make([
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

                TextColumn::make('year')
                    ->label('année'),
                IconColumn::make('status')
                    ->toggleable()
                    ->sortable()
                    ->boolean()
                    ->label('Visibility'),
            ])
            ->filters([
                TernaryFilter::make('status')
                    ->label('Visibilité')
                    ->boolean()
                    ->trueLabel('Seule année visible')
                    ->falseLabel('Seule l\'année cachée')
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
            'index' => Pages\ListHistoriques::route('/'),
            'create' => Pages\CreateHistorique::route('/create'),
            'edit' => Pages\EditHistorique::route('/{record}/edit'),
        ];
    }
}
