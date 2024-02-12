<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'image', 'alt', 'vimeo', 'youtube', 'share_facebook', 'whatsapp', 'link', 'date_published', 'status'
    ];
}
