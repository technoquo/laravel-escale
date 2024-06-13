<?php

namespace App\Filament\Resources\AccompagnementResource\Pages;

use App\Filament\Resources\AccompagnementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditAccompagnement extends EditRecord
{
    protected static string $resource = AccompagnementResource::class;

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


        $recordData = array_merge($data, ['image' =>  $data['image']]);
        $record->update($recordData);

        return $record;
    }
}
