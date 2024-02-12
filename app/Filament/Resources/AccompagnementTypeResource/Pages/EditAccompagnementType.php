<?php

namespace App\Filament\Resources\AccompagnementTypeResource\Pages;

use App\Filament\Resources\AccompagnementTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccompagnementType extends EditRecord
{
    protected static string $resource = AccompagnementTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
