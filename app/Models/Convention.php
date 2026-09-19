<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convention extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'pdf'];

    public function items()
    {
        return $this->hasMany(ConventionItem::class);
    }
}
