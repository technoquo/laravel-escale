<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Roi;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Forms\Components\CloudinaryFileUpload;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;
use App\Filament\Resources\RoiResource\Pages;
use App\Filament\Resources\RoiResource\RelationManagers;

class RoiResource extends Resource
{
    protected static ?string $model = Roi::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Groupe d\'accompagnement';

    protected static ?string $navigationLabel = 'ROI (Règlement d\'Ordre Intérieur)';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Group::make()->schema([
                Section::make([
                    TextInput::make('title')
                        ->label('Titre')
                        ->required()
                        ->maxLength(150)
                        ->columnSpanFull(),
                    CloudinaryFileUpload::make('pdf')
                        ->label('PDF')
                        ->preserveFilenames()
                        ->acceptedFileTypes(['application/pdf'])
                        ->visible(fn ($record) => !$record || !$record->pdf)
                        ->columnSpanFull(),
                    Placeholder::make('pdf_preview')
                        ->label('PDF actuel')
                        ->content(fn ($record) => $record && $record->pdf
                            ? new HtmlString('<a href="' . $record->pdf . '" target="_blank" class="text-primary">Voir le PDF</a>')
                            : '')
                        ->visible(fn ($record) => $record && $record->pdf),
                    CloudinaryFileUpload::make('pdf')
                        ->label('Remplacer le PDF')
                        ->preserveFilenames()
                        ->acceptedFileTypes(['application/pdf'])
                        ->visible(fn ($record) => $record && $record->pdf)
                        ->columnSpanFull(),
                    Toggle::make('status')
                        ->label('Visible')
                        ->default(true)
                        ->onColor('success')
                        ->offColor('danger'),
                ])->columns(2),
            ])->columnSpanFull(),
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
                TextColumn::make('items_count')
                    ->label('Éléments')
                    ->counts('items'),
                IconColumn::make('status')
                    ->label('Visible')
                    ->boolean()
                    ->toggleable()
                    ->sortable(),
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
            RelationManagers\ItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListRois::route('/'),
            'create' => Pages\CreateRoi::route('/create'),
            'edit'   => Pages\EditRoi::route('/{record}/edit'),
        ];
    }
}
