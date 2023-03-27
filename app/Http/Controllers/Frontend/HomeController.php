<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Categorias;
use App\Models\sub_categorias;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $hastoken = null;
        if (Auth::user()) {
            $hastoken = User::find(Auth()->user()->id);   
            // dd($hastoken->device_token);
        }


        $productos = Product::where('productPromo',0)
        ->where('productTop',0)->with('media')->latest()->paginate(4);
        $promos = Product::where('productPromo',1)->latest()->with('media')->paginate(1);
        $productosTop = Product::where('productTop',1)->latest()->with('media')->paginate(4);
        $categoria = Categorias::paginate(1);

        $subCategorias = sub_categorias::all();
        
        return view('frontend.home')->with('productos', $productos)->with('promos', $promos)
        ->with('productosTop',$productosTop)
        ->with('subCategorias',$subCategorias)
        ->with('categoria', $categoria)
        ->with('hastoken', $hastoken);

    }

    // public function subCategory(){
    //     $miniCategorias = sub_categorias::with('media')->paginate(6);
    // }

    
    
}
