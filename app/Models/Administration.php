<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Administration extends Model
{
    use HasFactory;

    protected $fillable = ['organe'];

    // Define the relationship with Employee
    public function employees()
    {
        return $this->hasMany(Employee::class, 'administrations_id');
    }
}
