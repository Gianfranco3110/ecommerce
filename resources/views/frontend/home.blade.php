@php
    $html_tag_data = ["override"=>'{"attributes" : { "color": "dark-blue" }}'];

@endphp
@extends('frontend.layoust.app')
@section('css')
<link rel="stylesheet" href="css/vendor/glide.core.min.css" />

@endsection

@section('js_vendor')
    <script src="/js/vendor/jquery.barrating.min.js"></script>
    <script src="/js/vendor/movecontent.js"></script>

    <script src="js/vendor/glide.min.js"></script>
<script src="js/cs/glide.custom.js"></script>
@endsection

@section('js_page')
@include('frontend.change_password')

    <script src="/js/pages/storefront.home.js"></script>
    <script src="{{ asset('/js/base/loader.js')}}"></script>
    {{-- <link rel="stylesheet" href="{{ asset('/js/base/loader.js')}}" /> --}}


    <script>

    if (document.querySelector('#glideBasic')) {
  new GlideCustom(
    document.querySelector('#glideBasic'),
    {
      gap: 0,
      rewind: true,
      bound: true,
      perView: 6,
      autoPlay:true,
      breakpoints: {
        400: { perView: 1 },
        1000: { perView: 2 },
        1400: { perView: 3 },
        1900: { perView: 5 },
        3840: { perView: 6 },
      },
    },
    true,
  ).mount();
}
    </script>
@endsection




@section('content')
    @include('frontend.home.home')
    @include('frontend.home.promocion')
    @include('frontend.home.Productos')
    @include('frontend.home.blog')

@endsection
