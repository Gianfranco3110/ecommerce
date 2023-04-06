<?php

namespace App\Http\Controllers;

use App\Models\CatalagoPremio;
use App\Models\detail;
use App\Models\User;


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

        $destinationPath = 'img/catalogo/code_'.$catalagoPremio->id;
        $file = $request->file('image');
        if ($request->hasFile('image')) {

            $myimage = $file->getClientOriginalName();
            // array_push($array_img_actual, $myimage);
            $file->move(public_path($destinationPath), $myimage);

            $productAux = CatalagoPremio::find($catalagoPremio->id);
            $productAux->image = $myimage;
            $productAux->save();
        }

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

        $destinationPath = 'img/catalogo/code_'.$catalagoPremio->id;
        $file = $request->file('image');
        if ($request->hasFile('image')) {

            $myimage = $file->getClientOriginalName();
            // array_push($array_img_actual, $myimage);
            $file->move(public_path($destinationPath), $myimage);

            CatalagoPremio::where('id',$catalagoPremio->id)->update([
                'image'=> $myimage
            ]);
        }

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
        // var_dump($request->data);
        try{
            $catalagoPremio = CatalagoPremio::find($request->id);
            // $points_actual = 
            if(auth()->user()->points >= $catalagoPremio->puntosValidar)
            {
                $validado =true;
                /* Crea la data en la tabla detalle producto*/
                $detail_premio = new detail;
                $detail_premio->catalogo_id = $request->id;
                $detail_premio->user_id = auth()->user()->id;
                $detail_premio->save();

                /*Actualiza los puntos del usuario */
                $user_points_update = User::find(auth()->user()->id);
                $user_points_update->points = (auth()->user()->points - $catalagoPremio->puntosValidar);
                $user_points_update->pointsCanjeado = $catalagoPremio->puntosValidar;
                $user_points_update->save();
            }
            $response= ['data' => $catalagoPremio,'validado'=>$validado,'points'=>auth()->user()->points,'pointsCanjeados'=>auth()->user()->pointsCanjeado];
        } catch (\Exception $exception) {
            return response()->json([ 'message' => 'There was an error retrieving the records' ], 500);
        }
        return response()->json($response);
    }
}
