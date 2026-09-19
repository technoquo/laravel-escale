<?php

namespace App\Filament\Resources\RoiResource\Pages;

use App\Filament\Resources\RoiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRoi extends EditRecord
{
    protected static string $resource = RoiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
