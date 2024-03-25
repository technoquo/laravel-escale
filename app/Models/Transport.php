<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function number_transports()
    {
        return $this->hasMany(NumberTransport::class, 'transport_id');
    }
}
