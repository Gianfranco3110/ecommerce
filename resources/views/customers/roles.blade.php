@php
    $html_tag_data = [];
    $title = 'Lista de roles';
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
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-auto mb-3 mb-md-0 me-auto">
                    <div class="w-auto sw-md-30">
                        <a href="/" class="muted-link pb-1 d-inline-block breadcrumb-back">
                            <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                            <span class="text-small align-middle">Home</span>
                        </a>
                        <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    </div>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-3 d-flex align-items-end justify-content-end">
                </div>
                <!-- Top Buttons End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->


        <!-- Customers List Start -->
        <div class="row">
            <div class="col-12 mb-5">
                <div class="card mb-2 bg-transparent no-shadow d-none d-lg-block">
                    <div class="row g-0 sh-3">
                        <div class="col">
                            <div class="card-body pt-0 pb-0 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                    <div class="col-lg-1 d-flex align-items-center mb-2 mb-lg-0 text-muted text-small">ID</div>
                                    <div class="col-lg-2 d-flex align-items-center text-muted text-small">NAME</div>
                                    <div class="col-lg-2 d-flex align-items-center text-muted text-small">ROL</div>
                                    <div class="col-lg-2 d-flex align-items-center text-muted text-small">ACCION</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="checkboxTable">


                 @foreach ($roles as $rol)
                     
                    <div class="card mb-2">
                        <div class="card-body pt-0 pb-0 sh-30 sh-lg-8">
                            <div class="row g-0 h-100 align-content-center">
                                <div class="col-11 col-lg-1 d-flex flex-column justify-content-center mb-2 mb-lg-0 order-1 order-lg-1 h-lg-100 position-relative">
                                    <div class="text-muted text-small d-lg-none">Id</div>
                                    <a href="#" class="text-truncate h-100 d-flex align-items-center">{{$rol->id}}</a>
                                </div>
                                <div class="col-6 col-lg-2 d-flex flex-column justify-content-center mb-2 mb-lg-0 order-3 order-lg-2">
                                    <div class="text-muted text-small d-lg-none">Nombre</div>
                                    <div class="text-alternate">{{$rol->name}}</div>
                                </div>

                                <div class="col-6 col-lg-2 d-flex flex-column justify-content-center mb-2 mb-lg-0 order-4 order-lg-4">
                                    <div class="text-muted text-small d-lg-none">Rol</div>
                                    <div class="text-alternate">{{$rol->rol}}</div>
                                </div>
                           
                                <div class="col-1 col-lg-1 d-flex flex-column justify-content-center align-items-lg-end mb-2 mb-lg-0 order-2 text-end order-lg-last">                                    
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
                                                <a class="dropdown-item" href="{{route('roles.edit',['id'=>$rol->id])}}">
                                                    <span class="align-middle d-inline-block">Editar</span>
                                                </a>                                              
                                                <a class="dropdown-item" href="{{route('roles.delete',['id'=>$rol->id])}}">
                                                    <span class="align-middle d-inline-block">Eliminar</span>
                                                </a>
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
        <!-- Customers List End -->

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
    </div>
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