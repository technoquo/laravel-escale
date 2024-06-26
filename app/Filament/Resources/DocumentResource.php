<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Document;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DocumentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DocumentResource\RelationManagers;
use App\Filament\Forms\Components\CloudinaryFileUpload;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Documents';

    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('titre'),
                TextInput::make('description')
                    ->label('Description'),
                TextInput::make('svg'),
                Toggle::make('status')
                    ->onColor('success')
                    ->offColor('danger')
                    ->default(true),
                CloudinaryFileUpload::make('attachment')
                    ->label('Joindre le fichier PDF')
                    ->preserveFilenames()
                    ->acceptedFileTypes(['application/pdf'])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                IconColumn::make('attachment')
                    ->label('Attachment')
                    ->url(fn (Document $record) => route('download.file',  ['model' => 'document', 'id' => $record->id]))
                    ->trueIcon('heroicon-o-document'),
                // IconColumn::make('attachment')
                //     ->label('Attachment')
                //     ->trueIcon('heroicon-o-document')
                //     ->action(function (Document $record) {
                //         $pdfPath = $record->generatePdf();
                //         return response()->download($pdfPath);
                //     }),
                IconColumn::make('status')
                    ->label('status')
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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
