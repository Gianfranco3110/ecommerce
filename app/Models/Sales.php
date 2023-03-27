<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;


  public $table = 'sales';
    



    public $fillable = [
        'delivery_address_id',
        'user_id',
        'coupon',
        'total',
        'status',
        'payment',
        'cart_id'

  
    ];


    public function Cart(){
      return $this->belongsTo(\App\Models\Cart::class, 'cart_id', 'id');

      
    }

       public function user(){
      return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');

      
    }
       
       


}
