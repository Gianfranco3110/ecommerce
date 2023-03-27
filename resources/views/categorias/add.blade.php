@php
$html_tag_data = [];
$title = 'Lista de usuarios';
$description= 'Ecommerce Customer List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@if(Auth()->check())
@hasanyrole('super admin')
@section('css')
@endsection





@section('content')
<div class="container">
    <!-- Title and Top Buttons Start -->
    <!-- Customers List Start -->
    <h1>Agregar Categoria</h1>
    <h1 class="success">{{$message}}</h1>
    <div class="row">
        <div class="col-12 mb-0">
            <div id="checkboxTable">
                <div class="contenedor">
                    <div class="card">
                        <form action="{{ route('cat.store') }}" method="post" enctype="multipart/form-data">
                            
                            
                            @csrf
                            <div class="box box-info padding-1">
                                <div class="box-body row px-4" >
                                    
                                    <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('name','Nombre',['class'=>'mb-4']) }}
                                        {{ Form::text('name',null,['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'nombre']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-4 mt-5">
                                        
                                        {!! Form::label('status', 'Activo:', ['class' => 'bold mt-5']) !!}
                                        <label class="checkbox-inline">
                                            {!! Form::hidden('status', 0) !!}
                                            {!! Form::checkbox('status', '1', null) !!}
                                        </label>
                                    </div>
                                    
                                    
                                    <div class="form-group  mb-5">
                                        <img src="/img/seo/default.png" id="picture2" alt="10" srcset="" width="150" class="img-thumbnail">
                                        
                                        {{Form::label('image2', 'Subir imagen', ['class'=>'mb-4'])}}
                                        <input type="file" name="image" class="" id="image2">
                                        
                                    </div>
                                    
                                    
                                </div>
                                
                                
                            </div>
                            
                            
                            {!! Form::submit('Guardar', ['class' => 'btn_style mt-4 mb-3 offset-2 form-submit']) !!}
                            
                        </form>
                    </div>
                </div>
                
                
                
            </div>
        </div>
    </div>
    <!-- Customers List End -->
    
    
</div>


<script>
    
    
    
    document.getElementById("image2").addEventListener('change',CambiarImagen2);
    
    function CambiarImagen2(event) {
        var file= event.target.files[0];
        var reader = new FileReader();
        reader.onload = (event)=>{
            document.getElementById('picture2').setAttribute('src',event.target.result);
        };
        reader.readAsDataURL(file);
    }
</script>
@endsection
@endhasanyrole
@else

<a id="inicio" href="{{route('inicio')}}">.</a>


@endif