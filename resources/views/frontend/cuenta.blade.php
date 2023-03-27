@extends('frontend.layoust.app')
@section('css')
@endsection

@section('js_vendor')
    <script src="/js/vendor/jquery.barrating.min.js"></script>
    <script src="/js/vendor/movecontent.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/storefront.home.js"></script>
@endsection

@section('content')
    <div class="container">
        <!-- Title Start -->
        <div class="row">
            <div class="col-auto mb-3 mb-md-0 me-auto">
                <div class="w-auto sw-md-30">
                    <a href="#" class="muted-link pb-1 d-inline-block breadcrumb-back">
                        <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                        <span class="text-small align-middle">Tienda</span>
                    </a>
                    <h1 class="mb-0 pb-0 display-4" id="title">Cuenta</h1>
                </div>
            </div>
            <div class="col-12  mb-5">
                <div class="row g-2 mb-2">
                    <div class="col-12 col-sm-12 col-md-12">
                        <div class="card sh-30 sh-sm-30 hover-img-scale-up">
                            <img src="{{ asset('img/utilidad/tienda1.jpg') }}" class="card-img h-100 scale"
                                alt="card image" />
                            <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                                <div>
                                    <h3 class=" m-auto text-black display-1  text-center mt-5">Cuenta</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="row">

            <div class="col-lg-4 col-md-12">
                <ul class="list-group">
                    <li class="list-group-item ">Dasbohar</li>
                    <li class="list-group-item">Ordenes</li>
                    <li class="list-group-item">Descarga</li>
                    <li class="list-group-item">Direcciones</li>
                    <li class="list-group-item">Detalles de Cuenta</li>
                    <li class="list-group-item">Salir</li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-12 ">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, error optio, at a dicta adipisci
                    doloribus odio explicabo saepe mollitia voluptate consequatur rem? Aspernatur ratione, repellendus eos
                    tempore maiores quibusdam.</p>
            </div>
        </div>




        <!-- Title End -->
        <!-- Right Side End -->
    </div>
@endsection
