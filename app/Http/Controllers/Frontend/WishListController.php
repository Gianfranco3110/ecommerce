<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Product;

class WishListController extends Controller
{
    public function index(){

        $ventas = Sales::where('user_id', auth()->user()->id)->get();

        // dd($ventas);
        // foreach ($ventas as $venta) { 
        //     // dd($venta->Cart->details[0]->product);
        //     foreach ($venta->Cart->details as $item) {
        //         dd($item->product);
        //     }
        // }

        // intento de pasar un recorrido de ventas como un arreglo de datos a la vista
        // foreach ($ventas as $venta) {
        //     $ventadata = ['venta' => $venta];
        //     return $ventadata;
        // }

        // dd($ventadata);



        
        // dd($ventas);
        return view('frontend.wishlist')->with('ventas', $ventas);
    }
}
