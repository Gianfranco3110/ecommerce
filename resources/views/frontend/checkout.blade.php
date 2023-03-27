
@extends('frontend.layoust.app')

@section('css')
<link rel="stylesheet" href="/css/vendor/select2.min.css"/>
<link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css"/>
@endsection

@section('js_vendor')
<script src="/js/vendor/select2.full.min.js"></script>

@endsection

@section('js_page')
@endsection
<style>
    .checkeable input {
        display: none;
    }
    .checkeable img {
        width: 100px;
        border: 5px solid transparent;
    }
    .checkeable input {
        display: none;
    }
    .checkeable input:checked  + img {
        border-color: #1ea8e7;
    }
</style>


@if  (sizeof(Cart::getContent()) > 0)
@section('content')
<div class="container">
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row">
            <!-- Title Start -->
            <div class="col-auto mb-3 mb-md-0 me-auto">
                <div class="w-auto sw-md-30">
                    <a href="/tienda" class="muted-link pb-1 d-inline-block breadcrumb-back">
                        <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                        <span class="text-small align-middle">Tienda</span>
                    </a>
                    <h1 class="mb-0 pb-0 display-4" id="title"></h1>
                </div>
            </div>
            <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->
    
    <div class="row">
        <div class="col-12 col-lg order-1 order-lg-0">
            <h2 class="small-title">Datos Para el pago</h2>

                     <form action="{{ route('factura') }}" method="post" class="tooltip-label-end" >

                            @csrf
            
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nombre</label>
                                <input class="form-control" name=""  value="{{ auth()->user()->name }}"  readonly/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Apellido</label>
                                <input class="form-control" name="" value="{{ auth()->user()->last_name }}" readonly />
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Telefono</label>
                                <input class="form-control" name="" value="{{ auth()->user()->whatsapp }}" readonly/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Seleccione Direccion de Entrega</label>
                                
                                <select class="form-control" id="direccionEntrega" name="direccionEntrega" required value="{{ old('name') }}" autocomplete="direccionEntrega" autofocus  >
                                    <option value=""></option>
                                    @foreach ($deliveryAddress as $delivery )
                                    <option value="{{$delivery->id}}">{{$delivery->name}}</option>
                                    
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        <div class="row g-3">
                            
                            
                            
                        </div>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Detalles</label>
                                <textarea class="form-control" rows="3" name="addressDetail" required ></textarea>
                            </div>
                        </div>
                        
                        <label class="mt-4 form-label">Desea Agregar Nueva Direccion de entrega</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="checkAddress" id="newAddress" />
                            <label class="form-check-label" for="stackedRadio1">Si</label>
                        </div>
                        
                        <div class="row" style="display: none" id="divAgregarDire">
                            
                            <div class="mb-3 filled form-group tooltip-end-top col-6">
                                <i data-acorn-icon="user"></i>
                                <input placeholder="Nombre de dirección" id="nameDireccionid" type="text"
                                class="form-control @error('nameDireccion') is-invalid @enderror" 
                                value="{{ old('nameDireccion') }}" autocomplete="nameDireccion" autofocus />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div class="mb-3 filled form-group tooltip-end-top col-6">
                                <i data-acorn-icon="user"></i>
                                <input placeholder="Codigo Postal"  type="text"
                                class="form-control @error('name') is-invalid @enderror" 
                                value="{{ old('name') }}" id="codigoPostalid" autocomplete="name" autofocus />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div class="mb-3 filled form-group tooltip-end-top col-6">
                                <i data-acorn-icon="user"></i>
                                
                                <select class="form-control" value="{{ old('pais') }}" id="selectPais" autocomplete="pais" autofocus >
                                    {{-- <option label="&nbsp;"></option> --}}
                                    
                                    <option value="{{$paises->name}}">{{$paises->name}}</option>
                                    
                                </select>
                                
                                
                                
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div class="mb-3 filled form-group tooltip-end-top col-6">
                                
                                <i data-acorn-icon="user"></i>
                                
                                <select class="form-control"  value="{{ old('estado') }}" id="selectEstado" autocomplete="estado" autofocus >
                                    {{-- <option label="&nbsp;"></option> --}}
                                    
                                    @foreach ($estados as $estado )
                                    <option value="{{$estado->name}}">{{$estado->name}}</option>
                                    
                                    @endforeach
                                    
                                </select>
                                
                                
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label for="ciudad" class="">Ciudad</label>
                            
                            <div class="mb-3 filled form-group tooltip-end-top col-6">
                                
                                <i data-acorn-icon="user"></i>
                                
                                
                                <select class="form-control"  value="{{ old('ciudad') }}" id="selectCiudad" autocomplete="ciudad" autofocus >
                                    {{-- <option label="&nbsp;"></option> --}}
                                    
                                    @foreach ($ciudades as $ciudad )
                                    <option value="{{$ciudad->name}}">{{$ciudad->name}}</option>
                                    
                                    @endforeach
                                    
                                </select>
                                
                                
                                
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            
                            
                            
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Detalles De Dirección</label>
                                    <textarea class="form-control" rows="3"   id="detallesDireccion"placeholder="Direccion/calle/casa"></textarea>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <a  onclick="addDireccion()" id="buttonAgregar" class="mt-4  btn btn-icon btn-icon-end btn-primary w-100 sw-sm-20 " type="button">
                                    <span>Guardar Dirección</span>
                                    <i data-acorn-icon="chevron-right"></i>
                                </a>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            
            {{-- <h2 class="small-title">Metodo de entrega</h2>
           
                <div class="card mb-5">
                    <div class="card-body">
                        <label class="form-label">Codigo Postal</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="stackedRadio" id="stackedRadio1" />
                            <label class="form-check-label" for="stackedRadio1">Free standard delivery</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="stackedRadio" id="stackedRadio2" />
                            <label class="form-check-label" for="stackedRadio2">Same day delivery for $12.00</label>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form> --}}
            
            <h2 class="small-title">Cupon De Descuento</h2>
                <div class="card mb-5">
                    <div class="card-body">
                        <label class="form-label">Ingrese Un Cupon De descuento Si poseé y presione el boton para validarlo</label>
                        <div class="row g-3">
                            <div class="col-sm-auto mb-3">
                                <label class="form-label">Numero de Cupon</label>
                                <input class="form-control w-100 sw-sm-60" name="cupon" type="text" id="cuponId" />
                            </div>
                            <div class="col-sm-auto mb-3" style="display:none " id="validado">
                                <p >Cupon Validado se aplicara un descuento de <span id="textoValido"></span> </p>
                                <img src="{{ asset('img/validado.jpeg') }}" width="30px" height="30px" alt="">
                            </div>
                            <div class="col-sm-auto mb-3" style="display:none" id="rechazado">
                                <p>Cupon No valido o Ya usado</p>
                                <img src="{{ asset('img/rechazado.webp') }}" width="30px" height="30px" alt="">
                            </div>
                            <label class="form-label"></label>
                            
                            <a onclick="evaluarCupon()" class="btn btn-icon btn-icon-end btn-primary w-100 sw-sm-20 " type="button">
                                <span>Validar Cupon</span>
                                <i data-acorn-icon="chevron-right"></i>
                            </a>
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>
                </div>
            
            <div class="row">
                
                
                
                <div class="col-6">
            <h2 class="small-title">Catalago de Premios</h2></h2>

                    <div class="card mb-5  row">
                        <div class="card-body">
                            @foreach ($catalagos as $catalago )
                            <label class="checkeable">
                                <input type="radio" name="catalago" value="{{ $catalago->id }}" id="radioPremio" onclick="evaluarPremio({{$catalago->id}})">
                                <img class="img-thumbnail img-fluid" src="../storage/{{$catalago->image}}" class="img-thumbnail"  style="width: 120px;height:120px">
                                <p class="text-center">{{ $catalago->puntosValidar }}Pts</p>
                                
                            </label>

                      
                            @endforeach
                            
                            
                                         
                            
                           
                            
                        </div>
                        
                    </div>
                    
                    
                    
                </div>
                <div class="col-6">
            <h2 class="small-title">Puntos Del Cliente</h2></h2>

                    <div class="card mb-5">
                        <div class="card-body row">
                            <div class="col-4">
                                <p style="font-size: 4.9em;color:#1ea8e7" id="puntos">{{ auth()->user()->points }} </p>
                                
                                <p>Puntos Disponibles</p>
                            </div>
                            <div class="col-4 text-end">
                                <p style="font-size: 4.9em;color:#1ea8e7" id="puntosCanjeados">{{ auth()->user()->pointsCanjeado }}</p>
                                <p>Puntos Canjeados</p>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                        </div>
                        
                    </div>
                    
                    
                    
                </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            <h2 class="small-title">Metodo de pago</h2></h2>
            <div class="card mb-5">
                <div class="card-body">
                    
                    
                    <label class="checkeable">
                        <input type="radio" name="metodo" value="efectivo" checked>
                        <img src="{{asset('img/efectivo.webp')}}" style="width: 120px;height:120px">
                    </label>
                    
                    <label class="ml-4 checkeable">
                        <input type="radio" name="metodo" value="stripe">
                        <img src="{{asset('img/stripe.webp')}}" style="width: 120px;height:120px">
                    </label>
                    
                    
                    
                </div>
            </div>
        </div>
        
        <div class="col-12 col-lg-auto order-0 order-lg-1">
            <!-- Summary Start -->
            <h2 class="small-title">Resumen</h2>
            <div class="card mb-5 w-100 sw-lg-35">
                <div class="card-body mb-n5">
                    <div class="mb-3">
                        <div class="mb-2">
                            <p class="text-small text-muted mb-1">ITEMS</p>
                            <p>
                                <span class="text-alternate">@include('frontend.estado')</span>
                            </p>
                        </div>
                        <div class="mb-2">
                            <p class="text-small text-muted mb-1">Sub Total</p>
                            <p>
                                <span class="text-alternate">
                                    <span class="text-small text-muted">$</span>
                                       <span id="subTotal">   
                                    {{number_format(Cart::getSubTotal(),2)}}
                                    </span>
                                </span>
                            </p>
                        </div>
                        <div class="mb-2">
                            <p class="text-small text-muted mb-1">Costo de Envio</p>
                            <p>
                                <span class="text-alternate" id="">
                                    <span class="text-small text-muted">$</span>
                                    <span id="shippingCost">                                 
                                       0
                                    </span>
                                    
                                </span>
                            </p>
                        </div>
                        <div class="mb-2">
                            <p class="text-small text-muted mb-1">Descuento</p>
                            <p>
                                <span class="text-alternate" >
                                    <span class="text-small text-muted">$ -</span>
                                    <span id="descuento">
                                        0             
                                    </span>
                                </span>
                            </p>
                        </div>
                            <div class="mb-2">
                            <p class="text-small text-muted mb-1">Descuento Por Premios</p>
                            <p>
                                <span class="text-alternate" >
                                    <span class="text-small text-muted">$ -</span>
                                    <span id="descuentoPremios">
                                        0             
                                    </span>
                                </span>
                            </p>
                        </div>
                        <div class="mb-2">
                            <p class="text-small text-muted mb-1" >GRAND TOTAL</p>
                            <div class="cta-2">
                                <span >
                                    <span class="text-small text-muted cta-2" >$</span>
                                    <span id="grandTotal">
                                        {{number_format(Cart::getSubTotal(),2)}}  
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value=" {{number_format(Cart::getSubTotal(),2)}}" id="total">
                    <div class="form-check mb-4">
                        <input type="checkbox" class="form-check-input" id="customCheck1" />
                        <label class="form-check-label" for="customCheck1">
                            He leidon y acepto los terminos
                            <a href="#" target="_blank">terminos y condiciones.</a>
                        </label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-flex flex-column flex-sm-row justify-content-between mb-5 w-100">
                            <button class="btn btn-icon btn-icon-end btn-primary w-100" type="submit">
                                <span>Pagar</span>
                                <i data-acorn-icon="chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <!-- Summary End -->
        </div>
    </div>
