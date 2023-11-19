<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
 //  protected $primaryKey = ['id_province','id_guide'];
protected $fillable = [ 'id_guide','id_province','title','description','base_price','image','added_on',/* other columns */ ];
// Define other relationships, scopes, etc. as needed
}
