<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    //fillable
    protected $fillable = [
        'id_guide',
        //'id_package',
        'date',
       
        'number_people',
       
    ];
}
