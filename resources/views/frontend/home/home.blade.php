<div class="container mt-5">
    <div class="text-center text-danger text-uppercase fs-3 mb-4">
        @if(Session::has('mensaje'))
        <div><i class="fa fa-exclamation-circle" aria-hidden="true"></i>{{Session::get('mensaje')}}</div>
        @endif
    </div>

    {{-- <a href="{{route('push')}}" class="btn btn-outline-primary btn-block">Make a Push Notification!</a> --}}

    
    <div class="row g-2 row-cols-2 row-cols-md-3 row-cols-xl-6  my-5">
        @foreach ($subCategorias as $subCategoria )
        
        <div class="col sh-19">
            <div class="card bg-primary t h-100 ">
                <a class="card-body text-center" href="{{route('categorias.show',[$subCategoria->categoria_id])}}">
                    
                    <div class="sw-10 me-1 mb-2 d-inline-block ">
                        {{-- <img class="img-thumbnail img-fluid" src="../storage/{{$subCategoria->image}}" class="img-fluid rounded-xl"  alt=""> --}}
                        <img class="img-thumbnail img-fluid rounded-xl" src="../storage/{{$subCategoria->image}}" alt="thumb" style="width: 70px;height:70px">
                        
                    </div>
                    
                    <p class="heading mt-1  text-body text-white">{{ $subCategoria->name }}</p>
                    {{--                     <div class="text-extra-small fw-medium text-muted">14 PRODUCTS</div>
                    --}}
                </a>
            </div>
        </div>
        
        
        
        
        
        @endforeach
        
    </div>
    
    
    
    
    
    <!-- Trending Start -->
    <h2 class=" text-center h2 mt-5 mb-3">Destacados En oferta Mejor calificados</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-2 mb-5">
        @foreach ($productos as $producto)
        
        <div class="col">
            <div class="card h-100 border border-2">
                <span class="badge rounded-pill bg-primary me-1 position-absolute s-n2 t-2 z-index-1">SALE</span>
                @foreach ($producto->media as $image)
                <img src="{{ $image->getUrl() }}" alt="imagen no encontrada" class="card-img-top sh-22">
                @break
                @endforeach
                <div class="card-body pb-2">
                    <div class="h6 mb-0 d-flex">
                        <a href="{{route('producto.show', [$producto->id])}}" class="body-link d-block lh-1-25 stretched-link">
                            <span class="clamp-line sh-4" data-line="2">{{$producto->name}}</span>
                        </a>
                    </div>
                </div>
                <div class="card-footer border-0 pt-0">
                    <div class="mb-2">
                        <div class="br-wrapper br-theme-cs-icon d-inline-block">
                            <select class="rating" name="rating" autocomplete="off" data-readonly="true"
                            data-initial-rating="5">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="text-muted d-inline-block text-small align-text-top">({{$producto->stock}})</div>
                </div>
                <div class="card-text mb-0">
                    <div>$ {{$producto->price}}</div>
                </div>
                <div class="col mt-2">
                    <a class="btn btn-icon btn-icon-end bg-primary w-40 w-sm-auto"
                    href="{{route('producto.show', [$producto->id])}}">
                    {{-- <span>Detalles</span> --}}
                    Ver mas
                    <i data-acorn-icon="eye"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach


</div>
<!-- Trending End -->

<!-- Popular Categories Start -->

<!-- Popular Categories Start -->
</div>
