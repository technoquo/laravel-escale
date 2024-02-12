<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'svg', 'attachment', 'status'];

    public function generatePdf()
    {
        $pdfFilePath = public_path('/storage/' . $this->attachment_roi);

        return $pdfFilePath;
    }
}
