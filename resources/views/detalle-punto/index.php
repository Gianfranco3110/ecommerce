@php
    $html_tag_data = [];
    $title = 'Detalle punto';
    $description= 'Ecommerce Detalle de punto'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
    <script src="/js/cs/checkall.js"></script>
    <script src="/js/pages/products.list.js"></script>
@endsection

@section('content')
    @if (session('mensaje'))
        <div class="alert alert-success">
            <strong>{{ session('mensaje') }}</strong>
        </div>
    @endif
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
                        <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
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

                <a href="{{route('plan.add')}}" class="btn btn-1 btn_style" style="width: 10%;">Agregar</a>

            </div>
        </div>

        <div class="row g-0">
            <div class="col-12 mb-5">
                <!-- List Items Start -->
                <div id="checkboxTable">
                    <div class="mb-4 mb-lg-3 bg-transparent no-shadow d-none d-lg-block">
                        <div class="row g-0">
                            <div class="col">
                                <div class="ps-5 pe-4 h-100">
                                    <div class="row g-0 h-100 align-content-start custom-sort">
                                        <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="name">Id</div>
                                        </div>
                                        <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="name">Puntos canjeados</div>
                                        </div>
                                        <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="email">Puntos disponibles</div>
                                        </div>
                                        <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="email">Puntos gastados</div>
                                        </div>
                                        <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="email">Whatsaap</div>
                                        </div>
                                        <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="email">Usuario</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Items Container Start -->
                    <!-- @foreach ($plan as $cupon)
                    <div class="card mb-2">
                        <div class="row g-0 h-100 sh-lg-9 position-relative">

                            <div class="col py-4 py-lg-0">
                                <div class="ps-5 pe-4 h-100">
                                    <div class="row g-0 h-100 align-content-center">
                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-2">
                                            <div class="lh-1 text-alternate"> {{$cupon->id}}</div>
                                        </div>
                                            <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-2">
                                                <div class="lh-1 text-alternate"> {{$cupon->name}}</div>
                                            </div>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-2">
                                            <div class="lh-1 text-alternate"> {{$cupon->amount}}</div>
                                        </div>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                            <div class="lh-1 text-alternate">{{$cupon->nombre_user}} {{$cupon->segundo_nombre}}</div>
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
                                                    <a class="dropdown-item" href="{{route('plan.edit',$cupon->id)}}">
                                                        <span class="align-middle d-inline-block">Editar</span>
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('plan.delet',$cupon->id)}}">
                                                        <span class="align-middle d-inline-block">Eliminar</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach -->

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
