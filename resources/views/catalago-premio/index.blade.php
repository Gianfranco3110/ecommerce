@php
$html_tag_data = [];
$title = 'Cupones';
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
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        
                       <div class="col-auto mb-3 mb-md-0 me-auto">
                <div class="w-auto sw-md-40">
                    <a href="#" class="muted-link pb-1 d-inline-block breadcrumb-back">
                        <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                        <span class="text-small align-middle">Home</span>
                    </a>
                    <h1 class="mb-0 pb-0 display-4" id="title">Catalago de premios</h1>
                </div>
            </div>
            @role('Super Admin|Admin')     
            <div class="col-12 col-sm-6 col-md-auto d-flex align-items-end justify-content-end mb-2 mb-sm-0 order-sm-3">
                        <a href="{{route('catalago-premios.create')}}" type="button" class="btn btn-outline-primary btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto">
                            <i data-acorn-icon="plus"></i>
                            <span>Agregar</span>
                        </a>
                       
                    </div>
                    @endrole
     
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
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
                                        <div class="col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="name">Imagen</div>
                                        </div>

                                        <div class="col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Nombre</div>
                                        </div>

                                        <div class="col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Monto de Descuento</div>
                                        </div>

                                        <div class="col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Puntos Para Validar</div>
                                        </div>
                                        
                                        <div class="col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                            <div class="text-muted text-medium cursor-pointer sort" data-sort="group">Estatus</div>
                                        </div>
                            
                                     

                                    </div>
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                {{--  "name" => "ComprasExtra"
                "description" => "por compras mayores ha 100 mil pesos"
                "monto" => 10.0
                "points" => 10
                "productos" => "{}"
                "active" => 1
                --}}
                
                <!-- Items Container Start -->
                @foreach ($catalagoPremios as $catalagoPremio)
                <div class="card mb-2">
                    <div class="row g-0 h-100 sh-lg-9 position-relative">
                        
                        <div class="col py-4 py-lg-0">
                            <div class="ps-5 pe-4 h-100">
                                <div class="row g-0 h-100 align-content-center">
                                    <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-2">
                                        <img class="img-thumbnail img-fluid" src="../storage/{{$catalagoPremio->image}}" class="img-thumbnail" width="100" alt="">

                                    </div>
                                    <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-2">
                                        <div class="lh-1 text-alternate"> {{$catalagoPremio->nombre}}</div>
                                    </div>
                                    <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                        <span class="lh-1 text-alternate">{{$catalagoPremio->valorDescuento}}</span>
                                    </div>
                                    <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                        <span class="lh-1 text-alternate">{{$catalagoPremio->puntosValidar}}</span>
                                    </div>
                                    <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                        <span class="lh-1 text-alternate">{{$catalagoPremio->status}}</span>
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
                                                <a class="dropdown-item" href="{{route('catalago-premios.edit',$catalagoPremio->id)}}">
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
                
                
            </div>
            {!! $catalagoPremios->links() !!}
        </div>
    </div>
</div>
@endsection
