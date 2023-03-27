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
<div class="container">
    <!-- Title and Top Buttons Start -->
    <!-- Customers List Start -->
    <h1>Editar Usuario</h1>
    <h1 class="success">{{$message}}</h1>
    <div class="row">
        <div class="col-12 mb-0">
            <div id="checkboxTable">
                <div class="contenedor">
                    <div class="card">
                        <form action="{{ route('payment.update',['id'=>$pg->id]) }}" method="post">
                            @method('PATCH')
                            @csrf
                            
                            <div class="box box-info padding-1" >
                                <div class="box-body row px-4" >
                                    
                                    <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('name','Metodo',['class'=>'mb-4']) }}
                                        {{ Form::text('name',null,['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'nombre']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                    <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('ClientAppKey','ClientAppKey (Cliente llave)',['class'=>'mb-4']) }}
                                        {{ Form::text('ClientAppKey',null,['class' => 'form-control' . ($errors->has('ClientAppKey') ? ' is-invalid' : ''), 'placeholder' => 'ClientAppKey']) }}
                                        {!! $errors->first('ClientAppKey', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                    <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('ClientAppCode','ClientAppCode (Codigo de cliente)',['class'=>'mb-4']) }}
                                        {{ Form::text('ClientAppCode',null,['class' => 'form-control' . ($errors->has('ClientAppCode') ? ' is-invalid' : ''), 'placeholder' => 'ClientAppCode']) }}
                                        {!! $errors->first('ClientAppCode', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                    
                                    <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('Accountid','Accountid (Id de cuenta)',['class'=>'mb-4']) }}
                                        {{ Form::text('Accountid',null,['class' => 'form-control' . ($errors->has('Accountid') ? ' is-invalid' : ''), 'placeholder' => 'Accountid']) }}
                                        {!! $errors->first('Accountid', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-4 mt-5">
                                        
                                        {!! Form::label('active', 'Activo:', ['class' => 'bold ']) !!}
                                        <label class="checkbox-inline">
                                            {!! Form::hidden('active', 0) !!}
                                            {!! Form::checkbox('active', '1', null) !!}
                                        </label>
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            {!! Form::submit('Guardar', ['class' => 'btn_style mt-4 mb-3 offset-2 form-submit']) !!}
                            
                        </form>
                    </div>
                </div>
                <script>
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