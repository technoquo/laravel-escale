<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConventionItem extends Model
{
    use HasFactory;

    protected $fillable = ['convention_id', 'text', 'vimeo', 'status'];

    public function convention()
    {
        return $this->belongsTo(Convention::class);
    }
}
