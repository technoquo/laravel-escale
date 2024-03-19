<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\NumberTransport;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ColorColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ColorPicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NumberTransportResource\Pages;
use App\Filament\Resources\NumberTransportResource\RelationManagers;

class NumberTransportResource extends Resource
{
    protected static ?string $model = NumberTransport::class;

    protected static ?string $navigationIcon = 'heroicon-o-hashtag';

    protected static ?string $navigationGroup = 'Contact & Location';

    protected static ?int $navigationSort = 15;

    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                Section::make([
                    TextInput::make('number')->required(),
                    ColorPicker::make('color')->required(),                    
                    Select::make('transport_id')
                        ->relationship('transports', 'transport')
                        ->required()
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('transports.transport')
                ->label('Transport')
                ->searchable()
                ->sortable(),
                TextColumn::make('number')
                ->label('nombre')
                ->searchable()
                ->sortable(),
                ColorColumn::make('color')
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
            'index' => Pages\ListNumberTransports::route('/'),
            'create' => Pages\CreateNumberTransport::route('/create'),
            'edit' => Pages\EditNumberTransport::route('/{record}/edit'),
        ];
    }
}
