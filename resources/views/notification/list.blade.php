@php
    $html_tag_data = [];
    $title = 'Notificaciones';
    $description= 'Lista de notificaciones push'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
    {{-- <script src="/js/cs/checkall.js"></script> --}}
    {{-- <script src="/js/pages/products.list.js"></script> --}}
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
                            <span class="text-small align-middle">Lista notificaciones</span>
                        </a>
                        <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    </div>
                </div>
                {{-- <div style="width: 100%; height: 10vh;">
                    <a href="{{route('notification.new')}}" type="button" class="btn btn-outline-primary btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto">
                        <i data-acorn-icon="plus"></i>
                        <span>Agregar</span>
                    </a>
                </div>   --}}

                <div class="col-12 col-sm-6 col-md-auto d-flex align-items-end justify-content-end mb-2 mb-sm-0 order-sm-3">
                    <a href="{{route('notification.new')}}" type="button" class="btn btn-outline-primary btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto">
                        <i data-acorn-icon="plus"></i>
                        <span>Agregar</span>
                    </a>
                    <div class="dropdown d-inline-block d-lg-none"></div>
                </div>
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
                                        <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="name">Icon</div>
                                        </div>
                                        <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="name">Titulo</div>
                                        </div>
                                        <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center me-2">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Body</div>
                                        </div>
                                        <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center me-2">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Fecha</div>
                                        </div>
                                        <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Enlace</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Items Container Start -->
                    @foreach ($datos as $dato)
                    <div class="card mb-2">
                        <div class="row g-0 h-100 sh-lg-9 position-relative">

                            <div class="col py-4 py-lg-0">
                                <div class="ps-5 pe-4 h-100">
                                    <div class="row g-0 h-100 align-content-center">
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-2">
                                            <div class="lh-1 text-alternate">

                                                    <img class="img-thumbnail img-fluid" src="{{ asset("storage/app/public/".$dato->icon)}}" class="img-thumbnail" width="300" alt="">

                                                    {{-- <img src="/img/seo/default.png" id="picture1" alt="10" srcset="" width="100" class="img-thumbnail"> --}}
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-2">
                                            <div class="lh-1 text-alternate"> {{$dato->title}}</div>
                                        </div>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5 me-2">
                                            <span class="lh-1 text-alternate">{{$dato->body}}</span>
                                        </div>
                                        <div class="col-12  col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5 me-2">
                                            <span class="lh-1 text-alternate">{{$dato->date}}</span>
                                        </div>
                                        <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                            <span class="lh-1 text-alternate"><a href="#"> {{$dato->link}}</a></span>
                                        </div>


                                        <div class="col-1 d-flex flex-column mb-2 mb-lg-0 align-items-end order-2 order-lg-last justify-content-lg-center">


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
            {{-- <div class="w-100 d-flex justify-content-center">
                <nav>
                {{ $products->links() }}
                </nav>
            </div> --}}
            <!-- Items Pagination End -->
        </div>




        </div>
    </div>





@endsection
