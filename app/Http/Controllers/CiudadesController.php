<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use App\Models\Country;

use App\Http\Requests\StoreCiudadesRequest;
use App\Http\Requests\UpdateCiudadesRequest;
use App\Models\City;
use App\Models\State;
use Symfony\Component\HttpFoundation\Request;

class CiudadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades = Ciudades::all(); 
        
        return view('ciudades.index')->with('ciudades',$ciudades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message="";
        $country = Country::all()->pluck('name','id');
        return view('ciudades.add')->with('message',$message)->with('country',$country);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCiudadesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();

        foreach($input['name'] as $name)
        {
         $request['name'] =$name;
         $ciudad = new Ciudades();
         $ciudad->create($request->all());

        }


      
        
        $message = "Nuevo elemento creado correctamente";
        return redirect(route('city.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ciudades  $ciudades
     * @return \Illuminate\Http\Response
     */
    public function show(Ciudades $ciudades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ciudades  $ciudades
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciudades $ciudades, $id)
    {
        $city = Ciudades::find($id);
        $country = Country::all()->pluck('name','id');

        $message = "";
        return view('ciudades.edit')->with('city',$city)->with('message',$message)->with('country',$country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCiudadesRequest  $request
     * @param  \App\Models\Ciudades  $ciudades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = Ciudades::find($id);


   
        
         
         $city->update($request->all());

   
         $message ="registro actualizado";

       return redirect()->route('city.index')
            ->with('message', $message);
   
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ciudades  $ciudades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ciudades $ciudades)
    {
        //
    }

    public function EstateByCountry($id)
    {
               return State::where('id_country', $id)->get();

    }
    public function CityByState($id)
    {
        return City::where('id_state',$id)->get();
    }
}
