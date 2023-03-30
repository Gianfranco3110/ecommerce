
<div>
    <div class="header">
        <div  class="menu" id="menu_categoria">
            <a href="#">
                <i class="fa fa-align-justify"></i>
                Categorias
            </a>
        </div>
        <a href="" class="logo">
            <img src="{{ asset('img/utilidad/logo.png') }}" alt="logo">
        </a>

        @if( request()->routeIs('home'))
        <a href="" class="logo2">
            <img src="{{ asset('img/utilidad/logo.png') }}" alt="logo">
        </a>
        @else

        <a class="back" href="#"  onclick="return window.history.back();">
            <i class="fa fa-arrow-left" class="text-white">
            </i>
        </a>
        @endif




        <nav class="link border-top">
            <div >
                <a href="{{url('/')}}">
                    Home
                </a>
                <a href="{{route('tienda')}}">
                    Tienda
                </a>
                <a href="{{route('categorias')}}">
                    Category
                </a>
                <a href="{{route('blog')}}">
                    Blog
                </a>

            </div>
        </nav>

        <div class="icons">
            {{-- @if ((Auth()->check()) && (auth()->user()->hasRole('super admin')))
                <i class="fa fa-bar-chart" aria-hidden="true"></i>

            @endif --}}
            <a  class="buscar" >
                <i class="fa fa-search" id="icon-search"></i>
            </a>
            @if (Auth()->check())
                <a href="{{route('login.destroy')}}">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                </a>
                @else
                <a  data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-user" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                </a>
            @endif
            <a href="/favoritos">

                <i class="fa fa-heart"></i>
            </a>

            @if ((Auth()->check()) && (auth()->user()->hasRole('super admin')))
                <a href="{{route('inicio')}}"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>

            @else

                <a href="{{route('carrito')}}">
                    <i class="fa fa-shopping-cart position-relative"> <span >
                       @include('frontend.estado')
                        <span class="visually-hidden">New alerts</span>
                    </span></i>
                </a>

            @endif




        </div>


        <nav class="link_categoria">
            <ul >
                <li>
                    <a href="#">
                        Caballero
                    </a>
                </li>
                <li>

                    <a href="#">
                        Dama
                    </a>
                </li>
                <li>

                    <a href="#">
                        Hogar
                    </a>
                </li>
                <li>

                    <a href="#">
                        Cocina
                    </a>
                </li>

            </ul>
        </nav>



    </div>

    <div id="ctn-bars-search">
        <input type="text" id="inputSearch" placeholder="Search">
    </div>
    <ul id="box-search">
        <li>
            <a href="">
                <i class="fa fa-search" id="icon-searh"></i>Html
            </a>
        </li>
        <li>
            <a href="">
                <i class="fa fa-search" id="icon-searh"></i>Php
            </a>
        </li>
        <li>
            <a href="">
                <i class="fa fa-search" id="icon-searh"></i>algo
            </a>
        </li>
        <li>
            <a href="">
                <i class="fa fa-search" id="icon-searh"></i>React
            </a>
        </li>
        <li>
            <a href="">
                <i class="fa fa-search" id="icon-searh"></i>Html
            </a>
        </li>
    </ul>

    <div id="cover-ctn-search">

    </div>

    <nav class="nav-telefono">
        <a href="/"  class="{{ request()->routeIs('home') ? 'active': ''}}"><i class="fa fa-home"></i><span>Home</span>
        </a>
        <a href="/tienda" class="{{ request()->routeIs('tienda') ? 'active' :''}}" ><i class="fa fa-cart-arrow-down"></i><span>tienda</span>
        </a>
        <a href="/categorias" class="{{ request()->routeIs('categorias') ? 'active' :''}}"> <i class="fa fa-tag"></i><span>Categorias</span>
        </a>
        <a href="/blog"  class="{{  request()->routeIs('blog') ? 'active': ''}}"> <i class="fa fa-book"></i><span>Blog</span>
        </a>

    </nav>
</div>
