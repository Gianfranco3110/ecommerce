@php
    $html_tag_data = [];
    $title = 'Editar cupon';
    $description= 'Editar Cupones'
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
        <h1>Editar Cupon</h1>
        <h1 class="success">{{$message}}</h1>
        <div class="row">
            <div class="col-12 mb-0">
                <div id="checkboxTable">
                    <div class="contenedor">
                    <div class="card">
                  
            {!! Form::model(  $cupon , ['route' => ['cupon.update',   $cupon ->id], 'method' => 'patch']) !!}

                            @method('PATCH')
                            @csrf

                                             <div class="box box-info padding-1">
                                <div class="box-body row px-4" >
                                    
                                    <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('name','Nombre',['class'=>'mb-4']) }}
                                        {{ Form::text('name',null,['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'nombre']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                    <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('codigo','Codigo',['class'=>'mb-4']) }}
                                        {{ Form::text('codigo',null,['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'codigo']) }}
                                        {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                    <div class="form-group col-sm-6 mb-4">
                                        {{ Form::label('max_change','Max. Canjes',['class'=>'mb-4']) }}
                                        {{ Form::text('max_change',null,['class' => 'form-control' . ($errors->has('max_change') ? ' is-invalid' : ''), 'placeholder' => 'Max. canjes']) }}
                                        {!! $errors->first('max_change', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                    
                                    <div class="form-group col-sm-6 mb-4">
                                        {{ Form::label('start_day','Dia inicial',['class'=>'mb-4']) }}
                                        {{ Form::text('start_day',null,['class' => 'form-control' . ($errors->has('start_day') ? ' is-invalid' : ''), 'placeholder' => 'Dia inicial']) }}
                                        {!! $errors->first('start_day', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                        <div class="form-group col-sm-6 mb-4">
                                        {{ Form::label('final_day','Dia Final',['class'=>'mb-4']) }}
                                        {{ Form::text('final_day',null,['class' => 'form-control' . ($errors->has('final_day') ? ' is-invalid' : ''), 'placeholder' => 'Dia final']) }}
                                        {!! $errors->first('final_day', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group col-sm-6 mb-4">
                                        {{ Form::label('number_exchange','Numero De canjes',['class'=>'mb-4']) }}
                                        {{ Form::text('number_exchange',null,['class' => 'form-control' . ($errors->has('number_exchange') ? ' is-invalid' : ''), 'placeholder' => 'N.Canjes']) }}
                                        {!! $errors->first('number_exchange', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                    <div class="form-group col-sm-6 mb-4">
                                        {{ Form::label('amount','Monto',['class'=>'mb-4']) }}
                                        {{ Form::number('amount',null,['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Monto']) }}
                                        {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                    
                                    <div class="form-group col-sm-6 mb-4">
                                        {{ Form::label('type','Tipo',['class'=>'mb-4']) }}
                                        {!! Form::select('type', [
                                        'porcentage' => 'Porcentaje',
                                        'total_amount' => 'Monto total',
                                        
                                        ], null,['class' => 'form-control']) !!}
                                        
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