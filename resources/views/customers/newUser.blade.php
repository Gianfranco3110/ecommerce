@php
$html_tag_data = [];
$title = 'Lista de usuarios';
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
<div class="row">
    <div class="col-md-12">
        
        @includeif('partials.errors')
        
        <div class="card card-default">
            <div class="card-header">
                <h1 class="card-title">Crear Usuario</h1>
            </div>
            <div class="card-body">
                
                
                <form action="{{ route('store.user') }}" method="post">
                    @csrf
                    <div class="box box-info padding-1">
                        <div class="box-body row">
                            
                            <div class="form-group col-sm-6 mb-4">
                                {{ Form::label('name','Nombre',['class'=>'mb-4']) }}
                                {{ Form::text('name',null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'nombre']) }}
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>    
                            
                            <div class="form-group col-sm-6 mb-4">
                                {{ Form::label('last_name','Apellidos',['class'=>'mb-4']) }}
                                {{ Form::text('last_name',null, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'apellidos']) }}
                                {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>    
                            
                            <div class="form-group col-sm-6 mb-4">
                                {{ Form::label('rol','Rol',['class'=>'mb-4']) }}
                                {{ Form::select('rol',$roles,null, ['class' => 'form-control' . ($errors->has('rol') ? ' is-invalid' : ''), 'placeholder' => 'seleccione rol']) }}
                                {!! $errors->first('rol', '<div class="invalid-feedback">:message</div>') !!}
                            </div>    
                            
                            <div class="form-group col-sm-6 mb-4">
                                {{ Form::label('email','Correo',['class'=>'mb-4']) }}
                                {{ Form::text('email',null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'correo@gmail.com']) }}
                                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                            </div>    
                            
                            <div class="form-group col-sm-6 mb-4">
                                {{ Form::label('password','Contraseña',['class'=>'mb-4']) }}
                                {{ Form::text('password',null, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'contraseña']) }}
                                {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                            </div>   
                            
                            <div class="form-group col-sm-6 mb-4">
                                {{ Form::label('whatsapp','Correo',['class'=>'mb-4']) }}
                                {{ Form::text('whatsapp',null, ['class' => 'form-control' . ($errors->has('whatsapp') ? ' is-invalid' : ''), 'placeholder' => 'whatsapp']) }}
                                {!! $errors->first('whatsapp', '<div class="invalid-feedback">:message</div>') !!}
                            </div>    
                            
                            
                            
                            
                            <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-4 mt-4">
                                
                                {!! Form::label('status', 'Activo:', ['class' => 'bold']) !!}
                                <label class="checkbox-inline">
                                    {!! Form::hidden('status', 0) !!}
                                    {!! Form::checkbox('status', '1', null) !!}
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    
                    
                    
                    
                    {!! Form::submit('Guardar', ['class' => 'btn_style mt-5 offset-2 form-submit']) !!}
                    
                    
                    {{-- <input type="text" name="name">
                    <input type="text" name="last_name">
                    <input type="text" name="email">
                    <input type="password" name="password">
                    <input type="text" name="whatsapp"> --}}
                    
                </form>
            </div>
        </div>
        
    </form>
</div>
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