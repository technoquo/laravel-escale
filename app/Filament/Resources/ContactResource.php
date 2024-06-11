<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Forms\Components\CloudinaryFileUpload;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-at-symbol';

    protected static ?string $navigationGroup = 'Contact & Location';

    protected static ?int $navigationSort = 13;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom_contact')
                    ->maxLength(255),
                Forms\Components\MarkdownEditor::make('description_contact')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('bureau')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tel')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('gsm')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('facebook')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instagram')
                    ->maxLength(255),
                Forms\Components\TextInput::make('horaire')
                    ->maxLength(255),
                Forms\Components\MarkdownEditor::make('don')
                    ->maxLength(65535)
                    ->columnSpanFull(),

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
                Forms\Components\TextInput::make('alt')
                    ->label('Alterner'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom_contact')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tel')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gsm')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
