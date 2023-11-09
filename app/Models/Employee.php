<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'position', 'image', 'position', 'administrations_id', 'status'];


    public function administrations(): BelongsTo
    {

        return $this->belongsTo(Administration::class);
    }

    public function position()
    {
        return $this->belongsTo(Administration::class, 'administration_id');
    }
}
