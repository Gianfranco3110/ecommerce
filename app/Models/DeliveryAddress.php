<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;

     public $table = 'delivery_address';

       public $fillable = [
       
    'user_id',
    'name',
    'ciudad',
    'estado',
    'direccion',
    'codigoPostal',
    'Pais'
         
        
    ];
    
}
