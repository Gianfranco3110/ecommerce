@extends('frontend.layoust.app')

@section('content')
    <div class="container">
        <!-- Title Start -->
        <div class="row">
            <div class="col-auto mb-3 mb-md-0 me-auto">
                <div class="w-auto sw-md-30">
                    <a href="/blog" class="muted-link pb-1 d-inline-block breadcrumb-back">
                        <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                        <span class="text-small align-middle">Blog</span>
                    </a>
                    <h1 class="mb-0 pb-0 display-4" id="title">Blog vista interna</h1>
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
                                    <h3 class=" m-auto text-black display-1  text-center mt-5">Blog vista interna</h3>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- Title End -->

        <div class="row">
            <!-- List Start -->
            <div class="col-12 col-xl-8 col-xxl-9 mb-5">
                <div class="card mb-5">
                    <div class="card-body p-0">
                        <div class="glide glide-gallery" id="glideBlogDetail">
                            <div class="glide glide-large">
                                <div class="glide__track" data-glide-el="track">
                                    <a href="/img/product/large/product-1.webp">
                                        <img alt="detail" src="/img/product/large/product-1.webp"
                                            class="responsive border-0 rounded-top-end rounded-top-start img-fluid mb-3 sh-50 w-100" />
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="card-body pt-0">
                            <h4 class="mb-3">Carrot Cake Gingerbread</h4>
                            <div>
                                <p>
                                    Toffee croissant icing toffee. Sweet roll chupa chups marshmallow muffin liquorice chupa
                                    chups soufflé bonbon. Liquorice gummi bears
                                    cake donut chocolate lollipop gummi bears. Cotton candy cupcake ice cream gummies
                                    dessert muffin chocolate jelly. Danish brownie
                                    chocolate bar lollipop cookie tootsie roll candy canes. Jujubes lollipop cheesecake
                                    gummi bears cheesecake. Cake jujubes soufflé.
                                </p>
                                <p>
                                    Cake chocolate bar biscuit sweet roll liquorice jelly jujubes. Gingerbread icing
                                    macaroon bear claw jelly toffee. Chocolate cake
                                    marshmallow muffin wafer. Pastry cake tart apple pie bear claw sweet. Apple pie macaroon
                                    sesame snaps cotton candy jelly
                                    <u>pudding lollipop caramels</u>
                                    marshmallow. Powder halvah dessert ice cream. Carrot cake gingerbread chocolate cake
                                    tootsie roll. Oat cake jujubes jelly-o jelly chupa
                                    chups lollipop jelly wafer soufflé.
                                </p>
                                <h6 class="mb-3 mt-5 text-alternate">Sesame Snaps Lollipop Macaroon</h6>
                                <p>
                                    Jelly-o jelly oat cake cheesecake halvah. Cupcake sweet roll donut. Sesame snaps
                                    lollipop macaroon.
                                    <a href="#">Icing tiramisu</a>
                                    oat cake chocolate cake marzipan pudding danish gummies. Dragée liquorice jelly beans
                                    jelly jelly sesame snaps brownie. Cheesecake
                                    chocolate cake sweet roll cupcake dragée croissant muffin. Lemon drops cupcake croissant
                                    liquorice donut cookie cake. Gingerbread
                                    biscuit bear claw marzipan tiramisu topping. Jelly-o croissant chocolate bar gummi bears
                                    dessert lemon drops gingerbread croissant.
                                    Donut candy jelly.
                                </p>
                                <ul class="list-unstyled">
                                    <li>Croissant</li>
                                    <li>Sesame snaps</li>
                                    <li>Ice cream</li>
                                    <li>Candy canes</li>
                                    <li>Lemon drops</li>
                                </ul>
                                <h6 class="mb-3 mt-5 text-alternate">Muffin Sweet Roll Apple Pie</h6>
                                <p>
                                    Carrot cake gummi bears wafer sesame snaps soufflé cheesecake cheesecake cake. Sweet
                                    roll apple pie tiramisu bonbon sugar plum muffin
                                    sesame snaps chocolate. Lollipop sweet roll gingerbread halvah sesame snaps powder.
                                    Wafer halvah chocolate soufflé icing. Cotton candy
                                    danish lollipop jelly-o candy caramels.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Content End -->

                    <div class="card-footer border-0 pt-0">
                        <div class="row align-items-center">
                            <!-- Comments and Likes Start -->
                            <div class="col-6 text-muted">
                                <div class="row g-0">
                                    <div class="col-auto pe-3">
                                        <i data-acorn-icon="eye" class="text-primary me-1" data-acorn-size="15"></i>
                                        <span class="align-middle">421</span>
                                    </div>
                                    <div class="col">
                                        <i data-acorn-icon="message" class="text-primary me-1" data-acorn-size="15"></i>
                                        <span class="align-middle">4</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Comments and Likes End -->

                            <!-- Social Buttons Start -->
                            <div class="col-6">
                                <div class="d-flex align-items-center justify-content-end">
                                    <button class="btn btn-sm btn-icon btn-icon-only btn-outline-primary ms-1"
                                        type="button">
                                        <i data-acorn-icon="facebook"></i>
                                    </button>
                                    <button class="btn btn-sm btn-icon btn-icon-only btn-outline-primary ms-1"
                                        type="button">
                                        <i data-acorn-icon="twitter"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Social Buttons End -->
                        </div>
                    </div>
                </div>

                <!-- About the Author Start -->
                <h2 class="small-title">About the Author</h2>
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row g-0">
                            <div class="col-auto">
                                <div class="sw-5 me-3">
                                    <img src="/img/profile/profile-1.webp" class="img-fluid rounded-xl" alt="thumb" />
                                </div>
                            </div>
                            <div class="col">
                                <a href="#">Olli Hawkins</a>
                                <div class="text-muted text-small mb-2">Development Lead</div>
                                <div class="text-medium text-alternate mb-1 clamp-line" data-line="2">
                                    Cupcake chocolate cake jelly beans lemon drops danish bear claw carrot cake soufflé.
                                    Marshmallow jujubes tiramisu apple pie carrot cake
                                    danish candy. Croissant croissant chocolate bar. Jelly macaroon apple pie croissant
                                    pastry cheesecake. Marshmallow oat cake lemon drops
                                    chocolate bonbon powder lemon drops chocolate. Danish tootsie roll dessert soufflé.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About the Author End -->

                <!-- You May Also Like Start -->
                <h2 class="small-title">You May Also Like</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="/img/product/small/product-10.webp" class="card-img-top sh-25" alt="card image" />
                            <div class="card-body pb-0">
                                <a href="/Pages/Blog/Detail"
                                    class="h5 heading body-link stretched-link sh-8 sh-md-6 d-block">
                                    <div class="mb-0 lh-1-5 clamp-line" data-line="2">Basic Introduction to Bread Making
                                    </div>
                                </a>
                            </div>
                            <div class="card-footer border-0 pt-0">
                                <div class="row g-0">
                                    <div class="col-auto pe-3">
                                        <i data-acorn-icon="like" class="text-primary me-1" data-acorn-size="15"></i>
                                        <span class="align-middle">241</span>
                                    </div>
                                    <div class="col">
                                        <i data-acorn-icon="clock" class="text-primary me-1" data-acorn-size="15"></i>
                                        <span class="align-middle">25 Min</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 sh-45">
                        <div class="card h-100">
                            <img src="/img/product/small/product-2.webp" class="card-img-top sh-25" alt="card image" />
                            <div class="card-body pb-0">
                                <a href="/Pages/Blog/Detail"
                                    class="h5 heading body-link stretched-link sh-8 sh-md-6 d-block">
                                    <div class="mb-0 lh-1-5 clamp-line" data-line="2">14 Facts About Sugar Products</div>
                                </a>
                            </div>
                            <div class="card-footer border-0 pt-0">
                                <div class="row g-0">
                                    <div class="col-auto pe-3">
                                        <i data-acorn-icon="like" class="text-primary me-1" data-acorn-size="15"></i>
                                        <span class="align-middle">115</span>
                                    </div>
                                    <div class="col">
                                        <i data-acorn-icon="clock" class="text-primary me-1" data-acorn-size="15"></i>
                                        <span class="align-middle">15 Min</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 sh-45">
                        <div class="card h-100">
                            <img src="/img/product/small/product-5.webp" class="card-img-top sh-25" alt="card image" />
                            <div class="card-body pb-0">
                                <a href="/Pages/Blog/Detail"
                                    class="h5 heading body-link stretched-link sh-8 sh-md-6 d-block">
                                    <div class="mb-0 lh-1-5 clamp-line" data-line="2">10 Secrets Every Southern Baker
                                        Knows</div>
                                </a>
                            </div>
                            <div class="card-footer border-0 pt-0">
                                <div class="row g-0">
                                    <div class="col-auto pe-3">
                                        <i data-acorn-icon="like" class="text-primary me-1" data-acorn-size="15"></i>
                                        <span class="align-middle">54</span>
                                    </div>
                                    <div class="col">
                                        <i data-acorn-icon="clock" class="text-primary me-1" data-acorn-size="15"></i>
                                        <span class="align-middle">30 Min</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- You May Also Like End -->
            </div>

            <!-- List End -->

            <!-- Right Side Start -->
            <div class="col-12 col-xl-4 col-xxl-3">
                <div class="row">
                    <!-- Mailing List Start -->
                    <div class="col-12">
                        <div class="card mb-5">
                            <div class="card-body row g-0">
                                <div class="col-12">
                                    <div class="cta-3">Buscador</div>
                                    <div class="d-flex flex-column justify-content-start">
                                        <div class="text-muted mb-2">
                                            <input type="search" class="form-control" placeholder="Search" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mailing List End -->



                    <!-- Categories Start -->
                    <div class="col-12 col-sm-6 col-xl-12">
                        <h2 class="small-title">Categorias</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <div class="row g-0">
                                    <div class="col-12 col-sm-6 mb-n2">
                                        <a href="/Pages/Blog/List" class="body-link d-block mb-2">Anpan</a>
                                        <a href="/Pages/Blog/List" class="body-link d-block mb-2">Arboud</a>
                                        <a href="/Pages/Blog/List" class="body-link d-block mb-2">Arepa</a>
                                        <a href="/Pages/Blog/List" class="body-link d-block mb-2">Baba</a>
                                        <a href="/Pages/Blog/List" class="body-link d-block mb-2">Bagel</a>
                                        <a href="/Pages/Blog/List" class="body-link d-block mb-2">Chapati</a>
                                        <a href="/Pages/Blog/List" class="body-link d-block mb-2">Bammy</a>
                                        <a href="/Pages/Blog/List" class="body-link d-block mb-2">Kalach</a>
                                    </div>
                                    <div class="col-12 col-sm-6 mb-n2">
                                        <a href="/Pages/Blog/List" class="body-link d-block mb-2">Kulcha</a>
                                        <a href="/Pages/Blog/List" class="body-link d-block mb-2">Matzo</a>
                                        <a href="/Pages/Blog/List" class="body-link d-block mb-2">Mohnflesserl</a>
                                        <a href="/Pages/Blog/List" class="body-link d-block mb-2">Pan Dulce</a>
                                        <a href="/Pages/Blog/List" class="body-link d-block mb-2">Pane Ticinese</a>
                                        <a href="/Pages/Blog/List" class="body-link d-block mb-2">Pita</a>
                                        <a href="/Pages/Blog/List" class="body-link d-block mb-2">Rieska</a>
                                        <a href="/Pages/Blog/List" class="body-link d-block mb-2">Zopf</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Categories End -->


                    <!-- Must Read Start -->
                    <div class="col-12">
                        <h2 class="small-title">Otros post</h2>
                        <div class="mb-5">
                            <div class="row mb-n2">
                                <div class="col-12 col-md-6 col-xl-12 mb-2">
                                    <div class="card sh-11 sh-sm-14">
                                        <div class="row g-0 h-100">
                                            <div class="col-auto">
                                                <img src="/img/product/small/product-1.webp" alt="alternate text"
                                                    class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                            </div>
                                            <div class="col position-static">
                                                <div
                                                    class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                                    <div class="d-flex flex-column">
                                                        <a href="/Pages/Blog/Detail" class="stretched-link body-link">
                                                            <div class="clamp-line" data-line="2">A Complete Guide to Mix
                                                                Dough for the Molds</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-12 mb-2">
                                    <div class="card sh-11 sh-sm-14">
                                        <div class="row g-0 h-100">
                                            <div class="col-auto">
                                                <img src="/img/product/small/product-2.webp" alt="alternate text"
                                                    class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                            </div>
                                            <div class="col position-static">
                                                <div
                                                    class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                                    <div class="d-flex flex-column">
                                                        <a href="/Pages/Blog/Detail" class="stretched-link body-link">
                                                            <div class="clamp-line" data-line="2">Apple Cake Recipe for
                                                                Starters</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-12 mb-2">
                                    <div class="card sh-11 sh-sm-14">
                                        <div class="row g-0 h-100">
                                            <div class="col-auto">
                                                <img src="/img/product/small/product-3.webp" alt="alternate text"
                                                    class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                            </div>
                                            <div class="col position-static">
                                                <div
                                                    class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                                    <div class="d-flex flex-column">
                                                        <a href="/Pages/Blog/Detail" class="stretched-link body-link">
                                                            <div class="clamp-line" data-line="2">Basic Introduction to
                                                                Bread Making</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-12 mb-2">
                                    <div class="card sh-11 sh-sm-14">
                                        <div class="row g-0 h-100">
                                            <div class="col-auto">
                                                <img src="/img/product/small/product-4.webp" alt="alternate text"
                                                    class="card-img card-img-horizontal sw-10 sw-sm-14" />
                                            </div>
                                            <div class="col position-static">
                                                <div
                                                    class="card-body d-flex flex-column pt-0 pb-0 h-100 justify-content-center">
                                                    <div class="d-flex flex-column">
                                                        <a href="/Pages/Blog/Detail" class="stretched-link body-link">
                                                            <div class="clamp-line" data-line="2">Easy and Efficient
                                                                Tricks for Baking Crispy Breads</div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Must Read End -->



                    <!-- Tags Start -->
                    <div class="col-12 col-sm-6 col-xl-12">
                        <h2 class="small-title">Tags</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1"
                                    href="/Pages/Blog/List">
                                    <span>Food (12)</span>
                                </a>
                                <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1"
                                    href="/Pages/Blog/List">
                                    <span>Baking (3)</span>
                                </a>
                                <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1"
                                    href="/Pages/Blog/List">
                                    <span>Sweet (1)</span>
                                </a>
                                <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1"
                                    href="/Pages/Blog/List">
                                    <span>Molding (3)</span>
                                </a>
                                <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1"
                                    href="/Pages/Blog/List">
                                    <span>Pastry (5)</span>
                                </a>
                                <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1"
                                    href="/Pages/Blog/List">
                                    <span>Healthy (7)</span>
                                </a>
                                <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1"
                                    href="/Pages/Blog/List">
                                    <span>Rye (3)</span>
                                </a>
                                <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1"
                                    href="/Pages/Blog/List">
                                    <span>Simple (3)</span>
                                </a>
                                <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1"
                                    href="/Pages/Blog/List">
                                    <span>Cake (2)</span>
                                </a>
                                <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1"
                                    href="/Pages/Blog/List">
                                    <span>Recipe (6)</span>
                                </a>
                                <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1"
                                    href="/Pages/Blog/List">
                                    <span>Bread (8)</span>
                                </a>
                                <a class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-1 me-1"
                                    href="/Pages/Blog/List">
                                    <span>Wheat (2)</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>

            <div class="col-12 col-xl-8 col-xxl-9">
                <h2 class="small-title">Comentarios</h2>

                <h2 class="small-title"></h2>
                <div class="card mb-5">
                    <div class="card-body">
                        <!-- Total Rating Start -->

                        <!-- Total Rating End -->

                        <!-- Comments Start -->
                        <div class="d-flex align-items-center border-bottom border-separator-light pb-3">
                            <div class="row g-0 w-100">
                                <div class="col-auto">
                                    <div class="sw-5 me-3">
                                        <img src="/img/profile/profile-1.webp" class="img-fluid rounded-xl" alt="thumb" />
                                    </div>
                                </div>
                                <div class="col pe-3">
                                    <div>Cherish Kerr</div>
                                    <div class="text-muted text-small mb-2">2 days ago</div>

                                    <div class="text-medium text-alternate lh-1-25">Macaroon!</div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center border-bottom border-separator-light pb-3 mt-3">
                            <div class="row g-0 w-100">
                                <div class="col-auto">
                                    <div class="sw-5 me-3">
                                        <img src="/img/profile/profile-2.webp" class="img-fluid rounded-xl" alt="thumb" />
                                    </div>
                                </div>
                                <div class="col pe-3">
                                    <div>Olli Hawkins</div>
                                    <div class="text-muted text-small mb-2">3 days ago</div>

                                    <div class="text-medium text-alternate lh-1-25">Cupcake cake fruitcake. Powder chocolate bar soufflé gummi bears topping donut.</div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center border-bottom border-separator-light pb-3 mt-3">
                            <div class="row g-0 w-100">
                                <div class="col-auto">
                                    <div class="sw-5 me-3">
                                        <img src="/img/profile/profile-3.webp" class="img-fluid rounded-xl" alt="thumb" />
                                    </div>
                                </div>
                                <div class="col pe-3">
                                    <div>Kirby Peters</div>
                                    <div class="text-muted text-small mb-2">3 days ago</div>

                                    <div class="text-medium text-alternate lh-1-25">Nice, very tasty.</div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center pb-3 mt-3">
                            <div class="row g-0 w-100">
                                <div class="col-auto">
                                    <div class="sw-5 me-3">
                                        <img src="/img/profile/profile-4.webp" class="img-fluid rounded-xl" alt="thumb" />
                                    </div>
                                </div>
                                <div class="col pe-3">
                                    <div>Zayn Hartley</div>
                                    <div class="text-muted text-small mb-2">1 week ago</div>

                                    <div class="text-medium text-alternate lh-1-25">
                                        Chupa chups topping pastry halvah. Jelly cake jelly sesame snaps jelly beans jelly beans. Biscuit powder brownie powder sesame snaps
                                        jelly-o dragée cake. Pie tiramisu cake jelly lemon drops. Macaroon sugar plum apple pie carrot cake jelly beans chocolate.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Comments End -->
                    </div>
                </div>
                <form id="addressForm" class="tooltip-label-end" novalidate>
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Comentario</label>
                                    <textarea class="form-control" rows="3" name="addressDetail"></textarea>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nombre</label>
                                    <input class="form-control" name="addressFirstName" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" name="addressLastName" />
                                </div>
                                <div class="col-md-3 mb-3">
                                    <button class="btn btn-primary">Enviar</button>
                                </div>
                            </div>



                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Right Side End -->
    </div>
@endsection
