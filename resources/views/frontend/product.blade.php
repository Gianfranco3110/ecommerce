@extends('frontend.layoust.app')
@section('css')
    <link rel="stylesheet" href="/css/vendor/glide.core.min.css" />
    <link rel="stylesheet" href="/css/vendor/baguetteBox.min.css" />
    <link rel="stylesheet" href="/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
@endsection

@section('js_vendor')
    <script src="/js/vendor/baguetteBox.min.js"></script>
    <script src="/js/vendor/jquery.barrating.min.js"></script>
    <script src="/js/vendor/glide.min.js"></script>
    <script src="/js/vendor/select2.full.min.js"></script>
@endsection
@section('js_page')
    <script src="/js/cs/glide.custom.js"></script>
    <script src="/js/pages/storefront.detail.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        const swiper1 = new Swiper('.slide-content', {
            // Optional parameters
            slidesPerView: "auto",
            spaceBetween: 25,
            fade: 'true',
            grabCursor: true,
            centeredSlides: true,
            loop: true,

            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".pagination1",
                clickable: true,
                renderBullet: function(index, className) {
                    return '<span class="' + className + '">' + (index + 1) + "</span>";
                },
            },

            effect: "coverflow",

            coverflowEffect: {
                rotate: 40,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                580: {
                    slidesPerView: 2
                },
                950: {
                    slidesPerView: 3
                }

            }

        });
    </script>
@endsection


