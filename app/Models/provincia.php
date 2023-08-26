<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provincia extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
    ];
    use HasFactory;
    public function destinos(){
        return $this-> hasMany(Destinos::class);
    }
}