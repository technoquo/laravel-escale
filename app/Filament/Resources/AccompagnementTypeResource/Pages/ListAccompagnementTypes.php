<?php

namespace App\Filament\Resources\AccompagnementTypeResource\Pages;

use App\Filament\Resources\AccompagnementTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAccompagnementTypes extends ListRecords
{
    protected static string $resource = AccompagnementTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
