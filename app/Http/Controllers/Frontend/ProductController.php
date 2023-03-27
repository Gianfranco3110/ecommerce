<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id){
        // esta vista es un show del producto

        $producto = Product::where('id', $id)->with('media')->first();
        return view('frontend.product')->with(['producto' =>$producto]);

        
    }

    
}
