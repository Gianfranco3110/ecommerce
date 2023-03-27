<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Dimensione;
use App\Models\Size;





class AttributeController extends Controller
{
    
        public function index()
    {

        $brands = Brand::paginate();
        $dimensiones = Dimensione::all();
        $sizes = Size::all();
        $colors = Color::all();





        return view('atributos.index', compact('brands','dimensiones','sizes','colors'))
            ->with('i', (request()->input('page', 1) - 1) * $brands->perPage());
    }
}
