@php
$html_tag_data = [];
$title = 'Añadir Planes';
$description= 'Añadir Planes'
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
    <h1>Agregar Plan</h1>
    <div class="row">
        <div class="col-12 mb-0">
            <div id="checkboxTable">
                <div class="contenedor">
                    <div class="card">
                        <form action="{{ route('plan.store') }}" method="post">

                            @csrf

                            <div class="box box-info padding-1">
                                <div class="card-body row px-4" >

                                    <div class="form-group col-sm-6 mb-4 ">
                                        {{ Form::label('name','Nombre',['class'=>'form-label']) }}
                                        {{ Form::text('name',null,['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'nombre' ]) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group col-sm-6 mb-4">
                                        {{ Form::label('amount','Monto',['class'=>'form-label']) }}
                                        {{ Form::number('amount',null,['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Monto']) }}
                                        {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group col-sm-12 mb-4">
                                        {{ Form::label('max_change','Usuario',['class'=>'form-label']) }}
                                        <select class="form-select digits @if ($errors->has('user_id')) is-invalid  @endif" id="user_id" name="user_id">
                                            <option value="">Seleccione El Usuario</option>
                                            @foreach ($User as $val)
                                                <option value="{{$val->id}}" >{{$val->name}} {{$val->last_name}}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

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
