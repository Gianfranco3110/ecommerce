@php
$html_tag_data = [];
$title = 'Lista costo de envios';
$description= 'Ecommerce Customer List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@if(Auth()->check())
@hasanyrole('Super Admin')
@section('css')
@endsection

@section('js_vendor')
@endsection



@section('content')
<div class="container">
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row g-0">
            <!-- Title Start -->
            <div class="col-auto mb-3 mb-md-0 me-auto">
                <div class="w-auto sw-md-30">
                    <a href="#" class="muted-link pb-1 d-inline-block breadcrumb-back">
                        <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                        <span class="text-small align-middle">Home</span>
                    </a>
                    <h1 class="mb-0 pb-0 display-4" id="title">Costo de Envios</h1>
                </div>
            </div>
            <div style="width: 100%; height: 10vh;"></div>
            <!-- Title End -->

            <!-- Top Buttons Start -->
            {{-- <div class="w-100 d-md-none"></div>
            <div class="col-12 col-sm-6 col-md-auto d-flex align-items-end justify-content-end mb-2 mb-sm-0 order-sm-3">
                <a href="{{route('new.product')}}" type="button" class="btn btn-outline-primary btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto">
                    <i data-acorn-icon="plus"></i>
                    <span>Agregar</span>
                </a>
                <div class="dropdown d-inline-block d-lg-none">
                </div>
                <!-- Top Buttons End -->
            </div> --}}
            <div class="ir_derecha">

                @hasanyrole('super admin')
                <a href="{{route('shipping-costs.create')}}" class="btn btn-1 btn_style" style="width: 10%;">Agregar</a>
               @endhasanyrole

            </div>
        </div>

        <div class="row g-0">
            <div class="col-12 mb-5">
                <!-- List Items Start -->
                <div id="checkboxTable">
                    <div class="mb-4 mb-lg-3 bg-transparent no-shadow d-none d-lg-block">
                        <div class="row g-0">
                            {{-- <div class="col-auto sw-11 d-none d-lg-flex"></div> --}}
                            <div class="col">
                                <div class="ps-5 pe-4 h-100">
                                    <div class="row g-0 h-100 align-content-start custom-sort">
                                        <div class="col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="name">N°</div>
                                        </div>

                                        <div class="col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Ciudad Origen</div>
                                        </div>

                                        <div class="col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Ciudad Destino</div>
                                        </div>

                                        <div class="col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Valor</div>
                                        </div>




                                        <div class="col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Estatus</div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                {{--  "name" => "ComprasExtra"
                "description" => "por compras mayores ha 100 mil pesos"
                "monto" => 10.0
                "points" => 10
                "productos" => "{}"
                "active" => 1
                --}}

                <!-- Items Container Start -->
                @foreach ($shippingCosts as $shippingCost)
                <div class="card mb-2">
                    <div class="row g-0 h-100 sh-lg-9 position-relative">

                        <div class="col py-4 py-lg-0">
                            <div class="ps-5 pe-4 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                    <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-2">
                                        <div class="lh-1 text-alternate"> {{$shippingCost->id}}</div>
                                    </div>
                                    <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-2">
                                        <div class="lh-1 text-alternate"> {{$shippingCost->ciudad_origen}}</div>
                                    </div>
                                    <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                        <span class="lh-1 text-alternate">{{$shippingCost->ciudad_destino}}</span>
                                    </div>
                                    <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                        <span class="lh-1 text-alternate">{{$shippingCost->valor}}</span>
                                    </div>



                                    <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                        <span class="lh-1 text-alternate">{{$shippingCost->active}}</span>

                                    </div>

                                    <div class="col-1 d-flex flex-column mb-2 mb-lg-0 align-items-end order-2 order-lg-last justify-content-lg-center">

                                        <div class="btn-group ms-1 check-all-container">

                                            <button
                                            type="button"
                                            class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                                            data-bs-offset="0,3"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                            ></button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="{{route('shipping-costs.edit',$shippingCost->id)}}">
                                                    <span class="align-middle d-inline-block">Editar</span>
                                                </a>
                                                {{-- <a class="dropdown-item" href="{{route('payment.delete',['id'=>$city->id])}}">
                                                    <span class="align-middle d-inline-block">Delete</span>
                                                </a> --}}
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Items Container Start -->

                <!-- List Items End -->
            </div>
        </div>
        <!-- Items Pagination Start -->
        <div class="w-100 d-flex justify-content-center">
            <nav>
                {{-- {{ $products->links() }} --}}
            </nav>
        </div>
        <!-- Items Pagination End -->
    </div>
</div>
@endsection


@endhasanyrole

@else

<a id="inicio" href="{{route('inicio')}}">.</a>
<script>
    let inicio = document.getElementById('inicio');
    setTimeout(() => {
        inicio.click();
    }, 500);
</script>

@endif

