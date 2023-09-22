<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinos extends Model
{
    protected $fillable = [
        'name',
        'province_id',
        'image_url',
    ];
    use HasFactory;
   
}
