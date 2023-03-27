@php
    $html_tag_data = [];
    $title = 'Lista de usuarios';
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
    <script src="/js/pages/customers.list.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Editar Rol</h2>
            </div>
            <div class="card-body">
                <form  method="POST" action="{{ route('roles.update', $role->id) }}" >
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nombre</label>
                      <input type="text" class="form-control @if ($errors->has('name')) is-invalid  @endif" value="{{ old('name', $role->slug) }}" id="name" name="name" placeholder="nombre">
                      @if ($errors->has('name'))
                        <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                  </form>
            </div>
        </div>
        <!-- Title and Top Buttons Start -->
        <!-- Customers List Start -->
        {{-- <h1>Editar Usuario</h1> --}}
        {{-- <h1 class="success">{{$message}}</h1> --}}
        <div class="row">
            {{-- <div class="col-12 mb-0">
                <div id="checkboxTable">
                    <div class="contenedor">
                    <div class="card">
                        <form action="{{ route('roles.update',['id'=>$rolUnico->id]) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <h2>Nombre<br><br>
                            <input class="form-control" type="text" name="name" value="{{$rolUnico->name}}" placeholder="Nombre">
                            </h2>
                            <h2>Rol<br><br>
                            <input class="form-control" type="text" name="rol" value="{{$rolUnico->rol}}" placeholder="Rol">
                            </h2>
                            <button class="btn_style" type="submit" class="form-submit">Guardar</button>
                        </form>
                    </div>
                </div>
                <script>
                </script>
                <style>
                                       .contenedor{
                        width: 80vw;
                        height: 70vh;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }
                    .contenedor .card{
                        width: 100vw;
                        height: 80vh;
                        background: none;
                        background: #1e1e1e;
                        padding: 5%;
                        border-radius: 3%;
                        margin-top: 12vh;

                    }
                    .contenedor .card form{
                        display: grid;
                        grid-template-columns: 1fr;
                        gap: 1%;
                        margin-top: 0vh;
                        justify-content: center;
                        align-items: center;
                        text-align: left;
                    }
                    .contenedor input{
                        width: 100%;
                        height: 22px;
                        margin-top: -2vh;
                    }
                    h2{
                        font-size: 1.5vh;
                        text-align: left;
                        display: flex;
                        flex-direction: column;
                        /* align-items: center; */
                    }
                    .btn_style{
                        height: 100%;
                    }
                    .btn_style:hover{
                        height: 100%;
                    }
                </style>

                </div>
            </div> --}}
        </div>
        <!-- Customers List End -->


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
