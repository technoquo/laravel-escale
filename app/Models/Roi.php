<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roi extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'pdf'];

    public function items()
    {
        return $this->hasMany(RoiItem::class);
    }
}
