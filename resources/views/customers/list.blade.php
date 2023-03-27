@php
    $html_tag_data = [];
    $title = 'Lista de usuarios';
    $description= 'Ecommerce Customer List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
    <script src="/js/cs/checkall.js"></script>
    <script src="/js/pages/customers.list.js"></script>
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

        <!-- Controls Start -->
        {{-- <div class="row mb-2">
            <!-- Search Start -->
            <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                    <input class="form-control" placeholder="Search" />
                    <span class="search-magnifier-icon">
          <i data-acorn-icon="search"></i>
        </span>
                    <span class="search-delete-icon d-none">
          <i data-acorn-icon="close"></i>
        </span>
                </div>
            </div>
            <!-- Search End -->
        </div> --}}
        <!-- Controls End -->

        <!-- Customers List Start -->
        <div class="row">
        <div class="ir_derecha">
            @if (auth()->check())
                <a href="{{route('new.user')}}" class="btn btn-1 btn_style" style="width: 10%;">Agregar</a>
            @endif

        </div>
            <div class="col-12 mb-5">
                <div class="card mb-2 bg-transparent no-shadow d-none d-lg-block">
                    <div class="row g-0 sh-3">
                        <div class="col">
                            <div class="card-body pt-0 pb-0 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                    <div class="col-lg-1 d-flex align-items-center mb-2 mb-lg-0 text-muted text-medium">ID</div>
                                    <div class="col-lg-2 d-flex align-items-center text-muted text-medium">Nombres</div>
                                    <div class="col-lg-2 d-flex align-items-center text-muted text-medium">Apellidos</div>
                                    <div class="col-lg-2 d-flex align-items-center text-muted text-medium">Rol</div>
                                    <div class="col-lg-2 d-flex align-items-center text-muted text-medium">Correo</div>
                                    <div class="col-lg-2 d-flex align-items-center text-muted text-medium">Estatus</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="checkboxTable">


                 @foreach ($users as $user)

                    <div class="card mb-2">
                        <div class="card-body pt-0 pb-0 sh-30 sh-lg-8">
                            <div class="row g-0 h-100 align-content-center">
                                <div class="col-11 col-lg-1 d-flex flex-column justify-content-center mb-2 mb-lg-0 order-1 order-lg-1 h-lg-100 position-relative">
                                    <div class="text-muted text-small d-lg-none">Id</div>
                                    <a href="#" class="text-truncate h-100 d-flex align-items-center">{{$user->id}}</a>
                                </div>
                                <div class="col-6 col-lg-2 d-flex flex-column justify-content-center mb-2 mb-lg-0 order-3 order-lg-2">
                                    <div class="text-muted text-small d-lg-none">Nombre</div>
                                    <div class="text-alternate">{{$user->name}}</div>
                                </div>
                                <div class="col-6 col-lg-2 d-flex flex-column justify-content-center mb-2 mb-lg-0 order-5 order-lg-3">
                                    <div class="text-muted text-small d-lg-none">Apellidos</div>
                                    <div class="text-alternate">{{$user->last_name}}</div>
                                </div>
                                <div class="col-6 col-lg-2 d-flex flex-column justify-content-center mb-2 mb-lg-0 order-4 order-lg-4">
                                    <div class="text-muted text-small d-lg-none">Rol</div>
                                    <div class="text-alternate">
                                        {{$user->roles[0]->slug}}
                                    </div>
                                </div>

                                <div class="col-6 col-lg-2 d-flex flex-column justify-content-center mb-2 mb-lg-0 order-5 order-lg-4">
                                    <div class="text-muted text-small d-lg-none">Correo</div>
                                    <div class="text-alternate">
                                        <a href="#" class="text-truncate h-100 d-flex align-items-center">{{$user->email}}</a>
                                    </div>
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
                                                <a class="dropdown-item" href="{{route('user.edit',$user->id)}}">
                                                    <span class="align-middle d-inline-block">Editar</span>
                                                </a>
                                                <a class="dropdown-item" href="{{route('user.delete',['id'=>$user->id])}}">
                                                    <span class="align-middle d-inline-block">Eliminar</span>
                                                </a>
                                            </div>
                                        </div>

                                </div>
                                <div class="col-12 col-lg-2 d-flex flex-column justify-content-center mb-2 mb-lg-0 order-last order-lg-5">
                                    <div class="text-muted text-small d-lg-none">Estatus</div>
                                    <div class="text-alternate">
                                        <a href="#" class="text-truncate h-100 d-flex align-items-center">
                                            @if ($user->status == 1)
                                                <span class="badge bg-outline-primary">Activo</span>
                                            @else
                                                <span class="badge bg-outline-danger">Inactivo</span>
                                            @endif
                                        </a>
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

        {{-- {{ $users->links() }} --}}

        <div class="d-flex justify-content-center">
            <nav>
                {{-- <ul class="pagination">
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
                </ul> --}}
                {{ $users->links() }}
            </nav>
        </div>
        <!-- Pagination End -->
    </div>
@endsection
