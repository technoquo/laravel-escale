<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberTransport extends Model
{
    use HasFactory;

   
    protected $guarded = [];

    public function transports()
    {
        return $this->belongsTo(Transport::class, 'transport_id');
    }
    
}
