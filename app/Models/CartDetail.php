<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{

       public $table = 'cart_details';
    



    public $fillable = [
        'cart_id',
    
    ];




    //para que desde un detalle se pueda acceder al producto
    // CartDetail N                  1 Product 
    // Un producto puede aparecer en varios carritos de compra
    // se pude asociar con varios detalles de carritos de compras
    public function product(){
        #Un detalle de un carrito de compras pertence a un producto
        return $this->belongsTo(Product::class)->with('media');
        
    }

}
