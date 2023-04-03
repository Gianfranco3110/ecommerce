@php
    $html_tag_data = [];
    $title = 'Lista de productos';
    $description= 'Ecommerce Product List Page'
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
                    <!-- Title End -->

                    <!-- Top Buttons Start -->
                    <div class="w-100 d-md-none"></div>
                    <div class="col-12 col-sm-6 col-md-auto d-flex align-items-end justify-content-end mb-2 mb-sm-0 order-sm-3">
                        <a href="{{route('new.product')}}" type="button" class="btn btn-outline-primary btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto">
                            <i data-acorn-icon="plus"></i>
                            <span>Agregar</span>
                        </a>
                        <div class="dropdown d-inline-block d-lg-none">
                    </div>
                    <!-- Top Buttons End -->
                </div>
            </div>
        </div>
<br/><br/><br/><br/><br/>
        <div class="row g-0">
            <div class="col-12 mb-5">
                <!-- List Items Start -->
                <div id="checkboxTable">
                    <div class="mb-4 mb-lg-3 bg-transparent no-shadow d-none d-lg-block">
                        <div class="row g-0">
                            <div class="col-auto sw-11 d-none d-lg-flex"></div>
                            <div class="col">
                                <div class="ps-5 pe-4 h-100">
                                    <div class="row g-0 h-100 align-content-center custom-sort">
                                        <div class="col-lg-4 d-flex flex-column mb-lg-0 pe-3 d-flex">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="name">Titulo</div>
                                        </div>
                                        <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="email">Stock</div>
                                        </div>
                                        <div class="col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="phone">Precio</div>
                                        </div>
                                        <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Estatus</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Items Container Start -->
                    @foreach ($products as $product)
                    <div class="card mb-2">
                        <div class="row g-0 h-100 sh-lg-9 position-relative">
                                {{-- <img src="img/product/product_id_{{$product->id}}/{{$product->image[0]}}" alt="product" class="card-img card-img-horizontal sw-11 h-100" /> --}}

                            @foreach ($product->media as $image)
                            <img src="{{ $image->getUrl() }}" alt="imagen no encontrada" class="card-img card-img-horizontal sw-11 h-100">
                            @break

                            @endforeach

                            </a>
                            <div class="col py-4 py-lg-0">
                                <div class="ps-5 pe-4 h-100">
                                    <div class="row g-0 h-100 align-content-center">
                                        <a href="{{route('product.edit',['id'=>$product->id])}}"
                                           class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 pe-3 d-flex order-1 h-lg-100 justify-content-center">
                                            {{$product->name}}
                                            {{-- <div class="text-small text-muted text-truncate position">#2342</div> --}}
                                        </a>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                            <div class="lh-1 text-alternate"> {{$product->stock}}</div>
                                        </div>
                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                            <div class="lh-1 text-alternate">${{ number_format($product->price, 2) }}</div>
                                        </div>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                            <span class="badge bg-outline-primary group">{{$product->status}}</span>
                                        </div>
                                        <div class="col-1 d-flex flex-column mb-2 mb-lg-0 align-items-end order-2 order-lg-last justify-content-lg-center">
                                            {{-- <label class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input pe-none" />
                                            </label> --}}
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
                                                    <a class="dropdown-item" href="{{route('product.edit',['id'=>$product->id])}}">
                                                        <span class="align-middle d-inline-block">Editar</span>
                                                    </a>
                                                    {{-- <a class="dropdown-item" href="{{route('product.delete',['id'=>$product->id])}}">
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
                {{ $products->links() }}
                </nav>
            </div>
            <!-- Items Pagination End -->
        </div>
    </div>
@endsection
