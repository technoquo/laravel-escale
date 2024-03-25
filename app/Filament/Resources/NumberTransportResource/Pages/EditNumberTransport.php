<?php

namespace App\Filament\Resources\NumberTransportResource\Pages;

use App\Filament\Resources\NumberTransportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNumberTransport extends EditRecord
{
    protected static string $resource = NumberTransportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
