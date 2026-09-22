<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\AccompagnementType;
use App\Models\Organigramme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class DownloadController extends Controller
{

    protected $models = [
        'document' =>  Document::class,
        'accompagnementype' => AccompagnementType::class,
        'organigramme' => Organigramme::class,
        // Add more models as needed
    ];

    public function download($model, $attachment, $id)
    {
        if (!array_key_exists($model, $this->models)) {
            return Response::json(['error' => 'Model not found.'], 404);
        }


        // Resolve the model class from the array
        $modelClass = $this->models[$model];

        // Find the record in the resolved model class
        $record = $modelClass::findOrFail($id);

        switch ($attachment) {

            case 'attachment':
                $fileUrl = $record->attachment;
                break;
            case 'attachment_roi':
                $fileUrl = $record->attachment_roi;
                break;
            case 'attachment_convention':
                $fileUrl = $record->attachment_convention;
                break;
            case 'attachment_scheduler':
                $fileUrl = $record->attachment_scheduler;
                break;
        }
        if (!$fileUrl) {
            abort(404, 'File not found');
        }

        $extension = pathinfo($fileUrl, PATHINFO_EXTENSION) ?: 'pdf';
        $filename = Str::slug($record->title ?? 'document') . '.' . $extension;

        if (str_starts_with($fileUrl, 'http')) {
            $downloadUrl = preg_replace('/\/upload\//', '/upload/fl_attachment:' . Str::slug($record->title ?? 'document') . '/', $fileUrl, 1);
            return redirect()->away($downloadUrl);
        }

        return Storage::disk('public')->download($fileUrl, $filename);
    }
}
