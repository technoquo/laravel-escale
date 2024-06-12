<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use App\Models\AccompagnementType;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AccompagnementTypeResource\Pages;
use App\Filament\Resources\AccompagnementTypeResource\RelationManagers;
use App\Filament\Forms\Components\CloudinaryFileUpload;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;


class AccompagnementTypeResource extends Resource
{
    protected static ?string $model = AccompagnementType::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Groupe d\'accompagnement';

    protected static ?string $navigationLabel = 'Accompagnements';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make([
                            TextInput::make('title')->live()->required()->minLength(1)->maxLength(150)
                                ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                    if ($operation === 'edit') {
                                        return;
                                    }
                                    $set('slug', Str::slug($state));
                                }),
                            TextInput::make('slug')->required()->unique(ignoreRecord: true),
                            MarkdownEditor::make('description')
                                ->toolbarButtons([
                                    'attachFiles',
                                    'blockquote',
                                    'bold',
                                    'bulletList',
                                    'codeBlock',
                                    'heading',
                                    'italic',
                                    'link',
                                    'orderedList',
                                    'redo',
                                    'strike',
                                    'table',
                                    'undo',
                                ])
                                ->required(),

                        ])

                    ])->columns(2),
                Group::make()
                    ->schema([
                        Section::make([
                            TextInput::make('video')
                                ->label('Vimeo'),
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
                            TextInput::make('name_type_1')
                                ->label('Type 1'),
                            MarkdownEditor::make('description_roi')
                                ->label('Description')
                                ->toolbarButtons([
                                    'attachFiles',
                                    'blockquote',
                                    'bold',
                                    'bulletList',
                                    'codeBlock',
                                    'heading',
                                    'italic',
                                    'link',
                                    'orderedList',
                                    'redo',
                                    'strike',
                                    'table',
                                    'undo',
                                ]),
                            CloudinaryFileUpload::make('attachment_roi')
                                ->label('Attachment Roi')
                                ->preserveFilenames()
                                ->acceptedFileTypes(['application/pdf']),
                            TextInput::make('name_type_2')
                                ->label('Type 2'),
                            MarkdownEditor::make('description_convention')
                                ->label('Description')
                                ->toolbarButtons([
                                    'attachFiles',
                                    'blockquote',
                                    'bold',
                                    'bulletList',
                                    'codeBlock',
                                    'heading',
                                    'italic',
                                    'link',
                                    'orderedList',
                                    'redo',
                                    'strike',
                                    'table',
                                    'undo',
                                ]),
                            CloudinaryFileUpload::make('attachment_convention')
                                ->label('Attachment Convention')
                                ->preserveFilenames()
                                ->acceptedFileTypes(['application/pdf']),
                            TextInput::make('name_type_3')
                                ->label('Type 3'),
                            CloudinaryFileUpload::make('attachment_scheduler')
                                ->label('Attachment Scheduler')
                                ->preserveFilenames()
                                ->acceptedFileTypes(['application/pdf']),

                        ])

                    ]),
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

                IconColumn::make('attachment_roi')
                    ->label('attachment_roi')
                    ->url(fn (AccompagnementType $record) => route('download.file', ['model' => 'accompagnementype', 'id' => $record->id, 'attachment' => $record->attachment_roi]))
                    ->trueIcon('heroicon-o-document'),

                IconColumn::make('attachment_scheduler')
                    ->label('attachment_scheduler')
                    ->url(fn (AccompagnementType $record) => route('download.file', ['model' => 'accompagnementype', 'id' => $record->id, 'attachment' => $record->attachment_scheduler]))
                    ->trueIcon('heroicon-o-document'),
                IconColumn::make('attachment_convention')
                    ->label('attachment_convention')
                    ->url(fn (AccompagnementType $record) => route('download.file', ['model' => 'accompagnementype', 'id' => $record->id, 'attachment' => $record->attachment_convention]))
                    ->trueIcon('heroicon-o-document'),
                ImageColumn::make('image')
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
            'index' => Pages\ListAccompagnementTypes::route('/'),
            'create' => Pages\CreateAccompagnementType::route('/create'),
            'edit' => Pages\EditAccompagnementType::route('/{record}/edit'),
        ];
    }
}
