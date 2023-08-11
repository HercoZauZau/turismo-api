<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinos extends Model
{
    protected $fillable = [
        'nome',
        'provincia',
        'image_url',
    ];
    use HasFactory;
}
