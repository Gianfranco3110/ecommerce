<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dimensione
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Dimensione extends Model
{


   public $table = 'dimensiones';

    
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'status'
    ];


         public function products()
    {
        return $this->belongsToMany(\App\Models\Dimensione::class, 'product_dimensiones');
    }

}
