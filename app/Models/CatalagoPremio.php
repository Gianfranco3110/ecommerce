<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalagoPremio
 *
 * @property $id
 * @property $image
 * @property $nombre
 * @property $valorDescuento
 * @property $puntosValidar
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CatalagoPremio extends Model
{
    
    static $rules = [
		'image' => 'required',
		'nombre' => 'required',
		'valorDescuento' => 'required',
		'puntosValidar' => 'required',
		// 'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['image','nombre','valorDescuento','puntosValidar','status'];



}
