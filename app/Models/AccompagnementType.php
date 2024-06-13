<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccompagnementType extends Model
{
    use HasFactory;

    protected $fillable = ["title", "description", "slug", "image", "video", "name_type_1", "description_roi", "attachment_roi", "name_type_2", "description_convention", "attachment_convention", "name_type_3", "attachment_scheduler"];


    public function generatePdf()
    {



        $pdfFilePath = public_path('/storage/' . $this->attachment_roi);

        return $pdfFilePath;
    }
}
