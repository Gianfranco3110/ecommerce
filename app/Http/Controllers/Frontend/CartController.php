<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CartDetail;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){

        $sum = 0;
        
        
        $query = CartDetail::where('sesionKey', '=', Session()->get('_token') )->where('cart_id','=',null)->get();
        
        // suma los precios de los productos que estan en el carrito
        foreach ($query as $item) {
            $sum += $item->product->price; 
        }
        
        // dd($cont);
        return view('frontend.cart')->with('query', $query)->with('sum', $sum);


    }
}
