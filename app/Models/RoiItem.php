<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoiItem extends Model
{
    use HasFactory;

    protected $fillable = ['roi_id', 'text', 'vimeo', 'status'];

    public function roi()
    {
        return $this->belongsTo(Roi::class);
    }
}
