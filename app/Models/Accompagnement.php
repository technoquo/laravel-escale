<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accompagnement extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'image', 'youtube', 'vimeo'];
}
