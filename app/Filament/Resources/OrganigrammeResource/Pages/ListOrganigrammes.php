<?php

namespace App\Filament\Resources\OrganigrammeResource\Pages;

use App\Filament\Resources\OrganigrammeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrganigrammes extends ListRecords
{
    protected static string $resource = OrganigrammeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
