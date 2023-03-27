<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDimensiones extends Model
{
    use HasFactory;

      public $timestamps = false;

    public $table = 'product_dimensiones';

    public $fillable = [
        'product_id',
        'dimension_id'
        
      
      

    ];
}
