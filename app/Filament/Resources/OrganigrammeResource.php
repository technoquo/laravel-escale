<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Organigramme;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrganigrammeResource\Pages;
use App\Filament\Resources\OrganigrammeResource\RelationManagers;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Forms\Components\CloudinaryFileUpload;

class OrganigrammeResource extends Resource
{
    protected static ?string $model = Organigramme::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Documents';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    TextInput::make('title')
                        ->label('titre'),
                    CloudinaryFileUpload::make('attachment')
                        ->label('Joindre le fichier PDF')
                        ->preserveFilenames()
                        ->acceptedFileTypes(['application/pdf'])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                IconColumn::make('attachment')
                    ->label('Attachment')
                    ->url(fn (Organigramme $record) => route('download.file',  ['model' => 'organigramme', 'id' => $record->id]))
                    ->trueIcon('heroicon-o-document'),
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
            'index' => Pages\ListOrganigrammes::route('/'),
            'create' => Pages\CreateOrganigramme::route('/create'),
            'edit' => Pages\EditOrganigramme::route('/{record}/edit'),
        ];
    }
}
