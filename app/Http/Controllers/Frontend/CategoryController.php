<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Categorias;
use App\Models\Product;


use App\Http\Controllers\Controller;
use App\Models\Sub_categorias;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categorias = Categorias::all();
        return view('frontend.categoria')->with('categorias', $categorias);
    }

    public function show($id){

        //este $id es la categoria que se esta consultando al darle clink alla
        $subcategorias =Sub_categorias::where('categoria_id',$id)->with(['productos'])->get();

        // foreach($subcategorias as $ca)
        // {
        //     dd('hola');
        //     //aqui imprimimos el nombre la subcategoria 

        //    foreach($ca->productos as $p)
        //    {
        //     //aqui las tarjetas de los productos
        //     dd($p);
        //    }

        // }

         ///esta variable te trae las subcategorias asociadas al el $id que es la categoria y a su vez la subcategoria traee todoss los productos asociados a ella listos para pintar en el frontend
        //si quitas el dd veras como debe aparecer el frontend
            // dd($subcategorias);
            // $hello = "hola mundo";
        return view('frontend.SubCategoria')->with('subcategorias', $subcategorias);
    }
}
