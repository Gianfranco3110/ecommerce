@php
    $html_tag_data = [];
    $title = 'Dashboard';
    $description= 'Ecommerce Dashboard'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
{{-- @if(Auth()->check()) --}}
{{-- @if(Auth()->user()->rol == 1 || Auth()->user()->rol == 2 || Auth()->user()->rol == 3) --}}
@section('css')
@endsection

@section('js_vendor')
    <script src="/js/vendor/Chart.bundle.min.js"></script>
    <script src="/js/vendor/chartjs-plugin-rounded-bar.min.js"></script>
    <script src="/js/vendor/jquery.barrating.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/charts.extend.js"></script>
    <script src="/js/pages/dashboard.js"></script>
   
@endsection

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->


        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                    <a class="muted-link pb-2 d-inline-block hidden" href="#">
                        <span class="align-middle lh-1 text-small">&nbsp;</span>
                    </a>
                    {{-- <h1 class="mb-0 pb-0 display-4" id="title">Welcome, Zayn!</h1> --}}
                   
                
                    <!-- <h2>Cupones</h2>

                    <form action="{{ route('canjear.cupon') }}" method="POST" >
                        @csrf
                            <input type="text" name="cupon" id="cupon" class="form-control" placeholder="Canjear Cupon">
                            <button type="submit" class="" id="btn_cupon">Canjear</button>
                        </form> -->
                </div>
                <!-- Title End -->
            </div>
        </div>
       
        <!-- Title and Top Buttons End -->

        <!-- Stats Start -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex">
                    <!-- <div class="dropdown-as-select me-3" data-setActive="false" data-childSelector="span">
                        <a class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                            <span class="small-title"></span>
                        </a>
                        <div class="dropdown-menu font-standard">
                            <div class="nav flex-column" role="tablist">
                                <a class="active dropdown-item text-medium" href="#" aria-selected="true" role="tab">Today's</a>
                                <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Weekly</a>
                                <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Monthly</a>
                                <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Yearly</a>
                            </div>
                        </div>
                    </div> -->
                    <!-- <h2 class="small-title">Stats</h2> -->
                </div>
                <div class="mb-5">
                    <div class="row g-2">
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="card h-100 hover-scale-up cursor-pointer">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                        <i data-acorn-icon="dollar" class="text-primary"></i>
                                    </div>
                                    <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">EARNINGS</div>
                                    <div class="text-primary cta-4">$ 315.20</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="card h-100 hover-scale-up cursor-pointer">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                        <i data-acorn-icon="cart" class="text-primary"></i>
                                    </div>
                                    <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">ORDERS</div>
                                    <div class="text-primary cta-4">16</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="card h-100 hover-scale-up cursor-pointer">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                        <i data-acorn-icon="server" class="text-primary"></i>
                                    </div>
                                    <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">SESSIONS</div>
                                    <div class="text-primary cta-4">463</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="card h-100 hover-scale-up cursor-pointer">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                        <i data-acorn-icon="user" class="text-primary"></i>
                                    </div>
                                    <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">USERS</div>
                                    <div class="text-primary cta-4">{{$count}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="card h-100 hover-scale-up cursor-pointer">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                        <i data-acorn-icon="arrow-top-left" class="text-primary"></i>
                                    </div>
                                    <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">RETURNS</div>
                                    <div class="text-primary cta-4">2</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="card h-100 hover-scale-up cursor-pointer">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                        <i data-acorn-icon="message" class="text-primary"></i>
                                    </div>
                                    <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">COMMENTS</div>
                                    <div class="text-primary cta-4">5</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Stats End -->

        <div class="row">
            <!-- Recent Orders Start -->
            <!-- <div class="col-xl-6 mb-5">
                <h2 class="small-title">Recent Orders</h2>
                <div class="mb-n2 scroll-out">
                    <div class="scroll-by-count" data-count="6">
                        <div class="card mb-2 sh-15 sh-md-6">
                            <div class="card-body pt-0 pb-0 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                    <div class="col-10 col-md-4 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                        <a href="/Orders/Detail" class="body-link stretched-link">Order #54129</a>
                                    </div>
                                    <div class="col-2 col-md-3 d-flex align-items-center text-muted mb-1 mb-md-0 justify-content-end justify-content-md-start">
                                        <span class="badge bg-outline-primary me-1">PENDING</span>
                                    </div>
                                    <div class="col-12 col-md-2 d-flex align-items-center mb-1 mb-md-0 text-alternate">
                  <span>
                    <span class="text-small">$</span>
                    17.35
                  </span>
                                    </div>
                                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end mb-1 mb-md-0 text-alternate">Today - 13:20</div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2 sh-15 sh-md-6">
                            <div class="card-body pt-0 pb-0 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                    <div class="col-10 col-md-4 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                        <a href="/Orders/Detail" class="body-link stretched-link">Order #54128</a>
                                    </div>
                                    <div class="col-2 col-md-3 d-flex align-items-center text-muted mb-1 mb-md-0 justify-content-end justify-content-md-start">
                                        <span class="badge bg-outline-primary me-1">PENDING</span>
                                    </div>
                                    <div class="col-12 col-md-2 d-flex align-items-center mb-1 mb-md-0 text-alternate">
                  <span>
                    <span class="text-small">$</span>
                    145.20
                  </span>
                                    </div>
                                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end mb-1 mb-md-0 text-alternate">Today - 11:32</div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2 sh-15 sh-md-6">
                            <div class="card-body pt-0 pb-0 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                    <div class="col-10 col-md-4 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                        <a href="/Orders/Detail" class="body-link stretched-link">Order #54127</a>
                                    </div>
                                    <div class="col-2 col-md-3 d-flex align-items-center text-muted mb-1 mb-md-0 justify-content-end justify-content-md-start">
                                        <span class="badge bg-outline-primary me-1">PENDING</span>
                                    </div>
                                    <div class="col-12 col-md-2 d-flex align-items-center mb-1 mb-md-0 text-alternate">
                  <span>
                    <span class="text-small">$</span>
                    110.85
                  </span>
                                    </div>
                                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end mb-1 mb-md-0 text-alternate">Today - 11:20</div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2 sh-15 sh-md-6">
                            <div class="card-body pt-0 pb-0 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                    <div class="col-10 col-md-4 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                        <a href="/Orders/Detail" class="body-link stretched-link">Order #54126</a>
                                    </div>
                                    <div class="col-2 col-md-3 d-flex align-items-center text-muted mb-1 mb-md-0 justify-content-end justify-content-md-start">
                                        <span class="badge bg-outline-primary me-1">PENDING</span>
                                    </div>
                                    <div class="col-12 col-md-2 d-flex align-items-center mb-1 mb-md-0 text-alternate">
                  <span>
                    <span class="text-small">$</span>
                    58.00
                  </span>
                                    </div>
                                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end mb-1 mb-md-0 text-alternate">Today - 10:20</div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2 sh-15 sh-md-6">
                            <div class="card-body pt-0 pb-0 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                    <div class="col-10 col-md-4 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                        <a href="/Orders/Detail" class="body-link stretched-link">Order #54125</a>
                                    </div>
                                    <div class="col-2 col-md-3 d-flex align-items-center text-muted mb-1 mb-md-0 justify-content-end justify-content-md-start">
                                        <span class="badge bg-outline-secondary me-1">SHIPPED</span>
                                    </div>
                                    <div class="col-12 col-md-2 d-flex align-items-center mb-1 mb-md-0 text-alternate">
                  <span>
                    <span class="text-small">$</span>
                    22.05
                  </span>
                                    </div>
                                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end mb-1 mb-md-0 text-alternate">Today - 07:30</div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-2 sh-15 sh-md-6">
                            <div class="card-body pt-0 pb-0 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                    <div class="col-10 col-md-4 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                        <a href="/Orders/Detail" class="body-link stretched-link">Order #54124</a>
                                    </div>
                                    <div class="col-2 col-md-3 d-flex align-items-center text-muted mb-1 mb-md-0 justify-content-end justify-content-md-start">
                                        <span class="badge bg-outline-secondary me-1">SHIPPED</span>
                                    </div>
                                    <div class="col-12 col-md-2 d-flex align-items-center mb-1 mb-md-0 text-alternate">
                  <span>
                    <span class="text-small">$</span>
                    14.25
                  </span>
                                    </div>
                                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end mb-1 mb-md-0 text-alternate">Monday - 17:30</div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-2 sh-15 sh-md-6">
                            <div class="card-body pt-0 pb-0 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                    <div class="col-10 col-md-4 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                        <a href="/Orders/Detail" class="body-link stretched-link">Order #54123</a>
                                    </div>
                                    <div class="col-2 col-md-3 d-flex align-items-center text-muted mb-1 mb-md-0 justify-content-end justify-content-md-start">
                                        <span class="badge bg-outline-quaternary me-1">DELIVERED</span>
                                    </div>
                                    <div class="col-12 col-md-2 d-flex align-items-center mb-1 mb-md-0 text-alternate">
                  <span>
                    <span class="text-small">$</span>
                    42.00
                  </span>
                                    </div>
                                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end mb-1 mb-md-0 text-alternate">Monday - 11:25</div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-2 sh-15 sh-md-6">
                            <div class="card-body pt-0 pb-0 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                    <div class="col-10 col-md-4 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                        <a href="/Orders/Detail" class="body-link stretched-link">Order #54122</a>
                                    </div>
                                    <div class="col-2 col-md-3 d-flex align-items-center text-muted mb-1 mb-md-0 justify-content-end justify-content-md-start">
                                        <span class="badge bg-outline-quaternary me-1">DELIVERED</span>
                                    </div>
                                    <div class="col-12 col-md-2 d-flex align-items-center mb-1 mb-md-0 text-alternate">
                  <span>
                    <span class="text-small">$</span>
                    63.25
                  </span>
                                    </div>
                                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end mb-1 mb-md-0 text-alternate">Monday - 15:20</div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-2 sh-15 sh-md-6">
                            <div class="card-body pt-0 pb-0 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                    <div class="col-10 col-md-4 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                        <a href="/Orders/Detail" class="body-link stretched-link">Order #54121</a>
                                    </div>
                                    <div class="col-2 col-md-3 d-flex align-items-center text-muted mb-1 mb-md-0 justify-content-end justify-content-md-start">
                                        <span class="badge bg-outline-quaternary me-1">DELIVERED</span>
                                    </div>
                                    <div class="col-12 col-md-2 d-flex align-items-center mb-1 mb-md-0 text-alternate">
                  <span>
                    <span class="text-small">$</span>
                    74.00
                  </span>
                                    </div>
                                    <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end mb-1 mb-md-0 text-alternate">Monday - 13:10</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Recent Orders End -->

            <!-- Performance Start -->
            <!-- <div class="col-xl-6 mb-5">
                <div class="d-flex">
                    <div class="dropdown-as-select me-3" data-setActive="false" data-childSelector="span">
                        <a class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                            <span class="small-title"></span>
                        </a>
                        <div class="dropdown-menu font-standard">
                            <div class="nav flex-column" role="tablist">
                                <a class="active dropdown-item text-medium" href="#" aria-selected="true" role="tab">Today's</a>
                                <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Weekly</a>
                                <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Monthly</a>
                                <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Yearly</a>
                            </div>
                        </div>
                    </div>
                    <h2 class="small-title">Performance</h2>
                </div>
                <div class="card sh-45 h-xl-100-card">
                    <div class="card-body h-100">
                        <div class="h-100">
                            <canvas id="horizontalTooltipChart"></canvas>
                            <div
                                    class="custom-tooltip position-absolute bg-foreground rounded-md border border-separator pe-none p-3 d-flex z-index-1 align-items-center opacity-0 basic-transform-transition"
                            >
                                <div
                                        class="icon-container border d-flex align-middle align-items-center justify-content-center align-self-center rounded-xl sh-5 sw-5 rounded-xl me-3"
                                >
                                    <span class="icon"></span>
                                </div>
                                <div>
                                    <span class="text d-flex align-middle text-alternate align-items-center text-small">Bread</span>
                                    <span class="value d-flex align-middle text-body align-items-center cta-4">300</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Performance End -->
        </div>

        <div class="row gx-4 gy-5">
            <!-- Top Selling Items Start -->
            <!-- <div class="col-xl-6 mb-5">
                <h2 class="small-title">Top Selling Items</h2>
                <div class="scroll-out mb-n2">
                    <div class="scroll-by-count" data-count="4">
                        <div class="card mb-2">
                            <div class="row g-0 sh-14 sh-md-10">
                                <div class="col-auto">
                                    <a href="/Products/Detail">
                                        <img src="/img/product/small/product-3.webp" alt="alternate text" class="card-img card-img-horizontal sw-11" />
                                    </a>
                                </div>
                                <div class="col">
                                    <div class="card-body pt-0 pb-0 h-100">
                                        <div class="row g-0 h-100 align-content-center">
                                            <div class="col-12 col-md-9 d-flex align-items-center mb-2 mb-md-0">
                                                <a href="/Products/Detail">Good Glass Teapot</a>
                                            </div>
                                            <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end text-muted text-medium">4.024 Sales</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="row g-0 sh-14 sh-md-10">
                                <div class="col-auto">
                                    <a href="/Products/Detail">
                                        <img src="/img/product/small/product-2.webp" alt="alternate text" class="card-img card-img-horizontal sw-11" />
                                    </a>
                                </div>
                                <div class="col">
                                    <div class="card-body pt-0 pb-0 h-100">
                                        <div class="row g-0 h-100 align-content-center">
                                            <div class="col-12 col-md-9 d-flex align-items-center mb-2 mb-md-0">
                                                <a href="/Products/Detail">Aromatic Green Candle</a>
                                            </div>
                                            <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end text-muted text-medium">2.701 Sales</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="row g-0 sh-14 sh-md-10">
                                <div class="col-auto">
                                    <a href="/Products/Detail">
                                        <img src="/img/product/small/product-7.webp" alt="alternate text" class="card-img card-img-horizontal sw-11" />
                                    </a>
                                </div>
                                <div class="col">
                                    <div class="card-body pt-0 pb-0 h-100">
                                        <div class="row g-0 h-100 align-content-center">
                                            <div class="col-12 col-md-9 d-flex align-items-center mb-2 mb-md-0">
                                                <a href="/Products/Detail">White Coffee Mug</a>
                                            </div>
                                            <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end text-muted text-medium">1.972 Sales</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="row g-0 sh-14 sh-md-10">
                                <div class="col-auto">
                                    <a href="/Products/Detail">
                                        <img src="/img/product/small/product-6.webp" alt="alternate text" class="card-img card-img-horizontal sw-11" />
                                    </a>
                                </div>
                                <div class="col">
                                    <div class="card-body pt-0 pb-0 h-100">
                                        <div class="row g-0 h-100 align-content-center">
                                            <div class="col-12 col-md-9 d-flex align-items-center mb-2 mb-md-0">
                                                <a href="/Products/Detail">Wireless On-Ear Headphones</a>
                                            </div>
                                            <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end text-muted text-medium">1.543 Sales</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="row g-0 sh-14 sh-md-10">
                                <div class="col-auto">
                                    <a href="/Products/Detail">
                                        <img src="/img/product/small/product-8.webp" alt="alternate text" class="card-img card-img-horizontal sw-11" />
                                    </a>
                                </div>
                                <div class="col">
                                    <div class="card-body pt-0 pb-0 h-100">
                                        <div class="row g-0 h-100 align-content-center">
                                            <div class="col-12 col-md-9 d-flex align-items-center mb-2 mb-md-0">
                                                <a href="/Products/Detail">Geometric Chandelier</a>
                                            </div>
                                            <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end text-muted text-medium">1.352 Sales</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Top Selling Items End -->

            <!-- Top Search Terms Start -->
            <!-- <div class="col-xl-6 mb-5">
                <h2 class="small-title">Top Search Terms</h2>
                <div class="card sh-35 h-xl-100-card">
                    <div class="card-body scroll-out h-100">
                        <div class="scroll h-100">
                            <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                <div class="d-flex flex-column">
                                    <div>Whole wheat bread</div>
                                </div>
                                <div class="d-flex">
                                    <span class="badge bg-outline-secondary">847</span>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                <div class="d-flex flex-column">
                                    <div>White bread</div>
                                </div>
                                <div class="d-flex">
                                    <span class="badge bg-outline-secondary">753</span>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                <div class="d-flex flex-column">
                                    <div>Sourdough bread</div>
                                </div>
                                <div class="d-flex">
                                    <span class="badge bg-outline-secondary">721</span>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                <div class="d-flex flex-column">
                                    <div>Melonpan bread</div>
                                </div>
                                <div class="d-flex">
                                    <span class="badge bg-outline-secondary">693</span>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                <div class="d-flex flex-column">
                                    <div>Gluten free bread</div>
                                </div>
                                <div class="d-flex">
                                    <span class="badge bg-outline-secondary">431</span>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                <div class="d-flex flex-column">
                                    <div>sliced whole wheat bread</div>
                                </div>
                                <div class="d-flex">
                                    <span class="badge bg-outline-secondary">381</span>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                <div class="d-flex flex-column">
                                    <div>Packaged Zopf bread</div>
                                </div>
                                <div class="d-flex">
                                    <span class="badge bg-outline-secondary">310</span>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                <div class="d-flex flex-column">
                                    <div>Barm cake</div>
                                </div>
                                <div class="d-flex">
                                    <span class="badge bg-outline-secondary">301</span>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                <div class="d-flex flex-column">
                                    <div>Pita bread</div>
                                </div>
                                <div class="d-flex">
                                    <span class="badge bg-outline-secondary">288</span>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                <div class="d-flex flex-column">
                                    <div>Taftan cake</div>
                                </div>
                                <div class="d-flex">
                                    <span class="badge bg-outline-secondary">219</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Top Search Terms End -->
        </div>

        <div class="row">
            <div class="col-12 col-xxl">
                <div class="row">
                    <!-- Activity Start -->
                    <!-- <div class="col-xxl-6 mb-5">
                        <h2 class="small-title">Activity</h2>
                        <div class="card sh-35">
                            <div class="card-body scroll-out h-100">
                                <div class="scroll h-100">
                                    <div class="row g-0 mb-2">
                                        <div class="col-auto">
                                            <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                    <i data-acorn-icon="circle" class="text-primary align-top"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">New user registiration</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                                <div class="text-muted ms-2 mt-n1 lh-1-25">18 Dec</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2">
                                        <div class="col-auto">
                                            <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                    <i data-acorn-icon="circle" class="text-primary align-top"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">3 new product added</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                                <div class="text-muted ms-2 mt-n1 lh-1-25">18 Dec</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2">
                                        <div class="col-auto">
                                            <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                    <i data-acorn-icon="square" class="text-secondary align-top"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">
                                                        Product out of stock:
                                                        <a href="#" class="alternate-link underline-link">Breadstick</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                                <div class="text-muted ms-2 mt-n1 lh-1-25">16 Dec</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2">
                                        <div class="col-auto">
                                            <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                    <i data-acorn-icon="square" class="text-secondary align-top"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">Category page returned an error</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                                <div class="text-muted ms-2 mt-n1 lh-1-25">15 Dec</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2">
                                        <div class="col-auto">
                                            <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                    <i data-acorn-icon="circle" class="text-primary align-top"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">14 products added</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                                <div class="text-muted ms-2 mt-n1 lh-1-25">15 Dec</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2">
                                        <div class="col-auto">
                                            <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                    <i data-acorn-icon="hexagon" class="text-tertiary align-top"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">
                                                        New sale:
                                                        <a href="#" class="alternate-link underline-link">Steirer Brot</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                                <div class="text-muted ms-2 mt-n1 lh-1-25">15 Dec</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2">
                                        <div class="col-auto">
                                            <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                    <i data-acorn-icon="hexagon" class="text-tertiary align-top"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">
                                                        New sale:
                                                        <a href="#" class="alternate-link underline-link">Soda Bread</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                                <div class="text-muted ms-2 mt-n1 lh-1-25">15 Dec</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2">
                                        <div class="col-auto">
                                            <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                    <i data-acorn-icon="triangle" class="text-warning align-top"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">Recived a support ticket</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                                <div class="text-muted ms-2 mt-n1 lh-1-25">14 Dec</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2">
                                        <div class="col-auto">
                                            <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                    <i data-acorn-icon="hexagon" class="text-tertiary align-top"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">
                                                        New sale:
                                                        <a href="#" class="alternate-link underline-link">Cholermüs</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                                <div class="text-muted ms-2 mt-n1 lh-1-25">13 Dec</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2">
                                        <div class="col-auto">
                                            <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                    <i data-acorn-icon="hexagon" class="text-tertiary align-top"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">
                                                        New sale:
                                                        <a href="#" class="alternate-link underline-link">Bazlama</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                                <div class="text-muted ms-2 mt-n1 lh-1-25">13 Dec</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2">
                                        <div class="col-auto">
                                            <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                    <i data-acorn-icon="triangle" class="text-warning align-top"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">Recived a comment</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                                <div class="text-muted ms-2 mt-n1 lh-1-25">13 Dec</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2">
                                        <div class="col-auto">
                                            <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                    <i data-acorn-icon="triangle" class="text-warning align-top"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">Recived an email</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                                <div class="text-muted ms-2 mt-n1 lh-1-25">13 Dec</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2">
                                        <div class="col-auto">
                                            <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                    <i data-acorn-icon="hexagon" class="text-tertiary align-top"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">
                                                        New sale:
                                                        <a href="#" class="alternate-link underline-link">Bazlama</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                                <div class="text-muted ms-2 mt-n1 lh-1-25">12 Dec</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-2">
                                        <div class="col-auto">
                                            <div class="sw-3 d-inline-block d-flex justify-content-start align-items-center h-100">
                                                <div class="sh-3">
                                                    <i data-acorn-icon="triangle" class="text-warning align-top"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="text-alternate mt-n1 lh-1-25">Recived a comment</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="d-inline-block d-flex justify-content-end align-items-center h-100">
                                                <div class="text-muted ms-2 mt-n1 lh-1-25">12 Dec</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Activity End -->

                    <!-- Recent Reviews Start -->
                    <!-- <div class="col-xxl-6 mb-5">
                        <h2 class="small-title">Recent Reviews</h2>
                        <div class="card sh-35">
                            <div class="card-body mb-n2 scroll-out h-100">
                                <div class="scroll h-100">
                                    <div class="row g-0 sh-10 mb-3">
                                        <div class="col-auto">
                                            <a href="/Products/Detail">
                                                <img src="/img/product/small/product-2.webp" class="card-img rounded-md h-100 sw-8" alt="thumb" />
                                            </a>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="mb-1">
                                                        <a href="/Customers/Detail" class="body-link">Kathleen Bertha</a>
                                                    </div>
                                                    <div class="text-small text-muted text-truncate mb-1">
                                                        Chocolate bar marzipan marzipan carrot cake gingerbread pastry ice cream. Ice cream danish sugar plum biscuit pudding powder
                                                        soufflé donut macaroon.
                                                    </div>
                                                    <div class="br-wrapper br-theme-cs-icon">
                                                        <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 sh-10 mb-3">
                                        <div class="col-auto">
                                            <a href="/Products/Detail">
                                                <img src="/img/product/small/product-3.webp" class="card-img rounded-md h-100 sw-8" alt="thumb" />
                                            </a>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="mb-1">
                                                        <a href="/Customers/Detail" class="body-link">Kathleen Bertha</a>
                                                    </div>
                                                    <div class="text-small text-muted text-truncate mb-1">Bear claw sweet liquorice jujubes. Muffin gingerbread bear claw.</div>
                                                    <div class="br-wrapper br-theme-cs-icon">
                                                        <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 sh-10 mb-3">
                                        <div class="col-auto">
                                            <a href="/Products/Detail">
                                                <img src="/img/product/small/product-1.webp" class="card-img rounded-md h-100 sw-8" alt="thumb" />
                                            </a>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="mb-1">
                                                        <a href="/Customers/Detail" class="body-link">Olli Hawkins</a>
                                                    </div>
                                                    <div class="text-small text-muted text-truncate mb-1">Bear claw sweet liquorice jujubes. Muffin gingerbread bear claw.</div>
                                                    <div class="br-wrapper br-theme-cs-icon">
                                                        <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 sh-10">
                                        <div class="col-auto">
                                            <a href="/Products/Detail">
                                                <img src="/img/product/small/product-10.webp" class="card-img rounded-md h-100 sw-8" alt="thumb" />
                                            </a>
                                        </div>
                                        <div class="col">
                                            <div class="card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center">
                                                <div class="d-flex flex-column">
                                                    <div class="mb-1">
                                                        <a href="/Customers/Detail" class="body-link">Zayn Hammond</a>
                                                    </div>
                                                    <div class="text-small text-muted text-truncate mb-1">Chupa chups candy canes.</div>
                                                    <div class="br-wrapper br-theme-cs-icon">
                                                        <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Recent Reviews End -->
                </div>
            </div>

            <!-- Tips Start -->
            <!-- <div class="col-12 col-xxl-auto mb-5">
                <h2 class="small-title">Tips</h2>
                <div class="card h-100-card sw-xxl-40">
                    <div class="card-body row g-0">
                        <div class="col-12 d-flex flex-column justify-content-between align-items-start">
                            <div>
                                <div class="cta-3">More sales?</div>
                                <div class="mb-3 cta-3 text-primary">Add new products!</div>
                                <div class="text-muted mb-4">
                                    Cheesecake chocolate carrot cake pie lollipop apple pie lemon cream lollipop.
                                    <br />
                                    Oat cake lemon drops gummi pie cake cotton.
                                </div>
                            </div>
                            <a href="/Products/List" class="btn btn-icon btn-icon-start btn-outline-primary stretched-link">
                                <i data-acorn-icon="plus"></i>
                                <span>Add Products</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Tips End -->
        </div>

    </div>
@endsection


{{-- @endif --}}
{{-- @else --}}


{{-- <section class="bg-fondo">

    <div class="particulas" id="particles-js">
        <script src=" {{ asset('/js/particles.min.js') }}"></script>
        <script src=" {{ asset('/js/particles.js') }}"></script>
    </div>

    <div class="contenedor_login">

      <h2>Ingresar</h2>
      <div class="cardLogin">
        <form action="{{route('user.login')}}">
            <h3>Correo: </h3>
            <input class="form-control" type="text" name="email">
            <br>
            <h3>Contraseña: </h4>
            <input class="form-control" type="password" name="password">
            <br>
            <input class="btn-submit" type="submit">
        </form>
    </div>
    </div>

</section> --}}

<style>
    html{
        overflow-x: hidden;
        overflow-y: hidden;
    }
    #particles-js{
        position: absolute;
        top: 0;
        left: 0;
        width: 100vw;
    }

    .particulas {
    background: url("#") no-repeat #000;
    background-size: cover;
    height: 100vh;
    }

    .btn-submit{
        width: 100%;
        height: 40px;
        border: none;
        border-radius: 5%;
        background: rgb(57, 57, 57);
        transition-duration: 0.3s;
        color: white;
    }
    .btn-submit:hover{
        background: rgb(91, 91, 91);
        transition-duration: 0.3s
    }
    /* .bg-fondo{
        height: 100vh;
        display: grid;
        place-content: center;        
    } */
    .contenedor_login{
        width: 100vw;
        display: grid;
        place-content: center;
        align-content: center;
        background: none;
        /* position: absolute; */
    }
    footer{
        display: none;
    }
    .cardLogin{
        width: 280px;
        height: 400px;
        background: #1e1e1e58;
        display: grid;
        place-content: center;
        position: relative;
        border-radius: 5%;
        overflow: hidden;
    }
    .cardLogin::before{
        content:"";
        height: 2000px;
        width: 20px;
        background: rgba(255, 255, 255, 0.307);
        left: 100px;
        position: absolute;
        top: 0px;
        animation: girar 10s linear infinite;
    }
    .cardLogin::after{
        content:"";
        inset: 5px;
        position: absolute;
        background: #1e1e1e58;
        border-radius: 5%;
    }
    form{
        z-index: 1;
    }
    @keyframes girar{
        0%{
            transform: rotate(0deg);
        }
        100%{
            transform: rotate(360deg);
        }
    }

</style>

{{-- @endif --}}






