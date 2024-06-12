<?php

namespace App\Filament\Resources\OrganigrammeResource\Pages;

use App\Filament\Resources\OrganigrammeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditOrganigramme extends EditRecord
{
    protected static string $resource = OrganigrammeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {


        if ($data['attachment'] == null) {
            $data['attachment'] = $record->attachment;
        }


        $recordData = array_merge($data, ['attachment' =>  $data['attachment']]);
        $record->update($recordData);

        return $record;
    }
}
