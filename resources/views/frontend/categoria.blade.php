
@php
$html_tag_data = [];
$title = 'Categoria';
$description = 'Categorias';
@endphp
@extends('frontend.layoust.app')

@section('css')
@endsection

@section('js_vendor')
    <script src="/js/vendor/input-spinner.min.js"></script>
@endsection

@section('js_page')
@endsection

@section('content')
<div class="container">
    <h2 class="d-flex justify-content-center mb-4">Categorias</h2>
    <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-3 mb-5">
        @foreach ($categorias as $categoria)
            
        <div class="col">
            <div class="card bg-primary hover-border-primary">
                <div class="row g-0 sh-16 sh-sm-17">
                    <div class="col-auto h-100 position-relative">
                        <img src="../storage/{{$categoria->image}}" alt="alternate text" class="card-img card-img-horizontal h-100 sw-11 sw-sm-16 sw-lg-22" />

                    </div>
                    <div class="col p-0">
                        <div class="card-body d-flex align-items-center h-100 py-3">
                            <div class="mb-0 h6">
                                <a href="{{route('categorias.show',[$categoria->id])}}" class="body-link stretched-link">
                                    <div class="clamp-line sh-3 lh-1-5 text-white" data-line="1">{{$categoria->name}}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        {{-- <div class="col">
            <div class="card bg-primary hover-border-primary">
                <div class="row g-0 sh-16 sh-sm-17">
                    <div class="col-auto h-100">
                        <img src="{{ asset('img/profile/profile-6.webp') }}" alt="alternate text" class="card-img card-img-horizontal h-100 sw-11 sw-sm-16 sw-lg-22" />
                    </div>
                    <div class="col p-0">
                        <div class="card-body d-flex align-items-center h-100 py-3">
                            <div class="mb-0 h6">
                                <a href="{{route('categorias.show')}}" class="body-link stretched-link">
                                    <div class="clamp-line sh-3 lh-1-5 text-white" data-line="1">woman</div>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-primary hover-border-primary">
                <div class="row g-0 sh-16 sh-sm-17">
                    <div class="col-auto h-100">
                        <img src="{{ asset('img/profile/cuando-el-nino-de-3-anos-no-habla-md.jpg') }}" alt="alternate text" class="card-img card-img-horizontal h-100 sw-11 sw-sm-16 sw-lg-22" />
                    </div>
                    <div class="col p-0">
                        <div class="card-body d-flex align-items-center h-100 py-3">
                            <div class="mb-0 h6">
                                <a href="{{route('categorias.show')}}" class="body-link stretched-link">
                                    <div class="clamp-line sh-3 lh-1-5 text-white" data-line="1">kids</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-primary hover-border-primary">
                <div class="row g-0 sh-16 sh-sm-17">
                    <div class="col-auto h-100">
                        <img src="/img/product/small/product-4.webp" alt="alternate text" class="card-img card-img-horizontal h-100 sw-11 sw-sm-16 sw-lg-22" />
                    </div>
                    <div class="col p-0">
                        <div class="card-body d-flex align-items-center h-100 py-3">
                            <div class="mb-0 h6">
                                <a href="{{route('categorias.show')}}" class="body-link stretched-link">
                                    <div class="clamp-line sh-3 lh-1-5 text-white" data-line="1">Modern Dark Pot</div>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-primary hover-border-primary">
                <div class="row g-0 sh-16 sh-sm-17">
                    <div class="col-auto h-100 position-relative">
                        <img src="/img/product/small/product-5.webp" alt="alternate text" class="card-img card-img-horizontal h-100 sw-11 sw-sm-16 sw-lg-22" />
                    </div>
                    <div class="col p-0">
                        <div class="card-body d-flex align-items-center h-100 py-3">
                            <div class="mb-0 h6">
                                <a href="{{route('categorias.show')}}" class="body-link stretched-link">
                                    <div class="clamp-line sh-3 lh-1-5 text-white" data-line="1">Wood Handle Hunter Knife</div>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-primary hover-border-primary">
                <div class="row g-0 sh-16 sh-sm-17">
                    <div class="col-auto h-100 position-relative">
                        <img src="/img/product/small/product-6.webp" alt="alternate text" class="card-img card-img-horizontal h-100 sw-11 sw-sm-16 sw-lg-22" />
                    </div>
                    <div class="col p-0">
                        <div class="card-body d-flex align-items-center h-100 py-3">
                            <div class="mb-0 h6">
                                <a href="{{route('categorias.show')}}" class="body-link stretched-link">
                                    <div class="clamp-line sh-3 lh-1-5 text-white" data-line="1">Wireless On-Ear Headphones</div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-primary hover-border-primary">
                <div class="row g-0 sh-16 sh-sm-17">
                    <div class="col-auto h-100 position-relative">
                        <img src="{{ asset('img/utilidad/compra.png') }}" alt="alternate text" class="card-img card-img-horizontal h-100 sw-11 sw-sm-16 sw-lg-22" />
                    </div>
                    <div class="col p-0">
                        <div class="card-body d-flex align-items-center h-100 py-3">
                            <div class="mb-0 h6">
                                <a href="{{route('categorias.show')}}" class="body-link stretched-link">
                                    <div class="clamp-line sh-3 lh-1-5 text-white" data-line="1">Wooden Animal Toys</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-primary hover-border-primary">
                <div class="row g-0 sh-16 sh-sm-17">
                    <div class="col-auto h-100">
                        <img src="/img/product/small/product-2.webp" alt="alternate text" class="card-img card-img-horizontal h-100 sw-11 sw-sm-16 sw-lg-22" />
                    </div>
                    <div class="col p-0">
                        <div class="card-body d-flex align-items-center h-100 py-3">
                            <div class="mb-0 h6">
                                <a href="{{route('categorias.show')}}" class="body-link stretched-link">
                                    <div class="clamp-line sh-3 lh-1-5 text-white" data-line="1">Aromatic Green Candle</div>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-primary hover-border-primary">
                <div class="row g-0 sh-16 sh-sm-17">
                    <div class="col-auto h-100">
                        <img src="/img/product/small/product-3.webp" alt="alternate text" class="card-img card-img-horizontal h-100 sw-11 sw-sm-16 sw-lg-22" />
                    </div>
                    <div class="col p-0">
                        <div class="card-body d-flex align-items-center h-100 py-3">
                            <div class="mb-0 h6">
                                <a href="{{route('categorias.show')}}" class="body-link stretched-link">
                                    <div class="clamp-line sh-3 lh-1-5 text-white" data-line="1">Good Glass Teapot</div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-primary hover-border-primary">
                <div class="row g-0 sh-16 sh-sm-17">
                    <div class="col-auto h-100">
                        <img src="/img/product/small/product-4.webp" alt="alternate text" class="card-img card-img-horizontal h-100 sw-11 sw-sm-16 sw-lg-22" />
                    </div>
                    <div class="col p-0">
                        <div class="card-body d-flex align-items-center h-100 py-3">
                            <div class="mb-0 h6">
                                <a href="{{route('categorias.show')}}" class="body-link stretched-link">
                                    <div class="clamp-line sh-3 lh-1-5 text-white" data-line="1">Modern Dark Pot</div>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-primary hover-border-primary">
                <div class="row g-0 sh-16 sh-sm-17">
                    <div class="col-auto h-100 position-relative">
                        <img src="/img/product/small/product-5.webp" alt="alternate text" class="card-img card-img-horizontal h-100 sw-11 sw-sm-16 sw-lg-22" />
                    </div>
                    <div class="col p-0">
                        <div class="card-body d-flex align-items-center h-100 py-3">
                            <div class="mb-0 h6">
                                <a href="{{route('categorias.show')}}" class="body-link stretched-link">
                                    <div class="clamp-line sh-3 lh-1-5 text-white" data-line="1">Wood Handle Hunter Knife</div>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-primary hover-border-primary">
                <div class="row g-0 sh-16 sh-sm-17">
                    <div class="col-auto h-100 position-relative">
                        <img src="/img/product/small/product-6.webp" alt="alternate text" class="card-img card-img-horizontal h-100 sw-11 sw-sm-16 sw-lg-22" />
                    </div>
                    <div class="col p-0">
                        <div class="card-body d-flex align-items-center h-100 py-3">
                            <div class="mb-0 h6">
                                <a href="{{route('categorias.show')}}" class="body-link stretched-link">
                                    <div class="clamp-line sh-3 lh-1-5 text-white" data-line="1">Wireless On-Ear Headphones</div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>

@endsection




