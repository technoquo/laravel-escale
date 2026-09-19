<?php

namespace App\Filament\Resources\RoiResource\Pages;

use App\Filament\Resources\RoiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRois extends ListRecords
{
    protected static string $resource = RoiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
