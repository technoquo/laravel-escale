<?php

namespace App\Filament\Resources\RoiResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = 'Éléments';

    public function form(Form $form): Form
    {
        return $form->schema([
            RichEditor::make('text')
                ->label('Texte')
                ->required()
                ->columnSpanFull(),
            TextInput::make('vimeo')
                ->label('ID Vimeo')
                ->placeholder('ex: 123456789')
                ->columnSpanFull(),
            Toggle::make('status')
                ->label('Visible')
                ->default(true)
                ->onColor('success')
                ->offColor('danger'),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('text')
                    ->label('Texte')
                    ->limit(60)
                    ->searchable(),
                TextColumn::make('vimeo')
                    ->label('Vimeo'),
                IconColumn::make('status')
                    ->label('Visible')
                    ->boolean()
                    ->toggleable()
                    ->sortable(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
