@php
    $html_tag_data = [];
    $title = 'Sub categorias';
    $description= 'Sub categorias'
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
                <div style="width: 100%; height: 10vh;"></div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
              
                 <div class="w-100 d-md-none"></div>
            

             <div class="ir_derecha">
                
                @hasanyrole('super admin')
                           <a href="{{route('subcat.create')}}" class="btn btn-1 btn_style" style="width: 10%;">Agregar</a>

               @endhasanyrole
              
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
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="name">Imagen</div>
                                        </div>
                                        <div class="col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="name">Nombre</div>
                                        </div>
                                        <div class="col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Status</div>
                                        </div>

                                          <div class="col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Categoria</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                            {{-- "name" => "ComprasExtra"
                                    "description" => "por compras mayores ha 100 mil pesos"
                                    "monto" => 10.0
                                    "points" => 10
                                    "productos" => "{}"
                                    "active" => 1
                                    --}}

                    <!-- Items Container Start -->
                    @foreach ($categories as $ctgry)
                    {{-- {{dd($ctgry->image)}} --}}
                    <div class="card mb-2">
                        <div class="row g-0 h-100 sh-lg-9 position-relative">
                           
                            <div class="col py-4 py-lg-0">
                                <div class="ps-5 pe-4 h-100">
                                    <div class="row g-0 h-100 align-content-center">
                                          <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-2">
                                              <img class="img-thumbnail img-fluid" src="../storage/{{$ctgry->image}}" class="img-thumbnail" width="100" alt="">
                                                

                                            </div>
                                            <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-2">
                                                <div class="lh-1 text-alternate"> {{$ctgry->name}}</div>
                                            </div>
                                        <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                            <span class="lh-1 text-alternate">{{$ctgry->status}}</span>
                                        </div>
                                          <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                            <span class="lh-1 text-alternate">{{$ctgry->categoria->name}}</span>
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
                                                    <a class="dropdown-item" href="{{route('subcat.edit',['id'=>$ctgry->id])}}">
                                                        <span class="align-middle d-inline-block">Editar</span>
                                                    </a>                                              
                                                    {{-- <a class="dropdown-item" href="{{route('payment.delete',['id'=>$ctgry->id])}}">
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
            {{-- <div class="w-100 d-flex justify-content-center">
                <nav>
                {{ $products->links() }}
                </nav>
            </div> --}}
            <!-- Items Pagination End -->
        </div>
    </div>
@endsection
