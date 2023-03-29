@php
    $html_tag_data = [];
    $title = 'Fidelizacion';
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
        <h1>Nueva fidelizacion</h1>
        <h1 class="success">{{$message}}</h1>
        <div class="row">
            <div class="col-12 mb-0">
                <div id="checkboxTable">
                    <div class="contenedor">
                    <div class="card">
                        <form action="{{ route('fidel.store') }}" method="post">
                            @csrf
                             <div class="box box-info padding-1">
                                <div class="box-body row px-4" >
                                    
                                    <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('name','Nombre',['class'=>'mb-4']) }}
                                        {{ Form::text('name',null,['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'nombre','required']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                      <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('description','Descripción',['class'=>'mb-4']) }}
                                        {{ Form::text('description',null,['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'descripcion', 'required']) }}
                                        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                     <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('monto','Monto',['class'=>'mb-4']) }}
                                        {{ Form::text('monto',null,['class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'monto','required']) }}
                                        {!! $errors->first('monto', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                     <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('points','Puntos',['class'=>'mb-4']) }}
                                        {{ Form::text('points',null,['class' => 'form-control' . ($errors->has('points') ? ' is-invalid' : ''), 'placeholder' => 'points','required']) }}
                                        {!! $errors->first('points', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <h4>Productos</h4><br>
                                    <div class="checkboxs" id="checkboxs">
                                        @foreach ($product as $p)
                                        <ul>
                                        <li><input type="checkbox" name="productos[]" class="check" id="{{$p->id}}" value="{{$p->id}}"> {{$p->name}}</li>
                                        </ul>
                                        @endforeach
                                      </div>                                    
                                    <!--      <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-4 mt-5">
                                        
                                        {!! Form::label('status', 'Activo:', ['class' => 'bold ']) !!}
                                        <label class="checkbox-inline">
                                            {!! Form::hidden('status', 0) !!}
                                            {!! Form::checkbox('status', '1', null) !!}
                                        </label>
                                    -->
                                        <label for="">Activo<input type="checkbox" name="active" id="active" value="1"/></label>
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