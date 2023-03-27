<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
         public $table = 'states';
    



    public $fillable = [
        'id_country',
        'name'
   
    ];


      public function country()
    {
        return $this->belongsTo(\App\Models\Country::class, 'id_country', 'id');
    }


}
