@php
$html_tag_data = [];
$title = 'Editar productos';
$description= 'Detalles de productos'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
<link rel="stylesheet" href="/css/vendor/quill.bubble.css"/>
<link rel="stylesheet" href="/css/vendor/select2.min.css"/>
<link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>
<link rel="stylesheet" href="/css/vendor/tagify.css"/>
<link rel="stylesheet" href="/css/vendor/dropzone.min.css"/>
<style>
    .w-img{
        width: 8.8vw;
        height: 8vw;
    }
</style>
@endsection

@section('js_vendor')

<script src="/js/vendor/imask.js"></script>
<script src="/js/vendor/quill.min.js"></script>
<script src="/js/vendor/quill.active.js"></script>
<script src="/js/vendor/select2.full.min.js"></script>
<script src="/js/vendor/tagify.min.js"></script>
<script src="/js/vendor/dropzone.min.js"></script>
@endsection

@section('js_page')
<script src="/js/cs/dropzone.templates.js"></script>
<script src="/js/pages/products.detail.js"></script>
@endsection

@section('content')
<div class="container">
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row g-0">
            <!-- Title Start -->
            <div class="col-auto mb-3 mb-md-0 me-auto">
                <div class="w-auto sw-md-30">
                    <a href="#" class="muted-link pb-1 d-inline-block breadcrumb-back">
                        <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                        <span class="text-small align-middle">Products</span>
                    </a>
                    <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                </div>
            </div>
            <!-- Title End -->

            <!-- Top Buttons Start -->
            <div class="w-100 d-md-none"></div>
            <div class="col-auto d-flex align-items-end justify-content-end">
                <button
                type="button"
                class="btn btn-outline-primary btn-icon btn-icon-only"
                data-delay='{"show":"500", "hide":"0"}'
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Save"
                >
                <i data-acorn-icon="save"></i>
            </button>
        </div>
        <div class="col col-md-auto d-flex align-items-end justify-content-end">
            <div class="btn-group ms-1 w-100 w-md-auto">
                <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100">
                    <i data-acorn-icon="send"></i>
                    <span>Publish</span>
                </button>
                <button
                type="button"
                class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                data-bs-offset="0,3"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                ></button>
                <div class="dropdown-menu dropdown-menu-end">
                    <button class="dropdown-item" type="button">Unpublish</button>
                    <button class="dropdown-item" type="button">Draft</button>
                    <button class="dropdown-item" type="button">Delete</button>
                </div>
            </div>
        </div>
        <!-- Top Buttons End -->
    </div>
</div>
<!-- Title and Top Buttons End -->

