<?php

namespace App\Filament\Resources\AccompagnementTypeResource\Pages;

use App\Filament\Resources\AccompagnementTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;


class EditAccompagnementType extends EditRecord
{
    protected static string $resource = AccompagnementTypeResource::class;

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


        if ($data['attachment_roi'] == null) {
            $data['attachment_roi'] = $record->attachment_roi;
        }

        if ($data['attachment_convention'] == null) {
            $data['attachment_convention'] = $record->attachment_convention;
        }

        if ($data['attachment_scheduler'] == null) {
            $data['attachment_scheduler'] = $record->attachment_scheduler;
        }



        $recordData = array_merge($data, ['image' =>  $data['image'], 'attachment_roi' =>  $data['attachment_roi'], 'attachment_convention' =>  $data['attachment_convention'], 'attachment_scheduler' =>  $data['attachment_scheduler']]);
        $record->update($recordData);

        return $record;
    }
}
