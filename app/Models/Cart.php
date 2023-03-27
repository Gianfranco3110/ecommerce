<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $code
 * @property $order_date
 * @property $arrived_date
 * @property $status
 * @property $total
 * @property $user_id
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cart extends Model
{
    
    static $rules = [
		'status' => 'required',
		'total' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['code','order_date','arrived_date','status','total','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }


       // Definimos la relacion entre un cart y sus detalles
    public function details(){
        #Un carrito tendrá muchos detalles  asociados
        return $this->hasMany(CartDetail::class);
    }

    
    

}
