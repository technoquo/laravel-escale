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
                                ->label('Vimeo')
                                ->required(),
                            FileUpload::make('image')
                                ->required()
                                ->disk('public')
                                ->directory('thumbnail'),
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
                            FileUpload::make('attachment_roi')
                                ->required()
                                ->disk('public')
                                ->directory('pdf')
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
                            FileUpload::make('attachment_convention')
                                ->required()
                                ->disk('public')
                                ->directory('pdf')
                                ->acceptedFileTypes(['application/pdf']),
                            TextInput::make('name_type_3')
                                ->label('Type 3'),
                             FileUpload::make('attachment_scheduler')
                                ->required()
                                ->disk('public')
                                ->directory('pdf')
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
                    ->label('Attachment ROI')
                    ->trueIcon('heroicon-o-document')
                    ->action(function (AccompagnementType $record) {
                        $pdfPath = $record->generatePdf();
                        return response()->download($pdfPath);
                    }),
                IconColumn::make('attachment_scheduler')
                    ->label('Attachment Calendrier')
                    ->trueIcon('heroicon-o-document')
                    ->action(function (AccompagnementType $record) {
                        $pdfPath = $record->generatePdf();
                        return response()->download($pdfPath);
                    }),
                IconColumn::make('attachment_convention')
                    ->label('Attachment Convention')
                    ->trueIcon('heroicon-o-document')
                    ->action(function (AccompagnementType $record) {
                        $pdfPath = $record->generatePdf();
                        return response()->download($pdfPath);
                    }),
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
