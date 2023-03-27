<!DOCTYPE html>
<html lang="en" data-url-prefix="/" data-override='{"attributes": {"color": "light-blue" }}'>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>Tienda Virtual </title>

    <meta name="description"/>
    @laravelPWA

    @include('_layout.head')


</head>
<body class="">
@include('frontend.layoust.navbar')

<div style="margin-top: 150px">

    @yield('content')
    @include('frontend.login')

</div>


@include('frontend.layoust.footer')
@include('_layout.scripts')
    {{-- <link rel="stylesheet" href="{{ asset('/js/base/loader.js')}}" /> --}}
    <script src="{{ asset('/js/base/loader.js')}}"></script>
     @if (Auth()->check())
        <script src="{{ asset('js/enable-push.js') }}" defer></script>

        
    @endif

<script >
     document.querySelector('.menu').addEventListener('click',function(){
        document.querySelector('.link_categoria').classList.toggle('showCategorias');
    });




    /* Variables */
    var bars_search = document.getElementById('ctn-bars-search');
    var cover_ctn_search = document.getElementById('cover-ctn-search');
    var inputSearch = document.getElementById('inputSearch');
    var boxSearch = document.getElementById('box-search');

/* Funcion para mostrar el buscador */
function mostrarBuscador(){

    bars_search.style.top = "100px";
    cover_ctn_search.style.display ="block";
    inputSearch.focus();
}
/* Funcion para ocultar el buscador */

function ocultarBuscador(){
    bars_search.style.top = "-50px";
    cover_ctn_search.style.display ="none";
    inputSearch.value ="";


}

/* Ejecuando funcciones */

document.getElementById('icon-search').addEventListener("click",mostrarBuscador);
document.getElementById('cover-ctn-search').addEventListener("click",ocultarBuscador);


    </script>

    @stack('page-script')

</body>
</html>
