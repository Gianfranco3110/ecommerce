<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use NotificationChannels\WebPush\HasPushSubscriptions;
use Illuminate\Notifications\Notifiable;
// use App\Notifications;
// use App\Notifications\WebPush;

use App\Models\Cart;

use Spatie\Permission\Traits\HasRoles;


/**
 * Class User
 * @package App\Models
 * @version February 24, 2022, 2:21 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $avatar
 */
class User extends Authenticatable
{

    use HasRoles , HasPushSubscriptions, Notifiable;

    public $table = 'users';
    



    public $fillable = [
        'name',
        'lastname',
        'email',
        'whatsapp',
        'password',
        // 'avatar',
        // 'status',
        'rol',
        // 'country_id',
        // 'city_id',
        'device_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        // 'last_name' => 'string',
        'email' => 'string',
        'password' => 'string',
        // 'whatsapp' => 'string',
        // 'avatar' => 'string',
        // 'status' => 'boolean',
        'rol'=>'string',
        // 'country_id' => 'integer',
        // 'city_id' => 'integer',
       

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        // 'last_name' => 'required',
        'email' => 'required',
        'password' => 'confirmed',
        // 'avatar' => 'nullable|image|video'
    ];

      public function markets()
    {
        return $this->belongsToMany(\App\Models\Restaurant::class, 'users_restaurants');
    }

    public function scopeOrdenar($query,$orden){

        if(auth()->user()->hasRole('super admin'))
        {
               if ($orden) {
            return $query->orderBy('id','desc');    


        }

        }else{
              if ($orden) {
           return $query->orderBy('id','desc')->whereHas("roles", function($q){ $q->where("name",'<>',"super admin"); });
 
        }
    }
     
    }


      // Definimos la relacion entre un usuario y un cart
    public function carts(){
        #Un usuario tendrá varios carts asociados
        #creamos lo analogo en el modelo Cart
        return $this->hasMany(Cart::class);

    }

    // Accessor para cart, devuelve el carrito activo
    public function getGetCartAttribute(){


        $cart = $this->carts()->where('status','Active')->first();

        if($cart)
            return $cart;
    
        # Creamos un nuevo carrito de compras activo para el usuario
        # debido a que para este caso, no tiene uno.
        $cart = new Cart();
        $cart->status = 'Active';
        $cart->user_id = $this->id;
        $cart->save();

        return $cart;

    }
    
    #Muestra todos los pedidos
    public function getOrderAttribute(){
        $order = $this->carts()->where('status', '!=','Active')->get();
        
        if ($order)
            return $order;

    }

    #Muestra los productos dentro de los pedidos cart->cartDetails
    public function getOrderDetailsAttribute(){
        $orderDetails = $this->carts()->where('status', '!=','Active')->first();
         
        return $orderDetails;

    }

}
