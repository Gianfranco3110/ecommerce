@php
    $html_tag_data = [];
    $title = 'Lista de usuarios';
    $description= 'Ecommerce Customer List Page'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

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
        <!-- Title and Top Buttons Start -->
        <!-- Customers List Start -->
        <h1>Editar Usuario</h1>
        <h1 class="success">{{$message}}</h1>
        <div class="row">
            <div class="col-12 mb-0">
                <div id="checkboxTable">
                    <div class="contenedor">
                    <div class="card">
                        <form action="{{ route('user.update',['id'=>$user->id]) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <h2>Nombre<br><br>
                            <input class="form-control" type="text" name="name" value="{{$user->name}}" placeholder="Nombre">
                            </h2>
                            <h2>Apellido<br><br>
                            <input class="form-control" type="text" name="last_name" value="{{$user->last_name}}" placeholder="Apellidos">
                            </h2>
                            <h2>Rol<br><br>
                            <select class="form-control" name="rol" id="rol">
                                @foreach ($roles as $rol)
                                    <option value="{{$rol->rol}}">{{$rol->name}}</option>
                                @endforeach
                            </select>
                            </h2>
                            <h2>Correo<br><br>
                            <input class="form-control" type="text" name="email" value="{{$user->email}}" placeholder="Correo">
                            </h2>
                            <h2>Activo<br><br>
                            <input type="checkbox" name="status" id="status">
                            </h2>
                            <button class="btn_style" type="submit" class="form-submit">Guardar</button>
                        </form>
                    </div>
                </div>
                <script>
                    let status = document.getElementById('status');
                    let rol = document.getElementById('rol');
                    let stautsServer = @json(intval($user->status));
                    let rolServer = @json(intval($user->rol));

                    rol.value = rolServer;
                    if(stautsServer==1){
                        status.checked = "true";
                    }else if(stautsServer==0){
                        status.check = "false";
                    }
                    // console.log(rolServer);
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
                        width: 80%;
                        height: auto;
                        background: none;
                    }
                    .contenedor .card form{
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        gap: 30%;
                        margin-top: -20vh;
                    }
                    .contenedor input{
                        
                    }
                    .btn_style{
                    background: var(--primary);
                    width: 50%;
                    height: 50%;
                    transition-duration: 0.5s;
                    font-size: 20px;
                    }

                    .btn_style:hover{
                    background: var(--dark);
                    width: 50%;
                    height: 50%;
                    }
                </style>

                </div>
            </div>
        </div>
        <!-- Customers List End -->

    
    </div>
@endsection
