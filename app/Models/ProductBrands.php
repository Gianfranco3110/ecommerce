<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBrands extends Model
{
    use HasFactory;

      public $timestamps = false;

    public $table = 'product_brands';

    public $fillable = [
        'product_id',
        'brand_id'
        
      
      

    ];
}
