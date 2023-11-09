<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Employee;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;

use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EmployeeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmployeeResource\RelationManagers;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Equipe';



    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make([
                            TextInput::make('firstname')->required(),
                            TextInput::make('lastname')->required(),
                            TextInput::make('position'),
                            Select::make('administration_id')
                                ->relationship('administrations', 'organe')
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
                            FileUpload::make('image')
                                ->disk('public')
                                ->directory('thumbnail')
                                ->required()


                        ])

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('firstname')
                    ->label('nom')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('lastname')
                    ->label('noms')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('position')
                    ->label('position')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('position.organe')
                    ->label('Administration')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
