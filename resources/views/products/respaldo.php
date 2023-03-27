@php
    $html_tag_data = [];
    $title = 'Nuevo Producto';
    $description= 'Ecommerce Customer List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
    <script src="/js/cs/checkall.js"></script>
    <script src="/js/pages/customers.list.js"></script>
@endsection

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <!-- Customers List Start -->
        <h1>Nuevo Producto</h1>
        <h1 class="success">{{$message}}</h1>
        <div class="row">
            <div class="col-12 mb-0">
                <div id="checkboxTable">
                    <div class="contenedor">
                    <div class="card">
                        <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h2>Nombre del producto<br><br>
                            <input class="form-control" type="text" name="name" value="" placeholder="Nombre" required>
                            </h2>
                            <h2>Stock<br><br>
                            <input class="form-control" type="number" name="stock" value="" placeholder="Stock" required>
                            </h2>
                            <h2>Precio<br><br>
                                <input class="form-control" type="number" step="any" name="price" value="" placeholder="Precio" required>
                            </h2>
                            <h2>Categoria<br><br>
                             <select class="form-control" name="category">
                                        {{-- <option label="&nbsp;"></option> --}}
                                        @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                                        @endforeach
                                    </select>
                            </h2>
                            <h2>Sub Categoria<br><br>
                                <select class="form-control" name="subcategory">
                                    {{-- <option label="&nbsp;"></option> --}}
                                    @foreach ($subcat as $sub)
                                    <option value="{{$sub->id}}">{{$sub->name}}</option>
                                    @endforeach
                                </select>
                               </h2>

                            <h2>Descripción<br><br>
                                <input class="form-control" type="text" name="description" value="" placeholder="Descripción" required>
                            </h2>
                            <h2>Detalles<br><br>
                                <input class="form-control" type="text" name="details" value="" placeholder="Detalles" required>
                            </h2>
                            <h2>Sku<br><br>
                                <input class="form-control" type="text" name="sku" value="" placeholder="Sku">
                            </h2>
                            <h2>Codigo de barras<br><br>
                                <input class="form-control" type="text" name="barcode" value="" placeholder="Codigo de barras" required>
                            </h2>
                            <h2>Imagen del producto<br><br>
                            <img src="/img/seo/default.png" id="picture" alt="" srcset="" style="width: 100px">
                            <input class="custom-file-input" type="file" name="image[]" label="image" id="image" multiple required>
                            </h2>
                            <h2>Palabras clave<br><br>
                                <input class="form-control" type="text" name="attributes" value="" placeholder="Palabras_clave" required>
                            </h2>
                            <h2>Meta titulo<br><br>
                                <input class="form-control" type="text" name="meta_title" value="" placeholder="Meta titulo" required>
                            </h2>
                            <h2>Meta descripcion<br><br>
                                <input class="form-control" type="text" name="meta_description" value="" placeholder="Meta descripcion" required>
                            </h2>
                            <h2>Activo<br><br>
                            <input type="checkbox" name="status" id="status">
                            </h2>
                            <button class="btn_style" type="submit" class="form-submit">Guardar</button>
                        </form>
                    </div>
                </div>
                <script>

                    document.getElementById("image").addEventListener('change',CambiarImagen);
              
                      function CambiarImagen(event) {
                          var file= event.target.files[0];
                          var reader = new FileReader();
                          reader.onload = (event)=>{
                              document.getElementById('picture').setAttribute('src',event.target.result);
                          };
                          reader.readAsDataURL(file);
                      }
              
                  </script>
                <style>
                    .contenedor{
                        width: 80vw;
                        height: 70vh;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }
                    .contenedor .card{
                        width: 60vw;
                        height: 80vh;
                        background: none;
                        background: #1e1e1e;                        
                        padding-top: 0;
                        padding-right: 0%;
                        padding-left: 10%;
                        border-radius: 3%;
                        margin-top: 12vh;
                        place-content: center;
                    }
                    .contenedor .card form{
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        gap: 1%;
                        margin-top: 3vh;
                        justify-content: center;
                        align-items: center;
                        text-align: left;
                    }
                    .contenedor input{
                        width: 50%;
                        height: 22px;
                        margin-top: -2vh;
                    }
                    h2{
                        font-size: 1.5vh;
                        text-align: left;
                        display: flex;
                        flex-direction: column;
                        /* align-items: center; */
                    }
                    select{
                        width: 50% !important;
                        height: 22px !important;
                        margin-top: -2vh !important;
                    }
                    .btn_style{
                    background: var(--primary);
                    width: 50%;
                    height: 100%;
                    transition-duration: 0.5s;
                    font-size: 20px;
                    }

                    .btn_style:hover{
                    background: var(--dark);
                    width: 50%;
                    height: 100%;
                    }
                   
                </style>

                </div>
            </div>
        </div>
        <!-- Customers List End -->

    
    </div>
@endsection
