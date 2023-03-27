<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DeliveryAddress;

use App\Models\Roles;
use App\Models\Product;
use App\Models\Ciudades;
use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Session\SessionManager;


class userController extends Controller
{
    //tomar esta logica para el login del frontend
    public function indexView(){
  
        $message="";
       
        // $users = User::where('rol','<>','1')->get();

   
        // $count = count($users);
        $product = Product::all();
        $count = count($product);
        for ($i=0; $i < $count  ; $i++) { 
            $product[$i]->image = json_decode($product[$i]->image);
        }
        return view('/Dashboard')->with('message',$message)->with('count',$count)->with('product',$product);
        // return view('customers.list');
    }

    public function usuarioLogin(SessionManager $sessionManager){

        if(auth()->attempt(request(['email', 'password'])) == false){
        
            return back()->withErrors([
                $sessionManager->flash('mensaje', 'hay un error en los datos del login')
            ]);
        }
        return redirect()->to('/');
    }

    public function create(){

        $estados=[];
        $ciudades = Ciudades::all();

        foreach($ciudades as $c)
        {

            $estados[]= State::find($c->estado);

        }
      

        $paises = Country::find($ciudades[0]->pais);
   

        
        return view('frontend.register')->with('paises',$paises)->with('estados',$estados)->with('ciudades',$ciudades);
    }

    public function store(Request $request){
        
        $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required'

        ]);


        $user = new User();

        $user->name = $request->name;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->whatsapp =  $request->whatsapp;
        $user->password = bcrypt($request['password']);
        $user->points = 0;
        $user->avatar = "hola mundo :D";
        $user->status = 1;
        $user->country_id = 0;
        $user->city_id = 0;
        $user->points = 0;
        // dd($user->password);
        $user->save();
        $user->assignRole('cliente');

        // login here
        // if(\Auth::attempt($request->only('email', 'password'))){

        //     return redirect()->to('/');
        // }

        // return redirect('register.crate');

        $deliveryAddress = new DeliveryAddress();
        $deliveryAddress->user_id =$user->id;
        $deliveryAddress->codigoPostal =$request['codigoPostal'];
        $deliveryAddress->pais =$request['pais'];
        $deliveryAddress->ciudad =$request['ciudad'];
        $deliveryAddress->estado =$request['estado'];
        $deliveryAddress->name =$request['nameDireccion'];
        $deliveryAddress->direccion =$request['direccion'];

        $deliveryAddress->save();

        return redirect()->to('/');






        
    }

    public function destroy(){
        $user = User::all();
        auth()->logout(); 
        return redirect()->to('/');
    }

    public function usuarios(){
       
        
        $users = User::all();

        $users = User::ordenar($users)->paginate(10);
           
        // $roles = Roles::all();
      
        $count = count($users);
        // $count2 = count($roles);
        // for ($i=0; $i < $count; $i++) { 
        //  for ($k=0; $k < $count2 ; $k++) {
        //     if($users[$i]->rol == $roles[$k]->id){
        //         $users[$i]->rol = $roles[$k]->name;
        //     }
        //    }
        // }

        return view('customers.list')->with('users',$users);
    }

    public function newUser(){
        $user = new User;
        $roles = Roles::where('name','<>','super admin')->get()->pluck('name','id');
        $message = "";
        return view('customers.newUser')->with('user',$user)->with('roles',$roles)->with('message',$message);
    }
    
    public function storeUser(Request $request){
        $users = User::all();
        $user = new User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        // dd($request);

        $count = count($users);

        for ($i=0; $i <$count ; $i++) { 
            if($users[$i]->email == $request->email){
                $message="El correo ya existe!";
                return view('/Dashboard')->with('message',$message);
            }
        }

        // dd("entro");
        $user->email = $request->email;
        $request->password = Hash::make($request->password);
        $user->password =  $request->password;
        $user->whatsapp =  $request->whatsapp;
        $user->avatar = "default.jpg";
        $user->points = 0;
        if($request->status == null)
        {
            $user->status = 0;
        }
        if($request->status == "on")
        {
            $user->status = 1;
        }
        $user->rol = $request->rol;
        $user->country_id = 0;
        $user->city_id = 0;
        $user->save();
       
        auth()->login($user);
        return redirect()->route('user.index');
    }

    public function usuariosEdit($id){
        $user = User::find($id);
        $roles = Roles::all();
        $message = "";
        return view('customers.detail')->with('user',$user)->with('roles',$roles)->with('message',$message);
    }

    public function usersDelete($id){
        $user = User::find($id);
        $user->delete(); 
        $message = "Eliminado con exito";
        return redirect()->route('user.index');
    }

    public function usuariosUpdate(Request $request, $id){
        $roles = Roles::all();
        $user = User::find($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->rol = $request->rol;
        $user->email = $request->email;
        
        if($request->status == null)
        {
            $user->status = 0;
        }
        if($request->status == "on")
        {
            $user->status = 1;
        }

        $user->save();
        $message = "Datos cargados correctamente";
        return view('customers.detail')->with('user',$user)->with('roles',$roles)->with('message',$message);
    }

    public function newDireccionUsuario(Request $request)
    {

  try{
    
        $deliveryAddress = new DeliveryAddress();
        $deliveryAddress->user_id= auth()->id();
        $deliveryAddress->codigoPostal =$request['codigoPostal'];
        $deliveryAddress->pais =$request['pais'];
        $deliveryAddress->ciudad =$request['ciudad'];
        $deliveryAddress->estado =$request['estado'];
        $deliveryAddress->name =$request['name'];
        $deliveryAddress->direccion =$request['direccion'];

        $deliveryAddress->save();

             $response= ['data' => true];
            } catch (\Exception $exception) {
        return response()->json([ 'message' => 'There was an error retrieving the records' ], 500);
    }
      return response()->json($response);

    }

    


}
