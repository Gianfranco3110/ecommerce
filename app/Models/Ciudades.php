<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
    use HasFactory;

         public $table = 'ciudades';
    



    public $fillable = [
        
        'name',
        'status',
        'pais',
        'estado'
   
    ];


          public function estadoName()
    {
        return $this->belongsTo(\App\Models\State::class, 'estado', 'id');
    }

          public function paisName()
    {
        return $this->belongsTo(\App\Models\Country::class, 'pais', 'id');
    }

}
