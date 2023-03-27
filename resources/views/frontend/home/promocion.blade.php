<div  class="container">
    <div class="row ">
        <div class="col-12 col-xl-12 mb-5">
            <div class="row g-2 mb-2">
                @foreach ($promos as $item)
                    
                <div class="col-12 col-sm-6 col-md-8">
                    <div class="card sh-30 sh-sm-45 hover-img-scale-up">
                        {{-- <img src="{{ asset('img/pc/apple-g0d191c2ca_640.jpg') }}" class="card-img h-100 scale" alt="card image" /> --}}
                        @foreach ($item->media as $image)
                            <img src="{{ $image->getUrl() }}" class="card-img h-100 scale" alt="card image">
                            @break
                        @endforeach
                        <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                            <div>
                                <div class="cta-1 mb-3 text-black w-md-100 w-75">Promocion</div>
                                <div class="w-50 fs-4 text-black d-none d-md-block">{{$item->name}}</div>
                            </div>
                            <div class="w-50 h1  text-primary d-none d-md-block">
                                ${{$item->price}}
                                <div class="text-muted text-overline text-small sh-2">
                                    Antes  <del>$  1000.25</del>
                                </div>
                            </div>
                            <div>
                                <a href="{{route('producto.show', [$item->id])}}" class="btn btn-icon btn-icon-start btn-outline-primary mt-3 stretched-link">
                                    <i data-acorn-icon="chevron-right"></i>
                                    <span>Ver Mas</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                @foreach ($categoria as $item)
                    
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card sh-30 sh-sm-45 hover-img-scale-up">
                        <img src="{{ asset('img/pc/headphones-g9041f4a9a_640.jpg') }}" class="img-fluid rounded-xl" alt="thumb" />
                        <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                            <div>
                                <div class="cta-1 mb-5 text-black w-md-100 w-75">Sale on {{$item->name}}</div>
                            </div>
                            {{-- <div class="w-50 h1  text-primary d-none d-md-block">
                                500$
                            </div> --}}
                            <div>
                                <a href="" class="btn btn-icon btn-icon-start btn-outline-primary mt-3 stretched-link">
                                    <i data-acorn-icon="chevron-right"></i>
                                    <span>Ver Mas</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @break
                @endforeach

            </div>

        </div>
        <!-- Right Side Cta Banners End -->
    </div>
</div>
