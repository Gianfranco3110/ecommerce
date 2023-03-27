<?php

namespace App\Http\Controllers;

use App\Models\CatalagoPremio;
use Illuminate\Http\Request;

/**
* Class CatalagoPremioController
* @package App\Http\Controllers
*/
class CatalagoPremioController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $catalagoPremios = CatalagoPremio::paginate();
        
        return view('catalago-premio.index', compact('catalagoPremios'))
        ->with('i', (request()->input('page', 1) - 1) * $catalagoPremios->perPage());
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $catalagoPremio = new CatalagoPremio();
        return view('catalago-premio.create', compact('catalagoPremio'));
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        
        request()->validate(CatalagoPremio::$rules);
        $input = $request->all();
        
        if($request->hasFile('image')){
            
            $input['image']=$request->file('image')->store('uploads', 'public'); //modificamos el archivo para que sea jpg y se guarde en uploads public, antes era un archivo temporal
        }
        
        
        
        $catalagoPremio = CatalagoPremio::create($input);
        
        return redirect()->route('catalago-premios.index')
        ->with('success', 'Nuevo catalago agregado con exito.');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $catalagoPremio = CatalagoPremio::find($id);
        
        return view('catalago-premio.show', compact('catalagoPremio'));
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $catalagoPremio = CatalagoPremio::find($id);
        
        return view('catalago-premio.edit', compact('catalagoPremio'));
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @param  CatalagoPremio $catalagoPremio
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, CatalagoPremio $catalagoPremio)
    {
        
        $input = $request->all();
        
        if($request->hasFile('image')){
            
            $input['image']=$request->file('image')->store('uploads', 'public'); //modificamos el archivo para que sea jpg y se guarde en uploads public, antes era un archivo temporal
        }
        
        
        $catalagoPremio->update($input);
        
        return redirect()->route('catalago-premios.index')
        ->with('success', 'Catalago de Premio Actualizado con exito');
    }
    
    /**
    * @param int $id
    * @return \Illuminate\Http\RedirectResponse
    * @throws \Exception
    */
    public function destroy($id)
    {
        $catalagoPremio = CatalagoPremio::find($id)->delete();
        
        return redirect()->route('catalago-premios.index')
        ->with('success', 'CatalagoPremio deleted successfully');
    }
    
    public function evaluarPremio(Request $request)
    {
        $validado =false;

        
        try{
            
            $catalagoPremio = CatalagoPremio::find($request->id);
            if(auth()->user()->points >= $catalagoPremio->puntosValidar)
            {
               $validado =true;
            }

            
            
            
            $response= ['data' => $catalagoPremio,'validado'=>$validado,'points'=>auth()->user()->points,'pointsCanjeados'=>auth()->user()->pointsCanjeado];
        } catch (\Exception $exception) {
            return response()->json([ 'message' => 'There was an error retrieving the records' ], 500);
        }
        return response()->json($response);
        
        
        
    }
}