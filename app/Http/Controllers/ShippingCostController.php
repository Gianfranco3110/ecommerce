<?php

namespace App\Http\Controllers;

use App\Models\ShippingCost;
use App\Models\DeliveryAddress;

use App\Models\Ciudades;

use Illuminate\Http\Request;

/**
 * Class ShippingCostController
 * @package App\Http\Controllers
 */
class ShippingCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippingCosts = ShippingCost::paginate();
        

        return view('shipping-cost.index', compact('shippingCosts'))
            ->with('i', (request()->input('page', 1) - 1) * $shippingCosts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudad = Ciudades::all()->pluck('name','name');
        $shippingCost = new ShippingCost();
        return view('shipping-cost.create', compact('shippingCost','ciudad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ShippingCost::$rules);


         

        $shippingCost = ShippingCost::create($request->all());

        return redirect()->route('shipping-costs.index')
            ->with('success', 'Costo de envio Creado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shippingCost = ShippingCost::find($id);

        return view('shipping-cost.show', compact('shippingCost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shippingCost = ShippingCost::find($id);
        $ciudad = Ciudades::all()->pluck('name','name');


        return view('shipping-cost.edit', compact('shippingCost','ciudad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ShippingCost $shippingCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShippingCost $shippingCost)
    {
        request()->validate(ShippingCost::$rules);

        $shippingCost->update($request->all());

        return redirect()->route('shipping-costs.index')
            ->with('success', 'Costo de envio Actualizado con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $shippingCost = ShippingCost::find($id)->delete();

        return redirect()->route('shipping-costs.index')
            ->with('success', 'ShippingCost deleted successfully');
    }

    public function totalShippingCost(Request $request)
    {

    

           try{
        $deliveryAddress = DeliveryAddress::find($request['id']);
        $shippingCost = ShippingCost::where('ciudad_destino',$deliveryAddress->ciudad)->get()->first();

    

             $response= ['data' => $shippingCost->valor];
            } catch (\Exception $exception) {
        return response()->json([ 'message' => 'There was an error retrieving the records' ], 500);
    }
      return response()->json($response);

    
      
    }
}
