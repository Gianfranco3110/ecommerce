@php
$html_tag_data = [];
$title = 'Cart';
$description = 'Ecommerce Cart Page';
@endphp
@extends('frontend.layoust.app')

@section('css')
@endsection

@section('js_vendor')
<script src="/js/vendor/input-spinner.min.js"></script>
@endsection

@section('js_page')
@endsection
{{-- @include('frontend.resumen') --}}
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
                        <span class="text-small align-middle">Tienda</span>
                    </a>
                    <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                </div>
            </div>
            <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->
    
    <div class="row">
        <div class="col-12 col-lg order-1 order-lg-0">
            <!-- Items Start -->
            <h2 class="small-title">Items</h2>
            <div class="mb-5">
                @foreach ($query as $producto)
                <div class="card mb-2">
                    <div class="row g-0 sh-18 sh-md-14">
                        <div class="col-auto">
                            
                            @foreach ($producto->product->media as $image)
                            <img src="{{ $image->getUrl() }}" class="card-img card-img-horizontal h-100 sw-9 sw-sm-13 sw-md-15" alt="thumb">
                            @break
                            @endforeach
                        </div>
                        <div class="col position-relative h-100">
                            <div class="card-body">
                                <div class="row h-100">
                                    <div class="col-12 col-md-6 mb-2 mb-md-0 d-flex align-items-center">
                                        <div class="pt-0 pb-0 pe-2">
                                            <div class="h6 mb-0 clamp-line" data-line="1">{{$producto->product->name}}</div>
                                            <div class="text-muted text-small">Oakland</div>
                                            <div class="mb-0 sw-19">$ {{$producto->product->price}}</div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-6 col-md-3 pe-0 d-flex align-items-center">
                                        <div class="input-group spinner sw-11" data-trigger="spinner">
                                            <div class="input-group-text">
                                                <button type="button"
                                                class="spin-down single px-2 d-flex justify-content-center"
                                                data-spin="down">-</button>
                                            </div>
                                            <input type="text" class="form-control text-center px-0" value="1"
                                            data-rule="quantity" />
                                            <div class="input-group-text">
                                                <button type="button"
                                                class="spin-up single px-2 d-flex justify-content-center"
                                                data-spin="up">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                    class="col-6 col-md-3 d-flex justify-content-end justify-content-md-start align-items-center">
                                    <div class="h6 mb-0">$ {{$producto->product->price}}</div>
                                    
                                    
                                </div>
                                
                                
                                
                                
                            </div>
                        </div>
                        <form action="{{route('cart.remover')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$producto->product->id}}">
                            
                            <button
                            class="btn btn-sm btn-icon btn-icon-only btn btn-foreground-alternate position-absolute t-2 e-2"
                            type="submit">
                            <i data-acorn-icon="error-hexagon"></i>
                        </button>
                    </form>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Items End -->
    
    <!-- Banners Start -->
    
    <!-- Banners End -->
</div>

<div class="col-12 col-lg-auto order-0 order-lg-1">
    <!-- Summary Start -->
    <h2 class="small-title">Summary</h2>
    <div class="card mb-5 w-100 sw-lg-35">
        <div class="card-body">
            <div class="mb-4">
                <div class="mb-2">
                    <p class="text-small text-muted mb-1">ITEMS</p>
                    <p>
                        <span class="text-alternate">@include('frontend.estado')</span>
                    </p>
                </div>
                <div class="mb-2">
                    <p class="text-small text-muted mb-1">TOTAL</p>
                    <p>
                        <span class="text-alternate">
                            <span class="text-small text-muted">$</span>
                            {{number_format(Cart::getSubTotal(),2)}}
                        </span>
                    </p>
                </div>
                <div class="mb-2">
                    <p class="text-small text-muted mb-1">SHIPPING</p>
                    <p>
                        <span class="text-alternate">
                            <span class="text-small text-muted">$</span>
                            0,00
                        </span>
                    </p>
                </div>
                {{-- <div class="mb-2">
                    <p class="text-small text-muted mb-1">SALE</p>
                    <p>
                        <span class="text-alternate">
                            <span class="text-small text-muted">$</span>
                            -24.50
                        </span>
                    </p>
                </div> --}}
                <div class="mb-2">
                    <p class="text-small text-muted mb-1">GRAND TOTAL</p>
                    <div class="cta-2">
                        <span>
                            <span class="text-small text-muted cta-2">$</span>
                            {{number_format(Cart::getSubTotal(),2)}}
                        </span>
                    </div>
                </div>
            </div>
            
            
            @if (Auth()->check())
            <a href="/checkout" class="btn btn-icon btn-icon-end btn-primary w-100" type="button">
                <span>Pagar Compra</span>
                <i data-acorn-icon="chevron-right"></i>
            </a>
            @else
            <a  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-icon btn-icon-end btn-primary w-100" type="button">
                <span>Pagar Compra</span>
                <i data-acorn-icon="chevron-right" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
            </a>
            @endif
        </div>
    </div>
    <!-- Summary End -->
</div>
</div>
</div>
@endsection
