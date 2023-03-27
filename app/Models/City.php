<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;


     public $table = 'cities';
    



    public $fillable = [
        'id_state',
        'name',
   
    ];

     public function satate()
    {
        return $this->belongsTo(\App\Models\State::class, 'id_state', 'id');
    }
}
