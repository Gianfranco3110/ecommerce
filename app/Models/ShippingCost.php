<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShippingCost
 *
 * @property $id
 * @property $ciudad_origen
 * @property $ciudad_destino
 * @property $valor
 * @property $valorDescuento
 * @property $valorCompra
 * @property $tipoDescuento
 * @property $active
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ShippingCost extends Model
{

   public $table = 'shipping_cost';
    
    static $rules = [
		'ciudad_origen' => 'required',
		'ciudad_destino' => 'required',
		'valor' => 'required',
		'active' => 'required',
    
 
    ];

       protected $casts = [
        
        'active' => 'boolean'
      
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ciudad_origen','ciudad_destino','valor','valorDescuento','valorCompra','tipoDescuento','active'];



}
