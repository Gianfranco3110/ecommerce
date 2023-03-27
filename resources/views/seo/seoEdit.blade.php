@php
$html_tag_data = [];
$title = 'SEO';
$description= 'Ecommerce Customer List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@if(Auth()->check())

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
    <h1>SEO</h1>
    <h1 class="success">{{$message}}</h1>
    <div class="row">
        <div class="col-12 mb-0">
            <div id="checkboxTable">
                <div class="contenedor">
                    <div class="card">
                        <form action="{{ route('seo.update',['id'=>$seo->id]) }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row p-2">
                                
                                <div class="form-group col-sm-6 mb-4">
                                    <label for="title" class="mb-4">Titulo</label>
                                    <input class="form-control" type="text" name="title" value="{{$seo->title}}" placeholder="Nombre" required>
                                    
                                </div>
                                
                                <div class="form-group col-sm-6 mb-4">
                                    <label for="description" class="mb-4">Descripcion</label>
                                    <input class="form-control" type="text" name="description" id="description" value="{{$seo->description}}" placeholder="Descripcion" required>
                                    
                                    
                                </div>
                                
                                <div class="form-group col-sm-6 mb-4">
                                    <label for="key" class="mb-4">Keywords</label>
                                    <input class="form-control" type="text" name="keywords" id="key" value="{{$seo->keywords}}" placeholder="Keywords" required>
                                    
                                    
                                    
                                </div>
                                
                                <div class="form-group col-sm-6 mb-4">
                                    <label for="googleAnalytics" class="mb-4">Google_analytics</label>
                                    <input class="form-control" type="text" name="google_analytics" id="googleAnalytics" value="{{$seo->google_analytics}}" placeholder="Google_analytics" required>
                                    
                                    
                                    
                                </div>
                                
                                <div class="form-group col-sm-6 mb-4">
                                    <label for="imge" class="mb-4">Favicon</label>
                                    <img src="/img/seo/default.png" id="picture" alt="" srcset="" style="width: 100px">
                                    <input class="custom-file-input" type="file" name="image" id="image" required>
                                    
                                    
                                    
                                </div>
                                
                                <div class="form-group col-sm-6 mb-4">
                                    <label for="copy" class="mb-4">Copyright</label>
                                    <input class="form-control" type="text" name="copyright"  id="copy" value="{{$seo->copyright}}" placeholder="Copyright" required>
                                    
                                    
                                    
                                    
                                </div>
                                
                                <div class="form-group col-sm-6 mb-4">
                                    <label for="telefono" class="mb-4">Telefono</label>
                                    <input class="form-control" type="text" name="telefono" id="telefono" value="{{$seo->telefono}}" placeholder="Telefono" required>
                                    
                                    
                                    
                                    
                                    
                                </div>
                                
                                <div class="form-group col-sm-6 mb-4">
                                    <label for="whatsapp" class="mb-4">Whatsapp</label>
                                    <input class="form-control" type="text" name="whatsapp" id="whatsapp" value="{{$seo->whatsapp}}" placeholder="Whatsapp" required>
                                    
                                </div>
                                
                            
                                
                                <button class="btn_style offset-3" type="submit" class="form-submit">Guardar</button>
                            </div>
                            
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
            
                
            </div>
        </div>
    </div>
    <!-- Customers List End -->
    
    
</div>
@endsection

@else

<a id="inicio" href="{{route('inicio')}}">.</a>
<script>
    let inicio = document.getElementById('inicio');
    setTimeout(() => {
        inicio.click();
    }, 500);
</script>

@endif