<?php

namespace App\Filament\Forms\Components;


use Cloudinary\Api\Upload\UploadApi;
use Filament\Forms\Components\FileUpload;

class CloudinaryFileUpload extends FileUpload
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->saveUploadedFileUsing(function ($file) {
            // Upload the file to Cloudinary
            $uploadedFile = (new UploadApi())->upload($file->getRealPath());
            // Return the URL of the uploaded file
            return $uploadedFile['secure_url'];
        });
    }
}
