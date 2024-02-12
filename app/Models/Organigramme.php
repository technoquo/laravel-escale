<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organigramme extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'svg', 'attachment'];

    public function generatePdf()
    {
        $pdfFilePath = public_path('/storage/' . $this->attachment_roi);

        return $pdfFilePath;
    }
}
