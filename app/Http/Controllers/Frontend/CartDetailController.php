<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

class CartDetailController extends Controller
{
    public function store(Request $request, SessionManager $sessionManager){
        // quizas se deberia llamar con get_cart->id
        // dd(auth()->user()->get_cart->id);
        $current_cart_id = auth()->user()->get_cart->id;

        if($this->exists($request,$current_cart_id)){ 
            $sessionManager->flash('mensaje', 'Lo sentimos, el producto ya se encuentra en el carrito');
            // $error = "Lo sentimos, el producto ya se encuentra en el carrito";
            return back();
        }
        // dd("hola mundo");
        
        $cartDetail             = new CartDetail();
        # ¿A que carrito pertenece ?
        # definimos un campo cart en user que devuelva la informacion del carrito de compras
        # activo para ese usuario que esta en la sesion.
        # Definimos un accessor en el modelo User para poder obtener su id
        $cartDetail->cart_id    = $current_cart_id;
        $cartDetail->product_id = $request->product_id;
        # Buscamos el producto seleccionado para aumentar su nivel de popularidadad:
        # Se asume que cuando un usuario agrega un producto al carrito es porque le gustó
        # y tiene la intencion de comprarlo...
        // $product                = Product::find($request->product_id);
        // $product->popularity    = $product->popularity + 1;
        // $product->save();
        
        $cartDetail->quantity   = $request->quantity;
        $cartDetail->save();

        return Redirect('/');
        // $notification = "El producto se agregó exitosamente";
        // return back()->with(compact('notification'));
    }
    
    private function exists($request, $current_cart_id){
        /*
            Para comprobar si un producto ya existe en el carrito, se debe tener en cuenta que
            un usuario puede agregar un producto al carrito aun cuando el mismo producto este
            dentro de un pedido pendiente por procesar. Es decir, se puede agregar a un carrito
            con status Activo.

            Se debe preguntar si el producto existe en la tabla, si existe, se debe preguntar
            si el cart_id de ese producto dentro del carrito corresponde al cart_id del
            carrito actual del usuario logueado, auth()->user()->cart->id, devuelve el id
            del carrito que el usuario tiene activo en ese momento.     
        */

        $result = CartDetail::where(function ($query) use ($request){
            $query->where('product_id', '=', $request->product_id);
        })->where(function ($query) use ($current_cart_id){
            $query->where('cart_id', '=', $current_cart_id);
        })->exists();

        if($result)
            return true;
        else
            return false;
    }
}
