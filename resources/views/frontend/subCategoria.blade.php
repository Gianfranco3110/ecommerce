

@php
    $html_tag_data = [];
    $title = 'Categoria';
    $description = 'Categorias';
@endphp
@extends('frontend.layoust.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/vendor/glide.core.min.css')}}" />
@endsection

@section('js_vendor')
    <script src="{{ asset('js/vendor/glide.min.js') }}"></script>

    <script src="{{ asset('js/cs/glide.custom.js') }}"></script>
@endsection

@section('js_page')
    <script>

         var array = <?php echo json_encode($subcategorias ); ?>;

         console.log(array);

           for (var i = 0; i < array.length; i++) {
      
    

        if (document.querySelector('#glideBasic' + array[i]['id'])) {
            new GlideCustom(
                document.querySelector('#glideBasic' + array[i]['id']), {
                    gap: 0,
                    rewind: false,
                    bound: true,
                    perView: 6,
                    breakpoints: {
                        400: {
                            perView: 1
                        },
                        1000: {
                            perView: 2
                        },
                        1400: {
                            perView: 3
                        },
                        1900: {
                            perView: 5
                        },
                        3840: {
                            perView: 6
                        },
                    },
                },
                true,
            ).mount();
        }
    }
    </script>


@endsection

@section('content')
    <div class="container">

         @foreach ($subcategorias as $subcategoria)

        <h2 class="d-flex justify-content-center mb-4 mt-5">{{$subcategoria->name}}</h2>
        <div class="glide" id="glideBasic{{ $subcategoria->id }}">
            <!-- Glide Carousel Content Start -->

            <div class="glide__track" data-glide-el="track">
                <div class="glide__slides">
                    @foreach ($subcategoria->productos as $item)
                        


                    <div class="glide__slide">
                        {{-- start card --}}
                        <div class="col">
                            <div class="card h-100 border border-2">
                                <span class="badge rounded-pill bg-primary me-1 position-absolute s-n2 t-2 z-index-1">SALE</span>
                                @foreach ($item->media as $image)
                                    <img src="{{ $image->getUrl() }}" alt="imagen no encontrada" class="card-img-top sh-22">
                                    @break
                                @endforeach
                                <div class="card-body pb-2">
                                    <div class="h6 mb-0 d-flex">
                                        <a href="{{route('producto.show', [$item->id])}}" class="body-link d-block lh-1-25 stretched-link">
                                            <span class="clamp-line sh-4" data-line="2">{{$item->name}}</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-footer border-0 pt-0">
                                    <div class="mb-2">
                                        {{-- <div class="br-wrapper br-theme-cs-icon d-inline-block">
                                            <select class="rating" name="rating" autocomplete="off" data-readonly="true"
                                                data-initial-rating="5">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div> --}}
                                        {{-- <div class="text-muted d-inline-block text-small align-text-top">({{$item->stock}})</div> --}}
                                    </div>
                                    <div class="card-text mb-0">
                                        <div>$ {{$item->price}}</div>
                                    </div>
                                    {{-- <div class="col mt-2">
                                        <a class="btn btn-icon btn-icon-end bg-primary w-40 w-sm-auto"
                                            href="{{route('producto.show', [$producto->id])}}">
                                            Ver mas
                                            <i data-acorn-icon="eye"></i>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        {{-- end card --}}
                    </div>
                    @endforeach

                    
                </div>
            </div>
            <!-- Glide Carousel Content End -->

            <!-- Glide Carousel Controls Start -->
            <div class="text-center mt-4 mb-3">
                <span class="glide__arrows slider-nav" data-glide-el="controls">
                    <button class="btn btn-icon btn-icon-only btn-outline-primary" data-glide-dir="<">
                        <i data-acorn-icon="chevron-left"></i>
                    </button>
                </span>
                <span class="glide__bullets" data-glide-el="controls[nav]"></span>
                <span class="glide__arrows slider-nav" data-glide-el="controls">
                    <button class="btn btn-icon btn-icon-only btn-outline-primary" data-glide-dir=">">
                        <i data-acorn-icon="chevron-right"></i>
                    </button>
                </span>
            </div>
            <!-- Glide Carousel Controls End -->
        </div>
        @endforeach
        {{-- <h2 class="d-flex justify-content-center mb-4 mt-5">zaptos</h2>
        <div class="glide" id="glideBasic2">
            <!-- Glide Carousel Content Start -->
            <div class="glide__track" data-glide-el="track">
                <div class="glide__slides">
                    @for ($i = 0; $i < 10; $i++)

                    <div class="glide__slide">
                        <div class="card mb-5">
                            <img src="{{ asset('img/utilidad/zapatos.webp') }}" class="card-img-top" alt="card image" />
                            <div class="card-body">
                                <h5 class="card-title">Card title 1</h5>
                                <p class="card-text">Liquorice caramels apple pie chupa.</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endfor
                </div>
            </div>
            <!-- Glide Carousel Content End -->

            <!-- Glide Carousel Controls Start -->
            <div class="text-center">
                <span class="glide__arrows slider-nav" data-glide-el="controls">
                    <button class="btn btn-icon btn-icon-only btn-outline-primary" data-glide-dir="<">
                        <i data-acorn-icon="chevron-left"></i>
                    </button>
                </span>
                <span class="glide__bullets" data-glide-el="controls[nav]"></span>
                <span class="glide__arrows slider-nav" data-glide-el="controls">
                    <button class="btn btn-icon btn-icon-only btn-outline-primary" data-glide-dir=">">
                        <i data-acorn-icon="chevron-right"></i>
                    </button>
                </span>
            </div>
            <!-- Glide Carousel Controls End -->
        </div>

        <h2 class="d-flex justify-content-center mb-3 mt-5">franelas</h2>
        <div class="glide" id="glideBasic3">
            <!-- Glide Carousel Content Start -->
            <div class="glide__track" data-glide-el="track">
                <div class="glide__slides">
                    @for($i = 0; $i < 10; $i++)

                    <div class="glide__slide">
                        <div class="card mb-5">
                            <img src="{{ asset('img/utilidad/franela.webp') }}" class="card-img-top" alt="card image" />
                            <div class="card-body">
                                <h5 class="card-title">Card title 1</h5>
                                <p class="card-text">Liquorice caramels apple pie chupa.</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endfor

                </div>
            </div>
            <!-- Glide Carousel Content End -->

            <!-- Glide Carousel Controls Start -->
            <div class="text-center mb-5">
                <span class="glide__arrows slider-nav" data-glide-el="controls">
                    <button class="btn btn-icon btn-icon-only btn-outline-primary" data-glide-dir="<">
                        <i data-acorn-icon="chevron-left"></i>
                    </button>
                </span>
                <span class="glide__bullets" data-glide-el="controls[nav]"></span>
                <span class="glide__arrows slider-nav" data-glide-el="controls">
                    <button class="btn btn-icon btn-icon-only btn-outline-primary" data-glide-dir=">">
                        <i data-acorn-icon="chevron-right"></i>
                    </button>
                </span>
            </div>
            <!-- Glide Carousel Controls End -->
        </div> --}}

    </div>
@endsection

