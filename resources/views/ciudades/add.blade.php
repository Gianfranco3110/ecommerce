@php
$html_tag_data = [];
$title = 'Añadir Ciudad';
$description= 'Añadiendo Ciudad'
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])
@if(Auth()->check())

@section('css')
<link rel="stylesheet" href="/css/vendor/select2.min.css"/>
<link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>
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
    <h1>{{$title}}</h1>
    <h1 class="success">{{$message}}</h1>
    <div class="row">
        <div class="col-12 mb-0">
            <div id="checkboxTable">
                <div class="contenedor">
                    <div class="card">
                        <form action="{{ route('city.store') }}" method="post">
                            @csrf
                            <div class="row p-4">
                                
                                
                                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-5 mb-4 mt-2">
                                    {!! Form::label('pais', "Selecione País",['class' => 'bold']) !!}
                                    {!! Form::select('pais', $country, null, ['placeholder'=>'seleccione','class' => 'select2 form-control round', 'id'=>'country']) !!}
                                </div>
                                
                                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-5 mb-4 mt-2">
                                    {!! Form::label('estado', "Estado",['class' => 'bold']) !!}
                                    <select class="select2 not-required form-control round" id="id_state" name="estado">
                                        <option value="">{{'seleccione'}}</option>
                                    </select>
                                </div> 
                                
                                
                                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-5 mb-4">
                                    {!! Form::label('city_id', "Ciudad",['class' => 'bold']) !!}
                                    <select class="select2Multiple required form-control round"id="ciudad" name="name[]" required>
                                    </select>
                                </div> 
                                
                                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-4 mt-4">
                                    
                                    {!! Form::label('status', 'Activo:', ['class' => 'bold']) !!}
                                    <label class="checkbox-inline">
                                        {!! Form::hidden('status', 0) !!}
                                        {!! Form::checkbox('status', '1', null) !!}
                                    </label>
                                </div>
                                
                            </div>
                            
                            
                            
                            
                    {!! Form::submit('Guardar', ['class' => 'btn_style mt-5 offset-2 form-submit']) !!}

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
        $('.select2').select2({

            
            
        });
        
    })

       $(document).ready(function() {
        $('.select2Multiple').select2({

              multiple: true,
            
            
        });
        
    })




     $(function() {
    $('#country').on('change', onSelectCountryChange);
  });

 function onSelectCountryChange() {
    var country_id = $(this).val();
    $.get('country/' + country_id + '/state', function(data) {
      var html_selects = ''
      if (data.length != 0) {
        html_selects = '<option value="">Seleccione estado</option>'
        for (var i = 0; i < data.length; ++i)
          html_selects += '<option   value="' + data[i].id + '">' + data[i].name + '</option>';
      } else {
        html_selects = '<option value="">Sin datos</option>'
      }
      $('#id_state').html(html_selects);
    });

  }

     $(function() {
    $('#id_state').on('change', onSelectStateChange);
  });

   function onSelectStateChange() {
    var state_id = $(this).val();
    $.get('state/' + state_id + '/city', function(data) {
      var html_selects = ''
      if (data.length != 0) {
        html_selects = '<option value="">Seleccione Ciudad</option>'
        for (var i = 0; i < data.length; ++i)
          html_selects += '<option   value="' + data[i].name + '">' + data[i].name + '</option>';
      } else {
        html_selects = '<option value="">Sin datos</option>'
      }
      $('#ciudad').html(html_selects);
    });

  }
</script>

@endpush


