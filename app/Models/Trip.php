<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    //fillable
    protected $fillable = [
   
        //'id_package',
        'date',
       'id_guide',
         'id_tourist',
         'id_package',
         'price',
         'is_accepted',
        'number_people',
       
    ];
}
