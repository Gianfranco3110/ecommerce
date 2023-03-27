@php
    $html_tag_data = [];
    $title = 'Crear costo Envio';
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
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h1 class="card-title">Crear Talla</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sizes.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('size.form')

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
