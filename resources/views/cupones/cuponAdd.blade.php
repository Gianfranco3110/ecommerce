@php
$html_tag_data = [];
$title = 'Añadir cupon';
$description= 'Añadir cupones'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@if(Auth()->check())

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
<script src="/js/pages/customers.list.js"></script>
@endsection

@section('content')
<div class="container">
    <!-- Title and Top Buttons Start -->
    <!-- Customers List Start -->
    <h1 class="success">{{$message}}</h1>
    @if (session('mensaje'))
    <div class="alert alert-{{session('type')}}">
        <strong>{{ session('mensaje') }}</strong>
    </div>
    @endif
    <div class="row">
        <div class="col-12 mb-0">
            <div id="checkboxTable">
                <div class="contenedor">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Agregar Cupon</h1>
                        </div>
                        <form action="{{ route('new.cupon') }}" method="post">

                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body row px-4" >

                                    <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('name','Nombre',['class'=>'mb-4']) }}
                                        {{ Form::text('name',null,['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'nombre' , 'required']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('codigo','Código',['class'=>'mb-4']) }}
                                        {{ Form::text('codigo',null,['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'código', 'required']) }}
                                        {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group col-sm-6 mb-4">
                                        {{ Form::label('max_change','Cantidad de cupones',['class'=>'mb-4']) }}
                                        {{ Form::text('max_change',null,['class' => 'form-control' . ($errors->has('max_change') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad de cupones' , 'required','id'=>'id_max_change']) }}
                                        {!! $errors->first('max_change', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>


                                    <div class="form-group col-sm-6 mb-4">
                                        {{ Form::label('start_day','Fecha inicial',['class'=>'mb-4']) }}
                                        {{ Form::date('start_day',null,['class' => 'form-control' . ($errors->has('start_day') ? ' is-invalid' : ''), 'placeholder' => 'Fecha inicial','required']) }}
                                        {!! $errors->first('start_day', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                     <div class="form-group col-sm-6 mb-4">
                                        {{ Form::label('final_day','Fecha final',['class'=>'mb-4']) }}
                                        {{ Form::date('final_day',null,['class' => 'form-control' . ($errors->has('final_day') ? ' is-invalid' : ''), 'placeholder' => 'Fecha final', 'required']) }}
                                        {!! $errors->first('final_day', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>


                                    <div class="form-group col-sm-6 mb-4">
                                        {{ Form::label('number_exchange','Número de canjes por comprador',['class'=>'mb-4']) }}
                                        {{ Form::text('number_exchange',null,['class' => 'form-control' . ($errors->has('number_exchange') ? ' is-invalid' : ''), 'placeholder' => 'N.Canjes por comprador', 'required','id'=>'id_number_exchange']) }}
                                        {!! $errors->first('number_exchange', '<div class="invalid-feedback">:message</div>') !!}
                                        <div id="id_messague_error_cant" class="invalid-feedback"></div>
                                    </div>

                                    <div class="form-group col-sm-6 mb-4">
                                        {{ Form::label('amount','Valor',['class'=>'mb-4']) }}
                                        {{ Form::number('amount',null,['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Valor', 'required']) }}
                                        {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>


                                    <div class="form-group col-sm-6 mb-4">
                                        {{ Form::label('type','Tipo',['class'=>'mb-4']) }}
                                        {!! Form::select('type', [
                                        'porcentage' => 'Porcentaje',
                                        'total_amount' => 'Monto total',

                                        ], null,['class' => 'form-control']) !!}

                                    </div>


                                 <!-- <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-4 mt-5">
                                        {!! Form::label('status', 'Activo:', ['class' => 'bold ']) !!}
                                        <label class="checkbox-inline">
                                            {!! Form::hidden('status', 0) !!}
                                            {!! Form::checkbox('status', '1', null) !!}
                                        </label>
                                -->
                        <label for="">Activo<input type="checkbox" name="active" id="active" value="1"/></label>
                                    </div>
                                </div>

                                <div class="w-100 px-4 mt-4">
                                    {!! Form::submit('Guardar', ['class' => ' btn btn-success  mb-4 form-submit']) !!}
                                </div>
                            </div>




                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <!-- Customers List End -->


</div>

<script>

    $('#id_max_change').on('input', function (){
        $('#id_number_exchange').val("")
    });

    $('#id_number_exchange').on('input', function (){
        let cantidad = $('#id_max_change').val();
        console.log(this);

        if(this.value>cantidad){
            $(this).addClass('is-invalid');

            //
            $('#id_messague_error_cant').text(`Error, El número de canjes por comprador no debe ser mayor a la cantidad disponible`)
        }else{
            $(this).removeClass('is-invalid');
        }

    });
</script>

@endsection

@else

<a id="inicio" href="{{route('inicio')}}">.</a>
<script>
    let inicio = document.getElementById('inicio');
    setTimeout(() => {
        inicio.click();
    }, 500);

    $('#id_max_change').on('input', function (){
        let canjes = $('#id_number_exchange').val();

    });

    $('#id_number_exchange').on('input', function (){
        let cantidad = $('#id_max_change').val();
        console.log(this);

        if(this.value>cantidad){
            $(this).addClass('is-invalid');
            //
            $('#id_messague_error_cant').text(`Error, la cantidad debe ser menor a  , que es la cantidad del plan asignado`)
        }else{
            $(this).removeClass('is-invalid');
        }

    });
</script>




@endif
