@php
$html_tag_data = [];
$title = 'Lista de Ordenes';
$description= 'Ecommerce Order List Page';
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
<script src="/js/cs/checkall.js"></script>
<script src="/js/pages/orders.list.js"></script>
@endsection

@section('content')
<div class="container">
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row">
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
            <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->
    
    <!-- Controls Start -->
   
        <!-- Search Start -->
        
        <!-- Search End -->
        
       
            <!-- Length End -->
    <!-- Controls End -->

    <!-- Order List Start -->
    <div class="text-center text-success text-uppercase fs-3 mb-4">
        @if(Session::has('mensaje'))
            <div><i class="fa fa-exclamation-circle" aria-hidden="true"></i>{{Session::get('mensaje')}}</div>
        @endif
    </div>
    <div class="row">
        <div class="col-12 mb-5">
            <div id="checkboxTable">
                <div class="mb-4 mb-lg-3 bg-transparent no-shadow d-none d-lg-block">
                    <div class="row g-0">
                        <div class="col">
                            <div class="ps-5 pe-4 h-100">
                                <div class="row g-0 h-100 align-content-center custom-sort">
                                    {{-- <div class="col-lg-2 d-flex flex-column mb-lg-0 pe-3 d-flex">
                                        <div class="text-muted text-medium cursor-pointer sort" data-sort="name">ID</div>
                                    </div> --}}
                                    <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                        <div class="text-muted text-medium cursor-pointer sort" data-sort="email">Cliente</div>
                                    </div>
                                    <div class="col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                        <div class="text-muted text-medium cursor-pointer sort" data-sort="phone">Referencia</div>
                                    </div>
                                    <div class="col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                        <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Total</div>
                                    </div>
                                    <div class="col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                        <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Status</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div id="checkboxTable">
                    @foreach ($sales as $sale)
                    <div class="card mb-2">
                        <div class="card-body pt-0 pb-0 sh-21 sh-md-8">
                            <div class="row g-0 h-100 align-content-center">
                                <div class="col-6 col-md-2 d-flex flex-column justify-content-center mb-2 mb-md-0 order-1 order-md-1 h-md-100 position-relative">
                                    <div class="text-muted text-small d-md-none">Id</div>
                                    <a href="/Orders/Detail" class="text-truncate h-100 d-flex align-items-center">{{ $sale->id }}</a>
                                </div>
                                <div class="col-6 col-md-2 d-flex flex-column justify-content-center mb-2 mb-md-0 order-3 order-md-2">
                                    <div class="text-muted text-small d-md-none">{{ $sale->customer }}</div>
                                    <div class="text-alternate">{{ $sale->customer }}</div>
                                </div>

                                <div class="col-6 col-md-2 d-flex flex-column justify-content-center mb-2 mb-md-0 order-3 order-md-2">
                                    <div class="text-muted text-small d-md-none">{{ $sale->reference }}</div>
                                    <div class="text-alternate">{{ $sale->reference }}</div>
                                </div>
                                <div class="col-6 col-md-2 d-flex flex-column justify-content-center mb-2 mb-md-0 order-4 order-md-3">
                                    <div class="text-muted text-small d-md-none">{{ $sale->total }}</div>
                                    <div class="text-alternate">
                                        <span>
                                            <span class="text-small">$</span>
                                            {{ $sale->total }}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-6 col-md-2 d-flex flex-column justify-content-center mb-2 mb-md-0 order-last order-md-5">
                                    <div class="text-muted text-small d-md-none">{{ $sale->status }}</div>
                                    <div class="text-alternate">
                                        <span class="badge rounded-pill bg-outline-primary">{{ $sale->status == Null ? $sale->status:"No definido" }}</span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-2 d-flex flex-column justify-content-center mb-2 mb-md-0 order-last order-md-5">
                                    <i class="fa fa-search" id="icon-search"></i>                                
                                </div>

                                <div class="col-6 col-md-2 d-flex flex-column justify-content-center mb-2 mb-md-0 order-5 order-md-4">
                                    <div class="text-muted text-small d-md-none">Date</div>
                                    <div class="text-alternate">{{ $sale->created_at }}</div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> --}}


                @foreach ($sales as $sale)
                <div class="card mb-2">
                    <div class="row g-0 h-100 sh-lg-9 position-relative">
                        {{-- @foreach ($product->media as $image)
                        <img src="{{ $image->getUrl() }}" alt="imagen no encontrada" class="card-img card-img-horizontal sw-11 h-100">
                        @break
                        @endforeach --}}
                        <div class="col py-4 py-lg-0">
                            <div class="ps-5 pe-4 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                    <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                        <div class="lh-1 text-alternate"> 
                                            {{-- {{$product->stock}} --}}
                                            {{$sale->user_id}}
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                        <div class="lh-1 text-alternate">
                                            {{$sale->reference}}
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                        <div class="lh-1 text-alternate">
                                            {{$sale->total}}

                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                        <div class="lh-1 text-alternate">
                                            {{$sale->status}}
                                        </div>
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
                                                <a class="dropdown-item" href="{{route('edit.orders', ['id' => $sale->id])}}">
                                                    <span class="align-middle d-inline-block">Editar</span>
                                                </a>                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>



        </div>
    </div>
</div>
        <!-- Order List End -->

        <!-- Pagination Start -->
        {{-- <div class="d-flex justify-content-center">
            <nav>
                <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link shadow" href="#" tabindex="-1" aria-disabled="true">
                        <i data-acorn-icon="chevron-left"></i>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link shadow" href="#">1</a></li>
                <li class="page-item"><a class="page-link shadow" href="#">2</a></li>
                <li class="page-item"><a class="page-link shadow" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i data-acorn-icon="chevron-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div> --}}
    <!-- Pagination End -->
@endsection