<div class="row">
    <nav id="navTop">
        <ul>
            <li class="s_tab">
                <a href="#">Datos</a>
            </li>
            <li class="s_tab">
                <a href="#">Inventario</a>
            </li>
            <li class="s_tab">
                <a href="#">Seo Keywords</a>
            </li>
            <li class="s_tab">
                <a href="#">Precio</a>
            </li>
            {{-- <li class="s_tab">
                <a href="#">CINCO</a>
            </li> --}}
        </ul>
    </nav>
    <div class="col-xl-8">
        <!-- Product Info Start -->
        <div class="mb-5 contenedores">
            <h2 class="small-title">Información del producto</h2>
            <div class="card">
                <div class="card-body">
                    <form  action="{{route('product.update',['id'=>$product->id])}}" method="post">
                        @method('PATCH')
                        @csrf

                             <div class="mb-3 w-50">
                                <label class="form-label">Titulo</label>
                                <input type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="Nombre del producto" required/>
                            </div>
                        <div class="mb-3 w-50">
                            <label class="form-label">Categoria</label>
                            <select class="select-single-no-search form-control" id="categoria" name="category">
                                {{-- <option label="&nbsp;"></option> --}}
                                @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 w-50">
                            <label class="form-label">Sub Categoria</label>
                            <select class="select-single-no-search form-control" id="subcategoria" name="subcategory">
                                {{-- <option label="&nbsp;"></option> --}}
                                @foreach ($subcat as $sub)
                                <option value="{{$sub->id}}">{{$sub->name}}</option>
                                @endforeach
                            </select>
                        </div>
                         <h3 class="mt-5 mb-4">Atributos y Caracteristicas</h3>
                            <div class="row">

                                  <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6">
                                {!! Form::label('colors', "Colores",['class' => 'bold']) !!}
                                <select class=" required form-control round"id="select2Color" name="color[]" required>
                                       @foreach ($colors as $color)
                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                                 <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6 mb-4">
                                {!! Form::label('size', "Tallas",['class' => 'bold']) !!}
                                <select class=" required form-control round"id="select2Size" name="tallas[]" required>
                                         @foreach ($sizes as $size)
                                    <option value="{{$size->id}}">{{$size->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                                 <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6 mb-4">
                                {!! Form::label('brand', "Marca",['class' => 'bold']) !!}
                                <select class="required form-control round"id="select2Brand" name="marcas[]" required>
                                         @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                                 <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6 mb-4">
                                {!! Form::label('dimension', "Dimensiones",['class' => 'bold']) !!}
                                <select class=" required form-control round"id="select2Dimension" name="dimensione[]" required>
                                         @foreach ($dimensions as $dimension)
                                    <option value="{{$dimension->id}}">{{$dimension->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-group col-sm-12 mb-1">
                                    {{ Form::label('details','Detalles',['class'=>'mb-4']) }}
                                    {{ Form::textarea('details',$product->details,['class' => 'form-control' . ($errors->has('details') ? ' is-invalid' : ''), 'placeholder' => 'detalles','rows'=>'4']) }}
                                    {!! $errors->first('details', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                            </div>
                             <div class="mb-3">


                                <div class="form-group col-sm-12 mb-1">
                                    {{ Form::label('description','Descripcion',['class'=>'mb-4']) }}
                                    {{ Form::textarea('description',$product->description,['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'descripcion','rows'=>'4']) }}
                                    {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>


                    </div>
                </div>
            </div>

            <script>
                let details = document.getElementById('details');
                let description = document.getElementById('description');

                quillEditorBubble.addEventListener('keyup',(e)=>{
                    description.value = e.target.textContent;
                });
                quillEditorDetails.addEventListener('keyup',(e)=>{
                    details.value = e.target.textContent;
                });
                setTimeout(() => {
                    description.value = quillEditorBubble.textContent;
                    details.value = quillEditorDetails.textContent;
                }, 1000);

                //llenar categorias y subcategorias
                let categoria = document.getElementById('categoria');
                let subcategoria = document.getElementById('subcategoria');

                console.log(@json($product->category));
                console.log(categoria.children.value);

                let categoriaServer = @json($product->category);
                let subcategoriaServer = @json($product->subcategory);

                categoria.value = categoriaServer;
                subcategoria.value = subcategoriaServer;
            </script>
            <!-- Product Info End -->

            <!-- Inventory Start -->
            <div class="mb-5 contenedores">
                <h2 class="small-title">Inventario</h2>
                <div class="card">
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">SKU</label>
                            <input type="text" class="form-control" name="sku" value="{{$product->sku}}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cantidad</label>
                            <input type="text" class="form-control" name="stock" value="{{$product->stock}}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cantidad Minima de Venta</label>
                            <input type="number" class="form-control" name="minimaVenta" value="{{$product->minimaVenta}}" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Stock Nivel Bajo</label>
                            <input type="number" class="form-control" name="stockLowLevel" value="{{ $product->stockLowLevel }}" palceholder="stock low level" required/>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Enviar Email des stock bajo de nivel.?</label>
                            @if ($product->stockNotification == true)
                            <input type="checkbox" checked class="" name="stockNotification" />
                            @else
                            <input type="checkbox" class="" name="stockNotification" />


                            @endif
                        </div>


                    </div>
                </div>
            </div>
            <!-- Inventory End -->

            <!-- Attributes Start -->
            <div class="mb-5 contenedores">
                <h2 class="small-title">SEO palabras clave</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="mb-n6 border-last-none">
                            <div class="mb-3 pb-3 border-bottom border-separator-light">
                                <div class="row gx-2">
                                    <div class="col col-md-auto order-1">
                                        <div class="mb-3">
                                            <label class="form-label">palabras clave</label>
                                            <input class="form-control w-100 sw-md-13" value="Keywords" Readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md order-3">
                                        <div class="mb-0">
                                            <input name="tagsBasic" class="form-control" value="{{$product->attributes}}" />
                                        </div>
                                    </div>
                                    <div class="col-auto order-2 order-md-4">
                                        <label class="d-block form-label">&nbsp;</label>

                                    </div>
                                </div>
                                {{-- META TITLE --}}
                                <div class="row gx-2">
                                    <div class="col col-md-auto order-1">
                                        <div class="mb-5">
                                            <label class="form-label">Meta_titulo</label>
                                            <input class="form-control w-100 sw-md-13" value="Meta_titulo" Readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md order-3">
                                        <div class="mb-0">
                                            <input class="form-control m_campo" name="meta_title" value="{{$product->meta_title}}" />
                                        </div>
                                    </div>
                                    <div class="col-auto order-2 order-md-4">
                                        <label class="d-block form-label">&nbsp;</label>

                                    </div>
                                </div>
                                {{-- META DESCRIPTION --}}
                                <div class="row gx-2">
                                    <div class="col col-md-auto order-1">
                                        <div class="mb-5">
                                            <label class="form-label">Meta_description</label>
                                            <input class="form-control w-100 sw-md-13" value="Meta_description" Readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md order-3">
                                        <div class="mb-0">
                                            <input class="form-control m_campo" name="meta_description" value="{{$product->meta_description}}" />
                                        </div>
                                    </div>
                                    <div class="col-auto order-2 order-md-4">
                                        <label class="d-block form-label">&nbsp;</label>

                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <style>
                .m_campo{
                    transform: translateY(3vh);
                }
            </style>
            <!-- Attributes End -->
            <!-- Price Start -->
            <div class="mb-5 contenedores">
                <h2 class="small-title">Price</h2>
                <div class="card">
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Precio $</label>
                            <input type="text" name="price" class="form-control" value="{{ $product->price }}" required id="price"/>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Este producto Posee Iva. ?</label>
                           @if ($product->poseeIva)

                            <input type="checkbox" checked class="" name="stockNotification" id="poseeIva" />

                               @else
                            <input type="checkbox" class="" name="stockNotification" id="poseeIva" />


                           @endif
                        </div>

                        <div class="mb-3" style="display: none" id="divValorIva">
                            <label class="form-label">Valor del Iva</label>
                            <input type="text" name="valorIva" class="form-control" value="{{ $product->valorIva }}" required id="valorIva" onkeyup="sumar()"/>
                        </div>

                        <div class="mb-3" style="display: none" id="divPrecioIva">
                            <label class="form-label">Precio inlc.Iva $</label>
                            <input type="text" name="precioConIva" class="form-control" value="{{$product->price }}" readonly id="priceConIva"/>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Price End -->
                     {!! Form::submit('Guardar', ['class' => 'btn btn-outline-primary ms-0 ms-sm-1 w-100 w-md-auto']) !!}

        </form>


    </div>

    <div class="col-xl-4 mb-n5">

        <!-- Gallery Start -->
        <div class="mb-5">
            <h2 class="small-title">Galeria del producto</h2>
            <div class="card">
                <div class="card-body">
                    <form class="mb-3" action="{{route('pjson.images',['id' => $product->id])}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="dropzone dropzone-columns row g-2 row-cols-1 row-cols-md-4 row-cols-xl-2 border-0 p-0" id="dropzoneProductGallery2">
                            {{-- <div class="dropzone dropzone-columns row g-2 row-cols-1 row-cols-md-4 row-cols-xl-2 border-0 p-0" id="dropzoneProductGallery"></div> --}}
                                @for ($i = 0; $i < count($array_img); $i++)
                                    <a data-fancybox-trigger="preview" href="javascript:;">
                                        {{-- <img data-dz-thumbnail=""  src="{{asset('img/product/product_id_5/5fa435ed6925c.jpeg')}}" alt="imagen no encontrada" class="g_productos"> --}}
                                        <img data-dz-thumbnail="" class=" g_productos w-img " src="{{asset('img/product/product_id_'.$product->id.'/'.$array_img[$i])}}">
                                    </a>
                                @endfor

                          <div class="img-dropzone">
                                {{-- @foreach ($product->media as $image)

                                 <a data-fancybox="preview"  href="{{ $image->getUrl() }}">

                                </a>



                                @endforeach --}}

                                {{-- @foreach ($product->media as $image)


                                 <a data-fancybox-trigger="preview" href="javascript:;">

                                <img data-dz-thumbnail=""  src="{{ $image->getUrl() }}" alt="imagen no encontrada" class="g_productos">


                                </a>

                                @break
                                @endforeach --}}


                            </div>

                            </div>
                            <br><br>
                            <input type="file" name="image[]" multiple label="image" id="image">
                            <br><br>
                            <div class="text-center">
                                <label for="image">

                                    </label>
                                    <br><br>
                                    <h4>{{$message}}</h4>

                                    {{-- <input type="submit" value="enviar"> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="data_img" value="{{json_encode($array_img)}}">
                    <div class="mb-5">
                        <h2 class="small-title">Galeria del producto</h2>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('storeimg.product') }}" method="post" enctype="multipart/form-data" id="dropzoneProductGallery" class="dropzone dropzone-columns row g-2 row-cols-1 row-cols-md-4 row-cols-xl-2 border-0 p-0 dz-clickable dz-started">
                                    @csrf
                                        <div class="dz-default dz-message">
                                            <button class="dz-button" type="button">Drop files here to upload</button>
                                        </div>
                                        @php
                                            $n =0;
                                        @endphp
                                        @for ($i = 0; $i < count($array_img); $i++)
                                            @php
                                                $n++
                                            @endphp
                                            <div class="dz-preview col border-0 h-auto me-0 dz-complete dz-image-preview">
                                                <div class="d-flex flex-column border rounded-md">
                                                    <div class="p-0 position-relative image-container w-100">
                                                        <div class="preview-container rounded-0 rounded-md-top">
                                                            <img data-dz-thumbnail="" class="img-thumbnail border-0 rounded-0 rounded-md-top sh-18" alt="cake.webp" src="{{asset('img/product/product_id_'.$product->id.'/'.$array_img[$i])}}">
                                                        </div>
                                                        <div class="dz-error-mark">
                                                            <i class="cs-close-circle"></i>
                                                        </div>
                                                        <div class="dz-success-mark">
                                                            <i class="cs-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="ps-3 pt-3 pe-2 pb-1 dz-details position-relative w-100">
                                                        <div><span data-dz-name="">Imagen Nº{{$n}}</span></div>
                                                        <div class="text-primary text-extra-small" data-dz-size=""><strong>0</strong> b</div>
                                                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                                    <div class="dz-error-message"><span data-dz-errormessage=""></span></div>
                                                </div>
                                                <a href="#/" class="remove" data-dz-remove=""><i class="cs-bin"></i></a>
                                            </div>
                                        </div>
                                        @endfor

                                </form>
                                <div class="text-center">
                                    <button type="button" class="btn btn-foreground hover-outline btn-icon btn-icon-start mt-2" id="dropzoneProductGalleryButton">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="acorn-icons acorn-icons-plus undefined"><path d="M10 17 10 3M3 10 17 10"></path></svg>
                                        <span>Agregar Imagen</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Gallery End -->
            </div>
        </div>
    </div>

    <script>



        let g_productos = document.querySelectorAll('.g_productos');

        for (let i = 0; i < g_productos.length; i++) {

            g_productos[i].addEventListener('click',(e)=>{
                // console.log(e);
                if (g_productos[i].requestFullscreen) {
                    g_productos[i].requestFullscreen();
                }
            });
        }
    </script>

    <style>
        .btn_style{
            height: 30px;
        }
        .btn_style:hover{
            height: 35px;
        }
        #navTop{
            width: 50vw;
            height: auto;
            display: grid;
            align-items: center;
        }
        #navTop ul{
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding-top: 10px;
            width: 100%;
        }
        li{
            list-style: none;
        }
        #navTop ul a{

            padding: 0px 0px;
        }
       .img-dropzone img{

                width: 50%;
                height: 50%;
                position: absolute;
                margin-left: 25%;
                margin-top: 5%;
                border-radius: 3%;


            }

        .s_tab{
            padding-top: 10px;
            width: 100px;
            display: flex;
            justify-content: center;
            cursor: pointer;
            transition-duration: 0.5s;
        }
        .selected{
            border-top: 1px solid var(--primary);
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.138), transparent);
        }
        /* GALERIA */

        #dropzoneProductGallery2{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5px;
        }

        .g_productos{
            transition-duration: 0.5s;
            cursor: pointer;
        }
        .g_productos:hover{
            transform: scale(1.1) !important;
        }


        @media (max-width:732px){
            /* *{
                display: none;
            } */
        }

    </style>
    <script>
        let s_tab = document.querySelectorAll('.s_tab');
        let contenedores = document.querySelectorAll('.contenedores');
        console.log(contenedores);
        for (let i = 0; i < s_tab.length; i++) {
            s_tab[i].addEventListener('click',()=>{
                mostrarContenedor(i);
            });
            s_tab[i].classList.remove('selected');
            contenedores[i].style.display = "none";
            contenedores[0].style.display = "block";
            s_tab[0].classList.add('selected');
        }

        function mostrarContenedor(e) {
            // console.log(s_tab[e]);
            for (let i = 0; i < s_tab.length; i++) {
                s_tab[i].classList.remove('selected');
                contenedores[i].style.display = "none";


            }
            contenedores[e].style.display = "block";
            s_tab[e].classList.add('selected');
        }
    </script>
    @endsection


    @push('page-script')

    <script>
        var miCheckbox = document.getElementById('poseeIva');

        $(document).ready(function() {
            miCheckbox.addEventListener('click', function() {



                if (miCheckbox.checked) {

                    $('#divValorIva').show();
                    $('#divPrecioIva').show();
                } else {
                    $('#divValorIva').hide();
                    $('#divPrecioIva').hide();


                }
            });


        });

        function sumar()
        {

            let price = document.getElementById('price');
            let iva = document.getElementById('valorIva');



            let totalIva = price.value * iva.value/100;
            let total = parseFloat(price.value) + parseFloat(totalIva);


            document.getElementById('priceConIva').value =total;

        }


        $('[data-fancybox="preview"]').fancybox({
  thumbs : {
    autoStart : true
  }
});


                 $(document).ready(function() {
        $('#select2Dimension').select2({

              multiple: true,


        });

    })

                  $(document).ready(function() {
        $('#select2Color').select2({

              multiple: true,


        });

    })
                  $(document).ready(function() {
        $('#select2Size').select2({

              multiple: true,


        });

    })
                  $(document).ready(function() {
        $('#select2Brand').select2({

              multiple: true,


        });

    })
    </script>

    @endpush
