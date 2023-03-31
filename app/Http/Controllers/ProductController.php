<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorias;
use App\Models\Sub_categorias;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use App\Models\Dimensione;
use League\Glide\Manipulators\Helpers\Dimension;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['media'])->get();
        $products = Product::ordenar($products)->paginate(10);
        $count = count($products);
        for ($i=0; $i < $count  ; $i++) {
            $products[$i]->image = json_decode($products[$i]->image);
        }
        // $products->image = json_decode($products->image);
        //   dd($products[0]);
        return view('products.list')->with('products', $products);
    }

    public function newProduct()
    {
        $categorias = Categorias::all();
        $subcat = Sub_categorias::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $dimensions = Dimensione::all();
        $colors = Color::all();
        $message = "";
        return view('products.newProduct')->with('message', $message)->with('categorias', $categorias)->with('subcat',$subcat)->with('sizes' ,$sizes)
        ->with('brands',$brands)->with('dimensions',$dimensions)->with('colors',$colors);
    }

    public function store(Request $request)
    {
        //validation
        $request->validate([
            "image" => "required|array",
            "image.*" => "required|image|mimes:jpeg,png|max:3000",
        ],[],[
            'image' => 'Fotos',
            // ....
        ]);

        $input = $request->all();

        $product = Product::create($request->only('name', 'category', 'subcategory','details','description','sku',
        'stock','minimaVenta','stockLowLevel','stockNotification','attributes','meta_title',
        'meta_description','price','valorIva','priceIva','valorPromo','status'));


        $products = new Product();
        $products->sizes($input['tallas'],$product->id);
        $products->brands($input['marcas'],$product->id);
        $products->dimensiones($input['dimensione'],$product->id);
        $products->colors($input['color'],$product->id);
        

        if($request->status == null) $products->status= 0;
        else{$products->status = 1; }

        /*if($request->hasFile('image')){

            $product->addMultipleMediaFromRequest(['image'])
            ->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('products');
            });
        }
        */
        //Guarda en la ruta la img
        $data_img = [];
        $destinationPath = 'img/product/product_id_'.$product->id;
        $file = $request->file('image');
        if ($request->hasFile('image')) {
            foreach ($file as $key=>$val_img) {

                $myimage = $val_img->getClientOriginalName();
                $data_img[$key] = $myimage;
                $val_img->move(public_path($destinationPath), $myimage);

            }
            $productAux = Product::find($product->id);
            $productAux->image = json_encode($data_img);
            $productAux->save();
        }

        // dd($request->file('image'));



        return redirect()->route('product.index')->with('mensaje', 'Producto Agregado Correctamente');
    }
    public function productUpdate(request $request, $id)
    {
        $request->validate([
            "image" => "sometimes|array",
            "image.*" => "sometimes|image|mimes:jpeg,png|max:3000",
        ],[],[
            'image' => 'Fotos',
            // ....
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->subcategory = $request->subcategory;
        $product->description = $request->description;
        $product->details = $request->details;
        $product->sku = $request->sku;
        //$product->barcode = $request->barcode;
        $product->attributes = $request->tagsBasic;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->status = ('1');
        //img upload
        $data_img = [];
        $destinationPath = 'img/product/product_id_'.$product->id;
        $file = $request->file('image');
        if ($request->hasFile('image')) {
            foreach ($file as $key=>$val_img) {

                $myimage = $val_img->getClientOriginalName();
                $data_img[$key] = $myimage;
                $val_img->move(public_path($destinationPath), $myimage);

            }
            $product->image = json_encode($data_img);
        }
        $product->save();
        return redirect()->route('product.index');




        // "name" => "Lampara"
        // "stock" => "20"
        // "price" => "$ 12"
        // "category" => "1"
        // "description" => null
        // "details" => null
        // "sku" => "DB-012345"
        // "barcode" => "000112314576"
        // "tagsBasic" => "[{"value":"prueba1"},{"value":"prueba2"}]"

        // "name" => "Lampara"
        // "stock" => 20
        // "price" => 12.0
        // "category" => "Salones"
        // "description" => "Blanca"
        // "details" => "ninguno"
        // "sku" => "DB-012345"
        // "barcode" => "000112314576"
        // "attributes" => "{}"

        // "status" => "1"
        // "image" => "["1666633085-product-6.webp","1666633085-product-8.webp","1666633085-product-10.webp"]"
        // "sales" => 0
    }

    public function productEdit($id)
    {
        $product = Product::find($id);
        $array_img = json_decode($product->image);

        // dd($array_img);
        $categorias = Categorias::all();
        //$product->image = json_decode($product->image);
        $message="";
        $subcat = Sub_categorias::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $dimensions = Dimensione::all();
        $colors = Color::all();
        return view('products.detail',compact('array_img'))->with('product',$product)->with('categorias',$categorias)->with('message',$message)->with('subcat',$subcat)
        ->with('brands',$brands)->with('sizes',$sizes)->with('colors',$colors)->with('dimensions',$dimensions)
        ;
    }

    public function productJsonImages(Request $request, $id)
    {
        $product = Product::find($id);
        $categorias = Categorias::all();

        if(!$request->hasFile('image')){
            $message="No seleccionaste ningun archivo";
            $product = Product::find($id);
            $categorias = Categorias::all();
            $product->image = json_decode($product->image);
            return view('products.detail')->with('product',$product)->with('categorias',$categorias)->with('message',$message);
        }else{
            $array=[];
            $file = $request->file('image');
            $count = count($file);
            $product->image = json_decode($product->image);
            if(empty($product->image)){

            }else{

                $count2 = count($product->image);

                for ($i=0; $i < $count2 ; $i++) {
                    $url = public_path('img\product\product_id_'.$id."\\".$product->image[$i]);
                    unlink($url);
                }
                $product->image="";
                $product->save();
            }


            for ($i=0; $i < $count ; $i++) {

                $filepath = "img/product/product_id_".$id."/";
                $filename = time() . '-' . $file[$i]->getClientOriginalName();
                $uploadSucess = $file[$i]->move($filepath, $filename);
                $array[$i] = $filename;
            }
            $product->image = json_encode($array);
            $product->save();
            $product->image = $array;
        }

        $message="Exito al subir Archivos";
        return view('products.detail')->with('product',$product)->with('categorias',$categorias)->with('message',$message);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }



}
