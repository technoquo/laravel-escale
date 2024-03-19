<?php

namespace App\Filament\Resources\NumberTransportResource\Pages;

use App\Filament\Resources\NumberTransportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNumberTransports extends ListRecords
{
    protected static string $resource = NumberTransportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
