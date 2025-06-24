<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'name', 
        'issuer', 
        'issued_at', 
        'image', 
        'certificate_url',
    ];
}

