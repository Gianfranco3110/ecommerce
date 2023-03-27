@php
$html_tag_data = [];
$title = 'Lista De Atributos';
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
    <script src="/js/pages/products.list.js"></script>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        
                        <h1 id="card_title">
                            {{"Atributos y Caracteristicas" }}
                        </h1>
                        
                        
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        
                        <div class="offset-5">
                            <a href="{{ route('colors.create') }}" class="btn btn-primary btn-sm float-right ml-2" style="font-size:20px" data-placement="left">
                                {{"Agregar Colores"}}
                            </a>
                            <a href="{{ route('sizes.create') }}" class="btn btn-primary btn-sm float-right ml-2" style="font-size:20px" data-placement="left">
                                {{"Agregar Tallas"}}
                            </a>
                            <a href="{{ route('brands.create') }}" class="btn btn-primary btn-sm float-right ml-2"style="font-size:20px"  data-placement="left">
                                {{"Agregar Marcas"}}
                            </a>
                            <a href="{{ route('dimensiones.create') }}" class="btn btn-primary btn-sm float-right" style="font-size:20px" data-placement="left">
                                {{"Agregar Dimensiones"}}
                            </a>
                        </div>
                    </div>
                    
                    
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                
                <div class="card-body" style="font-size:20px">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="color-tab" data-bs-toggle="tab" data-bs-target="#color" type="button" role="tab" aria-controls="color" aria-selected="true">Colores</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tallas-tab" data-bs-toggle="tab" data-bs-target="#tallas" type="button" role="tab" aria-controls="tallas" aria-selected="false">Tallas</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="marca-tab" data-bs-toggle="tab" data-bs-target="#marca" type="button" role="tab" aria-controls="marca" aria-selected="false">Marcas</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="dimension-tab" data-bs-toggle="tab" data-bs-target="#dimension" type="button" role="tab" aria-controls="dimension" aria-selected="false">Dimensiones</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active mt-4" id="color" role="tabpanel" aria-labelledby="color-tab">
                            
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
                                                                <div class="text-muted text-medium cursor-pointer sort" data-sort="name">Nombre</div>
                                                            </div>
                                                            <div class="col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                                                <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Estatus</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <!-- Items Container Start -->
                                        @foreach ($colors as $color)
                                        <div class="card mb-2">
                                            <div class="row g-0 h-100 sh-lg-9 position-relative">
                                                
                                                <div class="col py-4 py-lg-0">
                                                    <div class="ps-5 pe-4 h-100">
                                                        <div class="row g-0 h-100 align-content-center">
                                                            <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-2">
                                                                <div class="lh-1 text-alternate"> {{$color->name}}</div>
                                                            </div>
                                                            <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                                                <span class="lh-1 text-alternate">{{$color->status}}</span>
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
                                                                        <a class="dropdown-item" href="{{route('colors.edit',$color->id)}}">
                                                                            <span class="align-middle d-inline-block">Editar</span>
                                                                        </a>                                              
                                                                        {{-- <a class="dropdown-item" href="{{route('payment.delete',['id'=>$city->id])}}">
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
                                        {{-- {{ $products->links() }} --}}
                                    </nav>
                                </div>
                                <!-- Items Pagination End -->
                            </div>
                            
                        </div>
                        <div class="tab-pane fade mt-4" id="tallas" role="tabpanel" aria-labelledby="talla-tab">
                            

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
                                                                <div class="text-muted text-medium cursor-pointer sort" data-sort="name">Nombre</div>
                                                            </div>
                                                            <div class="col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                                                <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Estatus</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <!-- Items Container Start -->
                                        @foreach ($sizes as $size)
                                        <div class="card mb-2">
                                            <div class="row g-0 h-100 sh-lg-9 position-relative">
                                                
                                                <div class="col py-4 py-lg-0">
                                                    <div class="ps-5 pe-4 h-100">
                                                        <div class="row g-0 h-100 align-content-center">
                                                            <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-2">
                                                                <div class="lh-1 text-alternate"> {{$size->name}}</div>
                                                            </div>
                                                            <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                                                <span class="lh-1 text-alternate">{{$size->status}}</span>
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
                                                                        <a class="dropdown-item" href="{{route('sizes.edit',$size->id)}}">
                                                                            <span class="align-middle d-inline-block">Editar</span>
                                                                        </a>                                              
                                                                        {{-- <a class="dropdown-item" href="{{route('payment.delete',['id'=>$city->id])}}">
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
                                        {{-- {{ $products->links() }} --}}
                                    </nav>
                                </div>
                                <!-- Items Pagination End -->
                            </div>
                            
                        </div>
                        <div class="tab-pane fade mt-4" id="marca" role="tabpanel" aria-labelledby="marca-tab">
                            
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
                                                                <div class="text-muted text-medium cursor-pointer sort" data-sort="name">Nombre</div>
                                                            </div>
                                                            <div class="col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                                                <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Estatus</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <!-- Items Container Start -->
                                        @foreach ($brands as $brand)
                                        <div class="card mb-2">
                                            <div class="row g-0 h-100 sh-lg-9 position-relative">
                                                
                                                <div class="col py-4 py-lg-0">
                                                    <div class="ps-5 pe-4 h-100">
                                                        <div class="row g-0 h-100 align-content-center">
                                                            <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-2">
                                                                <div class="lh-1 text-alternate"> {{$brand->name}}</div>
                                                            </div>
                                                            <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                                                <span class="lh-1 text-alternate">{{$brand->status}}</span>
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
                                                                        <a class="dropdown-item" href="{{route('brands.edit',$brand->id)}}">
                                                                            <span class="align-middle d-inline-block">Editar</span>
                                                                        </a>                                              
                                                                        {{-- <a class="dropdown-item" href="{{route('payment.delete',['id'=>$city->id])}}">
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
                                        {{-- {{ $products->links() }} --}}
                                    </nav>
                                </div>
                                <!-- Items Pagination End -->
                            </div>
                        </div>
                        <div class="tab-pane fade mt-4" id="dimension" role="tabpanel" aria-labelledby="dimension-tab">

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
                                                                <div class="text-muted text-medium cursor-pointer sort" data-sort="name">Nombre</div>
                                                            </div>
                                                            <div class="col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                                                <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Estatus</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <!-- Items Container Start -->
                                        @foreach ($dimensiones as $dimension)
                                        <div class="card mb-2">
                                            <div class="row g-0 h-100 sh-lg-9 position-relative">
                                                
                                                <div class="col py-4 py-lg-0">
                                                    <div class="ps-5 pe-4 h-100">
                                                        <div class="row g-0 h-100 align-content-center">
                                                            <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-2">
                                                                <div class="lh-1 text-alternate"> {{$dimension->name}}</div>
                                                            </div>
                                                            <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                                                <span class="lh-1 text-alternate">{{$dimension->status}}</span>
                                                            </div>
                                                            <div class="col-1 d-flex flex-column mb-2 mb-lg-0 align-items-end order-2 order-lg-last justify-content-lg-center">
                                                                
                                                                <div class="btn-group ms-1 check-all-container">
                                                                    @if (auth()->check())
                                                                    @if (auth()->user()->rol == "1" || (auth()->user()->rol == "2"))
                                                                    <button
                                                                    type="button"
                                                                    class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split"
                                                                    data-bs-offset="0,3"
                                                                    data-bs-toggle="dropdown"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    ></button>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="{{route('dimensiones.edit',$dimension->id)}}">
                                                                            <span class="align-middle d-inline-block">Editar</span>
                                                                        </a>                                              
                                                                        {{-- <a class="dropdown-item" href="{{route('payment.delete',['id'=>$city->id])}}">
                                                                            <span class="align-middle d-inline-block">Delete</span>
                                                                        </a> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @endif
                                                            
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
                                        {{-- {{ $products->links() }} --}}
                                    </nav>
                                </div>
                                <!-- Items Pagination End -->
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            {{-- {!! $shippingCosts->links() !!} --}}
        </div>
    </div>
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

