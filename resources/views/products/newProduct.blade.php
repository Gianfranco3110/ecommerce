@php
    $html_tag_data = [];
    $title = 'Productos';
    $description = 'Nuevo productos';
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])
{{-- @if (Auth()->check())
@if (Auth()->user()->rol == 1 || Auth()->user()->rol == 2) --}}
@section('css')
    <link rel="stylesheet" href="/css/vendor/quill.bubble.css" />
    <link rel="stylesheet" href="/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css" />
    <link rel="stylesheet" href="/css/vendor/tagify.css" />
    <link rel="stylesheet" href="/css/vendor/dropzone.min.css" />
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
                            <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 w-50">
                                    <label class="form-label">Titulo</label>
                                    <input type="text" class="form-control" name="name" value=""
                                        placeholder="Nombre del producto" required />
                                </div>
                                <div class="mb-3 w-50">
                                    <label class="form-label">Categoria</label>
                                    <select class="select-single-no-search form-control" id="categoria" name="category">
                                        {{-- <option label="&nbsp;"></option> --}}
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 w-50">
                                    <label class="form-label">Sub Categoria</label>
                                    <select class="select-single-no-search form-control" id="subcategoria"
                                        name="subcategory">
                                        {{-- <option label="&nbsp;"></option> --}}
                                        @foreach ($subcat as $sub)
                                            <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <h3 class="mt-5 mb-4">Atributos y Caracteristicas</h3>
                                <div class="row">

                                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6">
                                        {!! Form::label('colors', 'Colores', ['class' => 'bold']) !!}
                                        <select class=" required form-control round"id="select2Color" name="color[]"
                                            required>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6 mb-4">
                                        {!! Form::label('size', 'Tallas', ['class' => 'bold']) !!}
                                        <select class=" required form-control round"id="select2Size" name="tallas[]"
                                            required>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6 mb-4">
                                        {!! Form::label('brand', 'Marca', ['class' => 'bold']) !!}
                                        <select class="required form-control round"id="select2Brand" name="marcas[]"
                                            required>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6 mb-4">
                                        {!! Form::label('dimension', 'Dimensiones', ['class' => 'bold']) !!}
                                        <select class=" required form-control round"id="select2Dimension"
                                            name="dimensione[]" required>
                                            @foreach ($dimensions as $dimension)
                                                <option value="{{ $dimension->id }}">{{ $dimension->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="mb-3">
                                    <div class="form-group col-sm-12 mb-1">
                                        {{ Form::label('details', 'Detalles', ['class' => 'mb-4']) }}
                                        {{ Form::textarea('details', null, ['class' => 'form-control' . ($errors->has('details') ? ' is-invalid' : ''), 'placeholder' => 'detalles', 'rows' => '4']) }}
                                        {!! $errors->first('details', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                </div>
                                <div class="mb-3">


                                    <div class="form-group col-sm-12 mb-1">
                                        {{ Form::label('description', 'Descripcion', ['class' => 'mb-4']) }}
                                        {{ Form::textarea('description', null, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'descripcion', 'rows' => '4']) }}
                                        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>

                        </div>

                    </div>
                </div>


                <!-- Product Info End -->

                <!-- Inventory Start -->
                <div class="mb-5 contenedores">
                    <h2 class="small-title">Inventario</h2>
                    <div class="card">
                        <div class="card-body">

                            <div class="mb-3">
                                <label class="form-label">SKU</label>
                                <input type="text" class="form-control" name="sku" value="" palceholder="sku"
                                    required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Cantidad</label>
                                <input type="number" class="form-control" name="stock" value=""
                                    palceholder="stock" required />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cantidad Minima de Venta</label>
                                <input type="number" class="form-control" name="minimaVenta" value=""
                                    palceholder="minima venta" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Stock Nivel Bajo</label>
                                <input type="number" class="form-control" name="stockLowLevel" value=""
                                    palceholder="stock low level" required />
                            </div>


                            <div class="mb-3">

                                {!! Form::label('stockNotification', 'Enviar Email des stock bajo de nivel.?', ['class' => 'bold']) !!}
                                <label class="checkbox-inline">
                                    {!! Form::hidden('stockNotification', 0) !!}
                                    {!! Form::checkbox('stockNotification', '1', null) !!}
                                </label>
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
                                                <label class="form-label">Palabras clave</label>
                                                <input class="form-control w-100 sw-md-13" value="Keywords" Readonly />
                                            </div>
                                        </div>

                                        <div class="col-md order-3">
                                            <div class="mb-0">

                                                <input name="attributes"class="form-control m_campo" value=""
                                                    placeholder="Tags" required />
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
                                                <input class="form-control w-100 sw-md-13" value="Meta_titulo" Readonly />
                                            </div>
                                        </div>
                                        <div class="col-md order-3">
                                            <div class="mb-0">
                                                <input class="form-control m_campo" name="meta_title" value=""
                                                    placeholder="Meta Titulo" required />
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
                                                <input class="form-control w-100 sw-md-13" value="Meta_description"
                                                    Readonly />
                                            </div>
                                        </div>
                                        <div class="col-md order-3">
                                            <div class="mb-0">
                                                <input class="form-control m_campo" name="meta_description"
                                                    value="" placeholder="Meta Descripción" required />
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
                    .m_campo {
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
                                <input placeholder="0" type="text" name="price" class="form-control" required
                                    id="price" />
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Este producto Posee Iva. ?</label>
                                <input type="checkbox" class="" name="poseeIva" id="poseeIva" value="1" />


                            </div>
                            <div class="mb-3">
                                <label class="form-label">Producto En Promoción. ?</label>
                                <input type="checkbox" class="" name="productPromo" id="promo"
                                    value="1" />


                            </div>
                            <div class="mb-3">
                                <label class="form-label">Producto Top. ?</label>
                                <input type="checkbox" class="" name="productTop" id="isTop"
                                    value="1" />


                            </div>


                            <div class="mb-3" style="display: none" id="divValorIva">
                                <label class="form-label">Valor del Iva</label>
                                <input type="text" name="valorIva" class="form-control" value="0" required
                                    id="valorIva" onkeyup="sumar()" />
                            </div>

                            <div class="mb-3" style="display: none" id="divPrecioIva">
                                <label class="form-label">Precio inlc.Iva $</label>
                                <input type="text" name="priceIva" class="form-control" value="0" readonly
                                    id="priceConIva" />
                            </div>

                            <div class="mb-3" style="display: none" id="divValorPromocion">
                                <label class="form-label">Valor en promocion</label>
                                <input type="number" name="valorPromo" class="form-control" value="0" required
                                    id="valorPromo" />
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Price End -->



            </div>

            <div class="col-xl-4 mb-2">

                <!-- Gallery Start -->
                {{-- <h2>Imagenes del producto<br><br>
                    <img src="/img/seo/default.png" id="picture" alt="" srcset="" style="width: 100px">
                    <input class="custom-file-input" type="file" name="image" label="image" id="image" required>
                </h2> --}}
                <!-- Gallery End -->

                <h2 class="small-title">imagenes del producto</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="dropzone dropzone-columns row g-2 row-cols-2 row-cols-md-4 row-cols-xl-2 border-0 p-0"
                            id="dropzoneProductGallery2">
                            {{-- <div class="dropzone dropzone-columns row g-2 row-cols-1 row-cols-md-4 row-cols-xl-2 border-0 p-0" id="dropzoneProductGallery"></div> --}}
                            <div class="img-dropzone">
                                <img src="/img/seo/default.png" id="picture" alt="" srcset="">
                            </div>
                        </div>

                        <br><br>
                        <input type="file" name="image[]" multiple label="image" id="image">
                        <br><br>
                        <div class="text-center">
                            {{-- <label for="image"> --}}
                            {{-- <button type="submit" class="btn btn-outline-primary btn-icon btn-icon-start w-100" id="dropzoneProductGalleryButton"> --}}
                            {{-- <button type="submit" class="btn btn-foreground hover-outline btn-icon btn-icon-start mt-2" id="dropzoneProductGalleryButton"> --}}

                            {{-- <i data-acorn-icon="plus"></i> --}}
                            {{-- <span>Guardar</span> --}}
                            {{-- </button> --}}
                            {{-- </label> --}}
                            <br><br>
                            <h4>{{ $message }}</h4>
                            {{-- <input type="submit" value="enviar"> --}}
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <div class="text-center">
                        <button class="btn btn-outline-primary ms-0 ms-sm-1 w-100 w-md-auto"
                            type="submit">Guardar</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <script>
            document.getElementById("image").addEventListener('change', CambiarImagen);

            function CambiarImagen(event) {
                var file = event.target.files[0];
                var reader = new FileReader();
                reader.onload = (event) => {
                    document.getElementById('picture').setAttribute('src', event.target.result);
                };
                reader.readAsDataURL(file);
            }
        </script>
        <script>
            let g_productos = document.querySelectorAll('.g_productos');

            for (let i = 0; i < g_productos.length; i++) {

                g_productos[i].addEventListener('click', (e) => {
                    // console.log(e);
                    if (g_productos[i].requestFullscreen) {
                        g_productos[i].requestFullscreen();
                    }
                });
            }
        </script>

        <style>
            footer {
                display: none;
            }

            .btn_style:hover {
                height: 50px;
            }

            #navTop {
                width: 50vw;
                height: auto;
                display: grid;
                align-items: center;
            }

            .img-dropzone img {

                width: 50%;
                height: 50%;
                position: absolute;
                margin-left: 25%;
                margin-top: 5%;
                border-radius: 3%;


            }

            #navTop ul {
                display: flex;
                justify-content: space-around;
                align-items: center;
                padding-top: 10px;
                width: 100%;
            }

            li {
                list-style: none;
            }

            #navTop ul a {

                padding: 0px 0px;
            }

            .s_tab {
                padding-top: 10px;
                width: 100px;
                display: flex;
                justify-content: center;
                cursor: pointer;
                transition-duration: 0.5s;
            }

            .selected {
                border-top: 1px solid var(--primary);
                background: linear-gradient(to bottom, rgba(255, 255, 255, 0.138), transparent);
            }

            /* GALERIA */

            #dropzoneProductGallery2 {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 5px;
            }

            .g_productos {
                transition-duration: 0.5s;
                cursor: pointer;
            }

            .g_productos:hover {
                transform: scale(1.1) !important;
            }


            @media (max-width:732px) {
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
                s_tab[i].addEventListener('click', () => {
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
    {{-- @endif
        @else --}}

    {{-- <a id="inicio" href="{{route('inicio')}}">.</a>
        <script>
            let inicio = document.getElementById('inicio');
            setTimeout(() => {
                inicio.click();
            }, 500);
        </script>

        @endif --}}

    @push('page-script')
        <script>
            var miCheckbox = document.getElementById('poseeIva');
            var miCheckbox2 = document.getElementById('promo');
            var miCheckbox3 = document.getElementById('isTop');



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

            $(document).ready(function() {
                miCheckbox2.addEventListener('click', function() {



                    if (miCheckbox2.checked) {

                        $('#divValorPromocion').show();
                        miCheckbox2.value = 1;
                    } else {
                        $('#divValorPromocion').hide();
                        miCheckbox2.value = 0;



                    }
                });


            });

            $(document).ready(function() {
                miCheckbox3.addEventListener('click', function() {



                    if (miCheckbox3.checked) {

                        miCheckbox3.value = 1;
                    } else {
                        miCheckbox3.value = 0;



                    }
                });


            });

            function sumar() {

                let price = document.getElementById('price');
                let iva = document.getElementById('valorIva');



                let totalIva = price.value * iva.value / 100;
                let total = parseFloat(price.value) + parseFloat(totalIva);


                document.getElementById('priceConIva').value = total;

            }


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
