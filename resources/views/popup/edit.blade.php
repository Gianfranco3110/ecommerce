@php
$html_tag_data = [];
$title = 'pop';
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



<div class="row">
    <div class="col-md-12">
        
        @includeif('partials.errors')
        
        <div class="card card-default">
            <div class="card-header">
                <h1 class="card-title">Editar POPUP</h1>
            </div>
            
            

            {!! Form::model(  $pop , ['route' => ['spop.update',   $pop ->id], 'method' => 'patch', 'enctype'=>"multipart/form-data"]) !!}

                @method('PATCH')
                @csrf
                
                
                <div class="box box-info padding-1" >
                    <div class="box-body row px-4" >
                        
                        <div class="form-group col-sm-6 mb-4 mt-2">
                            {{ Form::label('header','Cabezera',['class'=>'mb-4']) }}
                            {{ Form::text('header',null,['class' => 'form-control' . ($errors->has('header') ? ' is-invalid' : ''), 'placeholder' => 'header']) }}
                            {!! $errors->first('header', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        
                        
                        <div class="form-group col-sm-6 mb-4 mt-2">
                            {{ Form::label('body','Cuerpo',['class'=>'mb-4']) }}
                            {{ Form::text('body',null,['class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''), 'placeholder' => 'descripcion']) }}
                            {!! $errors->first('body', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        
                      
                        
                        <div class="form-group col-sm-6 mb-4 mt-2">
                            {{ Form::label('footer','Pie',['class'=>'mb-4']) }}
                            {{ Form::text('footer',null,['class' => 'form-control' . ($errors->has('footer') ? ' is-invalid' : ''), 'placeholder' => 'Google_analytics']) }}
                            {!! $errors->first('footer', '<div class="invalid-feedback">:message</div>') !!}
                        </div>


                           <div class="form-group  mb-5">
                                    <img src="/img/seo/default.png" id="picture2" alt="10" srcset="" width="150" class="img-thumbnail">

                                    {{Form::label('image', 'Subir Imagen', ['class'=>'mb-4'])}}
                                    <input type="file" name="image" class="" id="image">

                                </div>
                    </div>
                    
                </div>
                
                
                
                
                
                {!! Form::submit('Guardar', ['class' => 'btn_style mt-4 mb-3 offset-2 form-submit']) !!}
                
            </form>
        </div>
    </div>
    
</form>
</div>
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