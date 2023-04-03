@php
    $html_tag_data = [];
    $title = 'Fidelizacion';
    $description= 'Fidelizacion'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@if(Auth()->check())

@section('css')
    <link rel="stylesheet" href="/css/vendor/select2.min.css" />
    <link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css" />
@endsection

@section('js_vendor')
<script src="/js/vendor/select2.full.min.js"></script>

@endsection

@section('js_page')
    <script src="/js/cs/checkall.js"></script>
    <script src="/js/pages/customers.list.js"></script>
@endsection

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <!-- Customers List Start -->
        <h1>Editar Fidelizacion</h1>
        <h1 class="success">{{$message}}</h1>
        <div class="row">
            <div class="col-12 mb-0">
                <div id="checkboxTable">
                    <div class="contenedor">
                    <div class="card">
                        <form action="{{ route('fidel.update',['id'=>$cl->id]) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <h2>Nombre<br><br>
                                <input class="form-control" type="text" name="name" value="{{$cl->name}}" placeholder="Nombre" Required>
                                </h2>
                                <h2>Descripción<br><br>
                                    <input class="form-control" type="text" name="description" value="{{$cl->description}}" placeholder="Descripción" Required>
                                    </h2>
                                <h2>Monto<br><br>
                                    <input class="form-control" type="text" name="monto" value="{{$cl->monto}}" placeholder="monto" Required>
                                </h2>
                                 <h2>Puntos<br><br>
                                    <input class="form-control" type="text" name="points" value="{{$cl->points}}" placeholder="Puntos" Required>
                                </h2> 
                                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-6 mb-3">
                                     <!-- <div class="mb-3" >Todos los productos <input type="checkbox" name="productos[]" id="productos" value="{{$product}}"/></div> -->
                                    <label for="" class="mb-3">Productos </label>   
                                     <select class=" required form-control round" id="select2Producto" name="productos[]">
                                            @foreach ($product as $p)
                                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                            
                                    <label  class="checkbox-inline"for="">Activo<input type="checkbox" name="active" id="active" value="1"/></label>
                                    <div class="">
                                        <button class="btn btn-outline-primary ms-0 ms-sm-1 w-100 w-md-auto" type="submit" class="form-submit">Guardar</button>
                                    </div>
                        </form>
                    </div>
                </div>
                <script>
                  

                    let status = document.getElementById('status');
                    let stautsServer = @json(intval($cl->active));

                    if(stautsServer==1){
                        status.checked = "true";
                    }else if(stautsServer==0){
                        status.check = "false";
                    }

                    let ghostJson = document.getElementById('ghostJson');
                    let json;
                    let element=[];
                    let array=[];
                    let id;
                    checkboxs.addEventListener("change",(e)=>{
                    
                        if(e.target.checked == true){
                        element = e.target.value;
                        console.log(element);
                        id = e.target.id;
                        tmp= {
                        'id': id,
                        'elemento': element
                        };
                        array.push(tmp);
                        }else{
                        for (let i = 0; i < array.length; i++) {
                        if(e.target.id == array[i].id){
                            array.splice(i,1);
                        }           
                    }
                        }
                    console.log(array);
                    json = JSON.stringify(array);
                    console.log(json);
                    ghostJson.value=json;
                    });

                    let checking = document.querySelectorAll('.check');
                    let jsonCheck = @json($cl->productos);
                    jsonCheck = JSON.parse(jsonCheck);
                    console.log(jsonCheck);
                    for (let i = 0; i < checking.length; i++) {

                        for (let k = 0; k < jsonCheck.length; k++) {
                            if(checking[i].id==jsonCheck[k].id){
                                 console.log("encontrado");
                                 checking[i].checked=true;

                                    if(checking[i].checked == true){
                                        
                                    element = checking[i].value;
                                    console.log("este↓");
                                    console.log(element);
                                    id = checking[i].id;
                                    tmp= {
                                    'id': id,
                                    'elemento': element
                                    };
                                    array.push(tmp);
                                    }else{
                                    for (let i = 0; i < array.length; i++) {
                                    if(checking[i].id == array[i].id){
                                        array.splice(i,1);
                                    }           
                                         }
                                    }
                                    json = JSON.stringify(array);
                                    ghostJson.value=json;
                            }
                    }
                }
                </script>
                <style>
                      #checkboxs{
                        width: 300px;
                        height: 300px;
                        overflow-y: scroll;
                        display: flex;
                        flex-direction: column;
                    }
                    #checkboxs::-webkit-scrollbar {
                      display: none;
                    }
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
            </div>
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
@push('page-script')
<script>
    $(document).ready(function() {
                $('#select2Producto').select2({
                    multiple: true,
                });
            })
</script>
@endpush