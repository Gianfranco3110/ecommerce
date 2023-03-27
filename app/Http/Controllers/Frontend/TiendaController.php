<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index(){
        $productos = Product::with(['media'])->get();

        return view('frontend.tienda')->with('productos', $productos);
    }

    public function profile(){
        return view('frontend.cuenta');
    }

    
}
