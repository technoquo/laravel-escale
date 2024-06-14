<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\AccompagnementType;
use App\Models\Organigramme;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Response;



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

        // Initialize Cloudinary
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET')
            ],
        ]);

        // Extract the public ID from the Cloudinary URL
        $publicId = $this->extractPublicId($fileUrl);

        // Generate the direct download URL for the resource
        // $response = $cloudinary->adminApi()->asset($publicId, ['sign_url' => true]);

        // $privateDownloadUrl = $response['secure_url'];

        // Generate the private download URL for the resource
        $privateDownloadUrl = $cloudinary->uploadApi()->downloadArchiveUrl([
            'public_ids' => [$publicId],
            'sign_url' => true,
        ]);



        // Redirect the user to the private download URL
        return redirect()->away($privateDownloadUrl);
    }

    private function extractPublicId($url)
    {
        // Extract the public ID from the Cloudinary URL
        // Assuming the URL structure is https://res.cloudinary.com/{cloud_name}/{resource_type}/upload/{version}/{public_id}.{format}
        $urlParts = parse_url($url);
        $pathParts = explode('/', $urlParts['path']);
        $publicIdWithFormat = end($pathParts); // Get the last part which contains public_id.format
        $publicId = pathinfo($publicIdWithFormat, PATHINFO_FILENAME); // Extract the public_id without the format

        return $publicId;
    }
}
