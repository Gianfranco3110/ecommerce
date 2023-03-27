@php
$html_tag_data = [];
$title = 'Editar Status';
$description= 'Pagina para editar el status de una orden'
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
    <!-- Title and Top Buttons Start -->
    <!-- Customers List Start -->
    <h1>Editar Status</h1>
    {{-- <h1 class="success">{{$message}}</h1> --}}
    <div class="row">
        <div class="col-12 mb-0">
            <div id="checkboxTable">
                <div class="contenedor">
                    <div class="card">
                        {!! Form::model($sale, ['route' => ['update.orders', $sale->id], 'method' => 'PUT']) !!}
                        
                        @csrf
                        @method('PUT')
                        {{-- {{dd($sale->status)}} --}}
                        
                        
                        <div class="box box-info padding-1">
                            <div class="box-body row px-3">
                                
                                <div class="form-group col-sm-6 mb-4 mt-4">
                                    {{ Form::label('status','Estatus',['class'=>'mb-4']) }}
                                    {!! Form::select('status', [
                                    'Orden en Proceso' => 'Orden en Proceso',
                                    'Empaquetada' => 'Empaquetada',
                                    'Enviada' => 'Enviada',
                                    'Entregada' => 'Entregada',
                                    
                                    
                                    ], null,['class' => 'form-control']) !!}
                                    
                                </div>
                            </div>
                            
                            
                            
                            
                                {!! Form::submit('Guardar', ['class' => 'btn_style mt-5 offset-2 form-submit mb-3']) !!}

                        </form>
                    </div>
                </div>
                <script>
                </script>
                
                
            </div>
        </div>
    </div>
    <!-- Customers List End -->
    
    
</div>
{{-- 
    <script>
        let status = document.getElementById('status');
        console.log(@json($subcat->status));
        let statusServer = @json($subcat->status);
        if(statusServer==1){
            status.checked=true;
        }
        
        document.getElementById("image2").addEventListener('change',CambiarImagen2);
        
        function CambiarImagen2(event) {
            var file= event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event)=>{
                document.getElementById('picture2').setAttribute('src',event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script> --}}
    
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