<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Thiagoprz\EloquentCompositeKey\HasCompositePrimaryKey;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class PackageModel extends Model
{
  

    protected $primaryKey = ['id_province','id_guide'];
    protected $fillable = [ 'id_province', 'id_guide',/* other columns */ ];
    // Define other relationships, scopes, etc. as needed


   use HasFactory;
}
