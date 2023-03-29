<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public $table = 'products';




    public $fillable = [
        'name',
        'stock',
        'price',
        'status',
        'category',
        'subcategory',
        'description',
        'details',
        'sku',
        'image',
        'meta_title',
        'meta_description',
        'attributes',
        'minimaVenta',
        'stockLowLevel',
        'stockNotification',
        'poseeIva',
        'valorIva',
        'productPromo',
        'productTop',
        'valorPromo'
    ];



    public function scopeOrdenar($query,$orden){
        if ($orden) {
            return $query->orderBy('id','desc');
        }
    }


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
        ->width(150)
        ->height(150)
        ->sharpen(10);
    }

    public function brands($input,$id)
    {
        foreach($input as $brand)
        {
            $productBrand = new ProductBrands();
            $productBrand->product_id =$id;
            $productBrand->brand_id =$brand;
            $productBrand->save();
        }
        return;
    }

    public function sizes($input,$id)
    {

        foreach($input as $size)
        {
            $productSize = new ProductSizes();
            $productSize->product_id =$id;
            $productSize->size_id =$size;
            $productSize->save();
        }
        return;
    }
    public function colors($input,$id)
    {
        foreach($input as $color)
        {
            $productColor = new ProductColors();
            $productColor->product_id =$id;
            $productColor->color_id =$color;
            $productColor->save();
        }
        return;
    }
    public function dimensiones($input , $id)
    {
        foreach($input as $dimension)
        {
            $productDmension = new ProductDimensiones();
            $productDmension->product_id =$id;
            $productDmension->dimension_id =$dimension;
            $productDmension->save();
        }
        return;

    }
}
