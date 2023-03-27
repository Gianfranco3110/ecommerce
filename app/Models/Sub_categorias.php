<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Sub_categorias extends Model
{
    use HasFactory;
    use InteractsWithMedia;


    public function categoria(){
        return $this->belongsTo(Categorias::class);
        
    }

         public function productos(){
        return $this->hasMany(\App\Models\Product::class,'subcategory', 'id')->with('media');

        
    }
}
