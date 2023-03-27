<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartDetail;
use Session;

use Cart2;
use Darryldecode\Cart\Cart as CartCart;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;

/**
 * Class CartController
 * @package App\Http\Controllers
 */
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::paginate();

        return view('cart.index', compact('carts'))
            ->with('i', (request()->input('page', 1) - 1) * $carts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart = new Cart();
        return view('cart.create', compact('cart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cart::$rules);

        $cart = Cart::create($request->all());

        return redirect()->route('carts.index')
            ->with('success', 'Cart created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = Cart::find($id);

        return view('cart.show', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cart = Cart::find($id);

        return view('cart.edit', compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        request()->validate(Cart::$rules);

        $cart->update($request->all());

        return redirect()->route('carts.index')
            ->with('success', 'Cart updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cart = Cart::find($id)->delete();

        return redirect()->route('carts.index')
            ->with('success', 'Cart deleted successfully');
    }

     public function add(Request $request) {


        $input = $request->all();

        $product = Product::find($request->product_id);  
       
        Cart2::add(
            $product->id,
            $product->name,
            $product->price,
            $input['quantity'],
         
        );

        $cart  = Cart::where('sesionKey',Session()->get('_token'))->where('status','=','Active')->get()->first();
   

        if(!$cart)
        {

        $cart = new Cart();
        $cart->status = 'Active';
        $cart->sesionKey = Session()->get('_token');
        $cart->save();

        }

        $producInCart = CartDetail::where('product_id',$request->product_id)->where('cart_id','=',null)->where('sesionKey',Session()->get('_token'))->get()->first();
        if(!$producInCart)
        {
         $cartDetail    = new CartDetail();
      
        $cartDetail->sesionKey    =Session()->get('_token');
        $cartDetail->product_id = $request->product_id;

        
        $cartDetail->quantity   = $request->quantity;
        $cartDetail->save();
      

        }
 
        

   


        
        return back()->with('mensaje', "$product->name ! Se ha Agregado al carrito de compra");


    }

    public function remover (Request $request){

             $product = Product::find($request->id);
               $cartDetail = CartDetail::where('product_id',$product->id)->where('cart_id','=',null)->where('sesionKey',Session()->get('_token'))->first();
                if($cartDetail)
                {
             $cartDetail->delete();


                }
             Cart2::remove(['id' => $request->id]);

        return back()->with('mensaje', "$product->name ! Se ha eliminado del carrito de compra");





    }
}