</div>

@push('page-script')
<script>
    var miCheckbox = document.getElementById('newAddress');
    var div = document.getElementById('divAgregarDire');
    var shippingCost = document.getElementById("shippingCost");
    var texto = document.getElementById("textoValido");
    var descuento = document.getElementById("descuento");
    var total = document.getElementById("total");
    
    
    
    
    
    
    
    
    $(document).ready(function() {
        
        miCheckbox.addEventListener('click', function() {
            
            
            
            if (miCheckbox.checked) {
                
                
                div.style.display = "flex";
                document.getElementById("selectCiudad").required = true
                document.getElementById("selectEstado").required =true;
                document.getElementById("selectPais").required =true;
                document.getElementById("codigoPostalid").required =true;
                document.getElementById("nameDireccionid").required =true;
                document.getElementById("detallesDireccion").required =true;
                
                
            } else {
                
                div.style.display= "none";
                document.getElementById("selectCiudad").required = false;
                document.getElementById("selectEstado").required = false;
                document.getElementById("selectPais").required = false;
                document.getElementById("codigoPostalid").required = false;
                document.getElementById("nameDireccionid").required = false;
                document.getElementById("detallesDireccion").required =false;
                
                
                
            }
        });
        
        
    });
    
    $(document).ready(function() {
        $('#direccionEntrega').on('change', function() {
            var selectValor = $(this).val();
            
            
            const data = {
                id:selectValor,
                
            }
            
            
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            
            $.ajax({
                url: "{{ route('totalShippingCost') }}",
                
                type: 'GET',
                dataType: 'json',
                data: data,
                
                success: function(response) {
                    

                    shippingCost.innerHTML = response.data;
                    sumartTotales()
                    
                    
                    
                    
                },
                error: function() {
                    console.log(response);
                    alert('Error');
                    
                }
            });
            
            
        });
    });
    
    
    
    function addDireccion() {
        
        var name = document.getElementById("nameDireccionid").value;
        var estado = document.getElementById("selectEstado").value;
        
        var pais = document.getElementById("selectPais").value;
        
        var codigoPostal = document.getElementById("codigoPostalid").value;
        
        var ciudad = document.getElementById("selectCiudad").value;
        
        var  direccion = document.getElementById("detallesDireccion").value;
        
        
        
        if(name =="")
        {
            return alert('Complete todos los campos para agregar la nueva direccion');
        }else{
            
            const data = {
                name:name,
                estado:estado,
                pais:pais,
                codigoPostal:codigoPostal,
                ciudad:ciudad,
                direccion:direccion
            }
            
            
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            
            $.ajax({
                url: "{{ route('newDireccion') }}",
                
                type: 'PUT',
                dataType: 'json',
                data: data,
                
                success: function(response) {
                    
                    console.log(response.data);
                    window.location.reload()
                    alert('Se a registrado correctamente la nueva direccion puede Selecionarla');
                    
                },
                error: function() {
                    console.log(response);
                }
            });
            
            
            
            
        }
    }
    
    function evaluarCupon()
    {
        
        
        
        var cupon = document.getElementById("cuponId").value;
    var grandTotal = document.getElementById("grandTotal");

        
        
        
        
        if(cupon=="")
        {
            return alert('El campo numero cupon esta vacio no se puede consultar')
        }else{
            
            const data = {
                cupon:cupon,
                
            }
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                url: "{{ route('evaluarCupon') }}",
                
                type: 'GET',
                dataType: 'json',
                data: data,
                
                success: function(response) {
                    if(response.data == null)
                    {
                        $('#rechazado').show();
                        $('#validado').hide();
                            descuento.innerHTML=0;

                           sumartTotales()
                        
                        
                        
                    }else{
                        
                        $('#rechazado').hide();
                        $('#validado').show();
                        
                        if(response.data.type == "total_amount")
                        {
                            texto.innerHTML =response.data.amount +"$ del monto total"
                            descuento.innerHTML=response.data.amount;
                           sumartTotales()
                            
                        }else{
                            texto.innerHTML =response.data.amount +"% del monto total"
                            d = grandTotal.innerHTML *(response.data.amount/100);
                            descuento.innerHTML=d;
                            
                            
                           sumartTotales()
                            
                            
                        }
                        
                        
                        
                    }
                    
                    
                    
                },
                error: function() {
                    console.log(response);
                }
            });
            
        }
        
        
        
        
        
        
        
        
        
    }

     function evaluarPremio(id)
    {
        var puntos = document.getElementById("puntos");

        var puntosCanjeados = document.getElementById("puntosCanjeados");
        var descuento = document.getElementById("descuentoPremios");




                


        console.log(id);
        
        
    
            
            const data = {
                id:id,
                
            }
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                url: "{{ route('evaluarPremio') }}",
                
                type: 'GET',
                dataType: 'json',
                data: data,
                
                success: function(response) {

                    if(response.validado ==true)
                    {
                        valor = response.points - response.data.puntosValidar
                        puntos.innerHTML =valor;
                        puntosCanjeados.innerHTML =response.data.puntosValidar;
                        descuentoPremios.innerHTML = response.data.valorDescuento;
                        sumartTotales();

                        alert('Puede canjear sus puntos por este Premio')
                    }else{
                        puntos.innerHTML = response.points;
                        puntosCanjeados.innerHTML =response.pointsCanjeados;
                        descuentoPremios.innerHTML = 0;
                        sumartTotales();


                        alert('Sus puntos no son suficiente para este Premio')

                    }
                
                    
                    
                },
                error: function() {
                    console.log(response);
                }
            });
            
        }
        
        
        
        
        
       function sumartTotales()
       {
    var descuento = document.getElementById("descuento");
    var subTotal = document.getElementById("subTotal");
    var grandTotal = document.getElementById("grandTotal");
    var descuentoPremios = document.getElementById("descuentoPremios");


    var shippingCost = document.getElementById("shippingCost");
    var total = eval(subTotal.innerHTML) - eval(descuento.innerHTML) + eval(shippingCost.innerHTML) - eval(descuentoPremios.innerHTML)

    grandTotal.innerHTML = total;



       } 
        
        
        
     $(document).ready(function() {
    $('#direccionEntrega').select2({
      
      placeholder: 'seleccione',

    });




  })
    
</script>



@endpush

@endsection

@else
@section('content')
<div class="container">
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row">
            <!-- Title Start -->
            <div class="col-auto mb-3 mb-md-0 me-auto">
                <div class="w-auto sw-md-30">
                    <a href="/tienda" class="muted-link pb-1 d-inline-block breadcrumb-back">
                        <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                        <span class="text-small align-middle">Tienda</span>
                    </a>
                    <h1 class="mb-0 pb-0 display-4" id="title"></h1>
                </div>
            </div>
            <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->
    
    <div class="row text-center" style="font-size:2em">
        <div class="col-12 col-lg order-1 order-lg-0">
            <h1 class="small-title">No posee Productos en el Carrito</h1>
            
            
            
            
            
            
        </div>
        
        
    </div>
</div>

@endsection




@endif



