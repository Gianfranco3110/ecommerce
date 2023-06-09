@php
    $html_tag_data = [];
    $title = 'Fidelizacion';
    $description= 'Ecommerce Customer List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@if(Auth()->check())

@section('css')
    <link rel="stylesheet" href="/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css" />
@endsection

@section('js_vendor')
    <script src="/js/vendor/select2.full.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/checkall.js"></script>
    <script src="/js/pages/customers.list.js"></script>
@endsection

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <!-- Customers List Start -->
        <h1 class="success">{{$message}}</h1>
        <div class="row">
            <div class="col-12 mb-0">
                <div id="checkboxTable">
                    <div class="contenedor">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Nueva fidelizacion</h1>
                        </div>
                        <form action="{{ route('fidel.store') }}" method="post">
                            @csrf
                             <div class="card-body box box-info padding-1">
                                <div class=" row " >

                                    <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('name','Nombre',['class'=>'mb-3']) }}
                                        {{ Form::text('name',null,['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'nombre','required']) }}
                                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                      <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('description','Descripción',['class'=>'mb-3']) }}
                                        {{ Form::text('description',null,['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'descripcion', 'required']) }}
                                        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                     <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('monto','Monto',['class'=>'mb-3']) }}
                                        {{ Form::text('monto',null,['class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'monto','required']) }}
                                        {!! $errors->first('monto', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                     <div class="form-group col-sm-6 mb-4 mt-2">
                                        {{ Form::label('points','Puntos',['class'=>'mb-3']) }}
                                        {{ Form::text('points',null,['class' => 'form-control' . ($errors->has('points') ? ' is-invalid' : ''), 'placeholder' => 'points','required']) }}
                                        {!! $errors->first('points', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                      <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6 mb-3">
                                     <!-- <div class="mb-3" >Todos los productos <input type="checkbox" name="productos[]" id="productos" value="{{$product}}"/></div> -->
                                    <label for="" class="mb-3">Productos </label>
                                     <select class=" required form-control round" id="select2Producto" name="productos[]">
                                            @foreach ($product as $p)
                                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                            @endforeach
                                        </select>
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

                                      <div class="text-center">
                                        {!! Form::submit('Guardar', ['class' => ' btn btn-outline-primary ms-0 ms-sm-1 w-100 w-md-auto form-submit']) !!}
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
@push('page-script')
<script>
    $(document).ready(function() {
                $('#select2Producto').select2({
                    multiple: true,
                });
            })
</script>
@endpush
