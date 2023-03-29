<?php

namespace App\Http\Controllers;

use App\Models\Customer_loyalties;
use App\Models\Categorias;
use App\Models\Product;
use App\Http\Requests\StoreCustomer_loyaltiesRequest;
use App\Http\Requests\UpdateCustomer_loyaltiesRequest;
use Symfony\Component\HttpFoundation\Request;
class CustomerLoyaltiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerLoyalty = Customer_loyalties::all();
        $count = count($customerLoyalty);
        // $array = [];
        for ($i=0; $i < $count ; $i++) { 
            $customerLoyalty[$i]->productos = json_decode($customerLoyalty[$i]->productos);
        }
        // dd($letras);
        return view('fidelizacion.index')->with('customerLoyalty',$customerLoyalty);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $message="";
        return view('fidelizacion.add')->with('message',$message)->with('product',$product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomer_loyaltiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $cl = new Customer_loyalties;
        $cl->name = $request->name;
        $cl->description = $request->description;
        $cl->monto = $request->monto;
        $cl->points = $request->points;
        //$cl->productos = $request->productos;
        $cl->active = $request->active === null ? 0 : $request->active;
        $cl->save();

        if ($request->productos != null){
            foreach ($request->productos as $p) {
                $aux = Product::find($p);
                $aux->customer_loyalties_id = $cl->id;
                $aux->save();
            }
        }

        // "_token" => "AtDXBwaxeI2jVe5i9rP4kwmTz5DewuXviiUAJgPn"
        // "name" => "CompraFestiva"
        // "description" => "la compra mayor a 50mil pesos"
        // "monto" => "50"
        // "points" => "30"
        // "productos" => "[{"id":"2","elemento":"Metras"},{"id":"1","elemento":"Lampara"}]"
        // "status" => "on"
        $message = "Datos actualizados correctamente";
        return redirect(route('fidel.index'))->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer_loyalties  $customer_loyalties
     * @return \Illuminate\Http\Response
     */
    public function show(Customer_loyalties $customer_loyalties)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer_loyalties  $customer_loyalties
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $product = Product::all();
        $cl = Customer_loyalties::find($id);
        $message = "";
        return view('fidelizacion.edit')->with('cl',$cl)->with('message', $message)->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomer_loyaltiesRequest  $request
     * @param  \App\Models\Customer_loyalties  $customer_loyalties
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $customerLoyalty = Customer_loyalties::find($id);

        $customerLoyalty->name = $request->name;
        $customerLoyalty->description = $request->description;
        $customerLoyalty->monto = $request->monto;
        $customerLoyalty->points = $request->points;
        //$customerLoyalty->productos = $request->productos;
        $customerLoyalty->active = $request->status === null ? 0 : $request->status ;
        $customerLoyalty->save();

        // "name" => "CompraFestiva"
        // "description" => "la compra mayor a 50mil pesos"
        // "monto" => "500"
        // "points" => "30"
        // "productos" => "[{"id":"1","elemento":"Lampara"},{"id":"2","elemento":"Metras"}]"
        $product = Product::all();
        $cl = Customer_loyalties::find($id);
        $message = "Datos actualizados correctamente";
        return view('fidelizacion.edit')->with('cl',$cl)->with('message', $message)->with('product', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer_loyalties  $customer_loyalties
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer_loyalties $customer_loyalties)
    {
        //
    }

    public function evaluarFidelizacion(Request $request)
    {

           try{
        $customer_loyalties = Customer_loyalties::find(3);
   
  dd($customer_loyalties);

             $response= ['data' => $cupon];
            } catch (\Exception $exception) {
        return response()->json([ 'message' => 'There was an error retrieving the records' ], 500);
    }
      return response()->json($response);

    
      
    }
}