@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-auto mb-3 mb-md-0 me-auto">
                    <div class="w-auto sw-md-30">
                        <a href="{{route('home')}}" class="muted-link pb-1 d-inline-block breadcrumb-back">
                            <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                            <span class="text-small align-middle">Home</span>
                        </a>
                        <h1 class="mb-0 pb-0 display-4" id="title">Producto {{$producto->name}}</h1>
                        
                    </div>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                {{-- <div class="col-12 col-md-5 d-flex align-items-end justify-content-end">
                    <!-- Edit Button Start -->
                    <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto">
                        <i data-acorn-icon="edit-square"></i>
                        <span>Edit</span>
                    </button>
                    <!-- Edit Button End -->

                    <!-- Dropdown Button Start -->
                    <div class="ms-1">
                        <button type="button" class="btn btn-outline-primary btn-icon btn-icon-only" data-bs-offset="0,3"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-acorn-icon="more-horizontal"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <button class="dropdown-item" type="button">Move</button>
                            <button class="dropdown-item" type="button">Unpublish</button>
                            <button class="dropdown-item" type="button">Delete</button>
                        </div>
                    </div>
                    <!-- Dropdown Button End -->
                </div> --}}
                <!-- Top Buttons End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <div class="row">
            <div class="col-12">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="text-center text-danger text-uppercase fs-3 mb-4">
                                @if(Session::has('mensaje'))
                                	<div><i class="fa fa-exclamation-circle" aria-hidden="true"></i>{{Session::get('mensaje')}}</div>
                                @endif
                            </div>
                            <!-- Product Left Side Start -->
                            <div class="col-12 col-xl-7">
                                <div class="glide glide-gallery" id="glideStorefrontDetail">
                                    <span
                                        class="badge rounded-pill bg-primary me-1 position-absolute e-n2 t-4 z-index-1 py-2 px-3">20%
                                        OFF</span>
                                    <!-- Large Images Start -->
                                    <div class="glide glide-large">
                                        <div class="glide__track" data-glide-el="track">
                                            <ul class="glide__slides gallery-glide-custom">
                                                <li class="glide__slide p-0">
                                                    @foreach ($producto->media as $image)
                                                    <a href="{{ $image->getUrl() }}">
                                                            <img src="{{ $image->getUrl() }}" alt="imagen no encontrada"class="responsive border-0 rounded-md img-fluid mb-3 sh-35 sh-md-45 sh-xl-60 w-100" />
                                                    </a>
                                                    @break
                                                    @endforeach
                                                </li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Large Images End -->
                                    <!-- Thumbs Start -->
                                    <div class="glide glide-thumb">
                                        <div class="glide__track" data-glide-el="track">
                                            <ul class="glide__slides">
                                                <li class="glide__slide p-0">
                                                    {{-- <img alt="thumb" src="/img/product/small/product-1.webp"
                                                        class="responsive rounded-md img-fluid" /> --}}
                                                    @foreach ($producto->media as $image)
                                                        <img src="{{ $image->getUrl() }}" alt="imagen no encontrada"class="responsive rounded-md img-fluid" />
                                                        @break
                                                    @endforeach
                                                
                                            </ul>
                                        </div>
                                        {{-- <div class="glide__arrows" data-glide-el="controls">
                                            <button
                                                class="btn btn-icon btn-icon-only btn-foreground hover-outline left-arrow"
                                                data-glide-dir="<">
                                                <i data-acorn-icon="chevron-left"></i>
                                            </button>
                                            <button
                                                class="btn btn-icon btn-icon-only btn-foreground hover-outline right-arrow"
                                                data-glide-dir=">">
                                                <i data-acorn-icon="chevron-right"></i>
                                            </button>
                                        </div> --}}
                                    </div>
                                    <!-- Thumbs End -->
                                </div>
                            </div>
                            <!-- Product Left Side End -->

                            <!-- Product Right Side Start -->
                            <div class="col-12 col-xl-5 sh-xl-60 d-flex flex-column justify-content-between">
                                <div>
                                    {{-- <a class="mb-1 d-inline-block text-small" href="#">{{Wood & Toy}}</a> --}}
                                    <h3 class="mb-4">{{$producto->name}}</h3>
                                    <div class="text-muted text-overline">
                                        <del>$ 14.25</del>
                                    </div>
                                    <div class="h4">$ {{$producto->price}}</div>
                                    <div>
                                        
                                        <div class="text-muted d-inline-block text-small align-text-top">({{$producto->stock}})</div>
                                    </div>
                                    <p class="mt-2 mb-4 sh-11 clamp-line" data-line="4">
                                     {{$producto->details}}
                                    </p>
                                    <div class="row g-3 mb-4">
                                        <div class="mb-3 col-12 col-sm-auto me-1">
                                            <label class="fw-bold form-label">Color</label>
                                            <div class="pt-1">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="inlineRadio"
                                                        id="inlineRadio1" />
                                                    <label class="form-check-label" for="inlineRadio1">Red</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="inlineRadio"
                                                        id="inlineRadio2" />
                                                    <label class="form-check-label" for="inlineRadio2">Blue</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-auto me-1">
                                            <label class="fw-bold form-label">Size</label>
                                            <select class="sw-10 select-single-no-search">
                                                <option selected>Pick</option>
                                                <option>S</option>
                                                <option>M</option>
                                                <option>L</option>
                                                <option>XL</option>
                                            </select>
                                        </div>
                                        <form method="post" action="{{ route('cart.agregar') }}">
                                            {{ csrf_field() }}
                                        <div class="mb-3 col-auto">
                                            <label class="fw-bold form-label">Quantity</label>
                                            <select class="sw-10 select-single-no-search" name="quantity" >
                                                <option selected>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                        <!-- campo oculto donde se envia el id del producto -->
                                        <input type="hidden" name="product_id" value="{{ $producto->id }}">
                                        {{-- <div class="modal-body">
                                          <input type="number" name="quantity" class="form-control" value="1">
                                        </div> --}}
                              
                                        {{-- <div class="modal-footer"> --}}
                                          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> --}}
                                          <button type="submit" class="btn btn-icon btn-icon-end btn-outline-primary me-sm-1 mb-1 mb-sm-0 w-100 w-sm-auto">Añadir <i data-acorn-icon="cart"></i></button>
                                        {{-- </div> --}}
                                      </form>
                                    {{-- <a class="btn btn-icon btn-icon-end btn-primary w-100 w-sm-auto"
                                        href="/cart">
                                        <span>agregar to Cart</span>
                                        <i data-acorn-icon="cart"></i>
                                    </a> --}}
                                </div>
                            </div>
                            <!-- Product Right Side End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-12 mb-5">
                <!-- Details Start -->
                <h2 class="small-title">Descripcion</h2>
                <div class="card mb-5">
                    <div class="card-body">
                        <h6>{{$producto->name}}</h6>
                        <p class="mb-4">
                            {{$producto->description}}
                        </p>
                        {{-- <h6>Muffin</h6>
                        <p class="mb-4">
                            Tiramisu toffee brownie sweet roll sesame snaps halvah. Icing carrot cake cupcake gummi bears
                            danish. Sesame snaps muffin macaroon tiramisu
                            ice cream. Liquorice caramels apple pie chupa chups bonbon. Jelly-o candy apple pie sugar plum
                            icing chocolate cake lollipop jujubes bear
                            claw. Pastry sweet roll carrot cake cake macaroon gingerbread cookie.
                        </p>
                        <h6>Liquorice</h6>
                        <p class="mb-4">
                            Snaps muffin macaroon tiramisu ice cream toffee carrot sesame tootsie roll.Brownie ice cream
                            marshmallow topping. Icing liquorice oat cake
                            caramels. Sugar plum gummi bears jujubes cookie jelly-o tootsie roll chocolate bar. Jujubes
                            candy jelly-o topping lemon drops. Cupcake
                            gingerbread cookie cookie lemon drops tootsie roll lollipop. Tiramisu toffee brownie sweet roll
                            sesame snaps halvah. Icing carrot cake
                            cupcake gummi bears danish.
                        </p>
                        <h6>Powder Cake</h6>
                        <p class="mb-4">
                            Sesame snaps brownie gummi bears tootsie roll caramels dragée. Powder cake gummies jelly beans
                            toffee carrot cake bonbon powder muffin.
                            Jujubes candy jelly-o topping lemon drops. Cupcake gingerbread cookie cookie lemon drops tootsie
                            roll lollipop. Liquorice caramels apple pie
                            chupa chups bonbon. Jelly-o candy apple pie sugar plum icing chocolate cake lollipop jujubes
                            bear claw. Pastry sweet roll carrot cake cake
                            macaroon gingerbread cookie.Carrot cake jelly-o lemon drops toffee tootsie roll. Brownie topping
                            toffee apple pie apple pie. Wafer pudding
                            chocolate bar pastry bear claw tart carrot cake lemon drops icing. Gingerbread toffee topping.
                            Tootsie roll cotton candy muffin cheesecake
                            liquorice sweet. Sugar plum tart tart marshmallow chocolate wafer apple pie candy canes.
                            Chocolate cake biscuit donut cotton candy soufflé
                            cake macaroon. Halvah chocolate cotton candy sweet roll jelly-o candy danish dragée. Apple pie
                            cotton candy tiramisu biscuit cake muffin
                            tootsie roll bear claw cake. Cupcake cake fruitcake.
                        </p> --}}

                        <table class="table m-n2">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-small text-uppercase text-muted">CONTENT</th>
                                    <th scope="col" class="text-small text-uppercase text-muted">AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Protein(g)</td>
                                    <td>7.30</td>
                                </tr>
                                <tr>
                                    <td>Thiamin(mg)</td>
                                    <td>0.33</td>
                                </tr>
                                <tr>
                                    <td>Niacin(mg)</td>
                                    <td>1.6</td>
                                </tr>
                                <tr>
                                    <td>Riboflavin(mg)</td>
                                    <td>0.09</td>
                                </tr>
                                <tr>
                                    <td>Iron(mg)</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>Calcium(mg)</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>Energy(kcal)</td>
                                    <td>216</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Details End -->




            </div>

            <!-- Similar Products Start -->
            <div class="col-12 col-xl-12">
                <div class="row">
                    <div class="col-12 mb-5">
                        <h2 class="small-title h2 text-center">Similar Products</h2>
                        <div class="slide-container ">
                            <div class="slide-child swiper swiper1">
                                <div class="slide-content">
                                    <div class="cards-wrapper swiper-wrapper">
                                        @for ($i = 0; $i < 10; $i++)
                                        <div class="card h-100 border border-5 swiper-slide">
                                            <img src="/img/product/small/product-4.webp" class="card-img-top sh-22" alt="card image" />
                                            <div class="card-body pb-3">
                                                <h5 class="heading mb-0 d-flex">
                                                    <a href="/Storefront/Detail" class="body-link d-block lh-1-5 stretched-link">
                                                        <span class="clamp-line sh-4" data-line="2">Modern Dark Pot</span>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="card-footer border-0 pt-0">
                                                <div class="mb-2">
                                                    <div class="br-wrapper br-theme-cs-icon d-inline-block">
                                                        <select class="rating" name="rating" autocomplete="off" data-readonly="true" data-initial-rating="5">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                    <div class="text-muted d-inline-block text-small align-text-top">(412)</div>
                                                </div>
                                                <div class="card-text mb-0">
                                                    <div class="text-muted text-overline text-small sh-2"></div>
                                                    <div>$ 9.50</div>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                                <!-- If we need pagination -->
{{--                                 <div class="swiper-pagination pagination1"></div>
 --}}
                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev swiper-navBtn"></div>
                                <div class="swiper-button-next swiper-navBtn"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Similar Products End -->
    </div>
    </div>
@endsection
