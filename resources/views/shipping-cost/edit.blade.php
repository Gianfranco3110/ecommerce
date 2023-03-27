


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
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">EDITAR COSTO DE ENVIO</span>
                    </div>
                    <div class="card-body">
                     

            {!! Form::model($shippingCost, ['route' => ['shipping-costs.update', $shippingCost->id], 'method' => 'patch']) !!}


                            @csrf

                            @include('shipping-cost.form')

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