<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DeliveryAddress;
use Illuminate\Http\Request;
use App\Models\Ciudades;
use App\Models\CatalagoPremio;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Coupon;
use App\Models\ShippingCost;
use App\Models\User;
use App\Models\Customer_loyalties;
use App\Models\Sales;
use Cart2;
use Carbon\Carbon;










use App\Models\Country;
use App\Models\State;

class CheckoutController extends Controller
{
    public function index(){
        
        $estados=[];
        $ciudades = Ciudades::all();
        
        foreach($ciudades as $c)
        {
            
            $estados[]= State::find($c->estado);
            
        }
        
        $catalagos = CatalagoPremio::where('status','=',1)->get();
        
        
        $paises = Country::find($ciudades[0]->pais);
        
        
        $deliveryAddress = DeliveryAddress::where('user_id',auth()->user()->id)->get();
        return view('frontend.checkout')
        ->with('estados',$estados)->with('paises',$paises)->with('ciudades',$ciudades)
        ->with('deliveryAddress',$deliveryAddress)
        ->with('catalagos',$catalagos);
        
    }
    
    public function factura(Request $request)
    {
        $total =0;
        $input = $request->all();
        $user = User::find(auth()->user()->id);
        $cart  = Cart::where('sesionKey',Session()->get('_token'))->where('status','Active')->get()->first();
        if($cart)
        {
            $cart->user_id= auth()->user()->id;
            $cart->status= 'Pendiente';
            
            $cart->save();
            
        }
        
        
        $cartDetail = CartDetail::where('sesionKey',Session()->get('_token'))->where('cart_id',null)->get();
        if($cartDetail)
        {
            foreach($cartDetail as $cd)
            

            {
            $cd->update(['cart_id' => $cart->id]);
            $total+=$cd->product->price;

            }

           
            
            
        }


        $deliveryAddress = DeliveryAddress::find($input['direccionEntrega']);
        $shippingCost = ShippingCost::where('ciudad_destino',$deliveryAddress->ciudad)->get()->first();

        $total = $total + $shippingCost->valor;

  
        
        
        
        if(isset($input['catalago']))
        {
            $catalagoPremio = CatalagoPremio::find($input['catalago']);
            if($user->points >= $catalagoPremio->puntosValidar)
            {
               
                $total = $total - $catalagoPremio->valorDescuento;
                $user->points = $user->points - $catalagoPremio->puntosValidar;
                $user->pointsCanjeado+= $catalagoPremio->puntosValidar;
                $user->save();
                
            }
            
        }

        
        
        if(isset($input['cupon']))
        {
            $cupon = Coupon::where('codigo',$input['cupon'])->get()->first();
            
            if($cupon)
            {
                $cupon->number_exchange = $cupon->number_exchange +1;
                $cupon->save();
                
                
                if($cupon->number_exchange >= $cupon->max_change)
                
                {
                    $cupon->active = 0;
                    $cupon->save();
                }

                if($cupon->type == 'total_amount')
                {
                    $total = $total - $cupon->amount;

                }else{

                    $total = $total - $total *($cupon->amount/100);

                }
                
                
            }
            
            
     
            
        }
        $fidelizacion = Customer_loyalties::where('active',1)->get();

        $lenght =sizeof($fidelizacion);

        foreach($fidelizacion as $key=>$f)
        {
            if($total > $f->monto)
            {
                if($key == $lenght - 1  )
                {
                    $user->points+= $f->points;
                    $user->save();
                }

            }else{
                $user->points+=$fidelizacion[$lenght - 1]->points;
                $user->save();
            }


        }

        $sales = new Sales();

        $sales->delivery_address_id = $deliveryAddress->id;
        $sales->user_id = $user->id;
        $sales->total = $total;
        $sales->cart_id = $cart->id;
        $sales->coupon =$cupon->codigo ;
        $sales->status ="Orden en Proceso" ;
        $sales->save();

        foreach($cartDetail as $cd)
        {
             Cart2::remove(['id' => $cd->product->id]);

             
        }
            // fecha actual para la factura
            $now = new Carbon();
            $now = $now->format('Y-m-d H:i'); 
            // dd($cartDetail->product->id);
        
        return view('frontend.factura')->with('cartDetail',$cartDetail)->with('total',$total)->with('sales',$sales)->with('shippingCost', $shippingCost)->with('deliveryAddress', $deliveryAddress)->with('now', $now);

    }
}
