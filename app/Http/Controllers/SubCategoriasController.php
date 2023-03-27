<?php

namespace App\Http\Controllers;

use App\Models\Sub_categorias;
use App\Models\Categorias;

use App\Http\Requests\StoreSub_categoriasRequest;
use App\Http\Requests\UpdateSub_categoriasRequest;
use Symfony\Component\HttpFoundation\Request;

class SubCategoriasController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Sub_categorias::all();
        // dd($categories->image);
        return view('subcategorias.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message="";
        $categories = Categorias::all()->pluck('name','id');
        return view('subcategorias.add')->with('message',$message)->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSub_categoriasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Sub_categorias;

        $cat->name = $request->name;
        $cat->categoria_id = $request->categoria_id;
        $cat->status = $request->status;

    //   if($request->hasFile('image')){

    //         $cat->image=$request->file('image')->store('uploads', 'public'); //modificamos el archivo para que sea jpg y se guarde en uploads public, antes era un archivo temporal
    //     }
        if($request->hasFile('image')){
            $cat['image']=$request->file('image')->store('uploads', 'public'); //modificamos el archivo para que sea jpg y se guarde en uploads public, antes era un archivo temporal
        }

        // 

     
        $cat->save();
        $message = "Nuevo elemento creado correctamente";
        return redirect(route('subcat.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sub_categorias  $sub_categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Sub_categorias $sub_categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sub_categorias  $sub_categorias
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $subcategories = Sub_categorias::find($id);
        $categories = Categorias::all()->pluck('name','id');

        $message = "";
        return view('subcategorias.edit')->with('subcat',$subcategories)->with('message',$message)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSub_categoriasRequest  $request
     * @param  \App\Models\Sub_categorias  $sub_categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Sub_categorias::find($id);

        $cat->name = $request->name;
        $cat->categoria_id = $request->categoria_id;

        $cat->status = $request->status ;
        $categories = Categorias::all()->pluck('name','id');



         if($request->hasFile('image')){

            $cat->image=$request->file('image')->store('uploads', 'public'); //modificamos el archivo para que sea jpg y se guarde en uploads public, antes era un archivo temporal
        }
        $cat->save();
        $message = "Datos actualizados correctamente";
        return view('subcategorias.edit')->with('subcat',$cat)->with('message',$message)
        ->with('categories',$categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sub_categorias  $sub_categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub_categorias $sub_categorias)
    {
        //
    }
}
