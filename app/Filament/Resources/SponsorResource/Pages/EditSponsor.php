<?php

namespace App\Filament\Resources\SponsorResource\Pages;

use App\Filament\Resources\SponsorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditSponsor extends EditRecord
{
    protected static string $resource = SponsorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }



    protected function handleRecordUpdate(Model $record, array $data): Model
    {

        if ($data['image'] == null) {
            $data['image'] = $record->image;
        }

        $recordData = [
            'image' => $data['image'], // Assuming this is the Cloudinary URL
            'alt' => $data['alt'],
            'url' => $data['url'],
            'status' => $data['status'],
        ];


        $record->update($recordData);

        return $record;
    }
}
