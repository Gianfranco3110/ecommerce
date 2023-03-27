
@php
    $html_tag_data = [];
    $title = 'Editar costo Envio';
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
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Catalago Premio</span>
                    </div>
                    <div class="card-body">
            {!! Form::model($catalagoPremio, ['route' => ['catalago-premios.update', $catalagoPremio->id], 'method' => 'patch','enctype'=>"multipart/form-data"]) !!}

                            {{ method_field('PATCH') }}
                            @csrf

                            @include('catalago-premio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
