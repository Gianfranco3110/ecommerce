@extends('frontend.layoust.app')
{{-- <div class="modal fade" id="registrarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
    @section('content')
    
    <div class="modal-dialogr">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title " id="exampleModalLabel">Registrar</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body" >
                <form class="tooltip-end-bottom mb-3" action="{{route('register.store')}}" method="POST">
                    @csrf
                    <div class="row d-flex">
                        <div class="mb-3 filled form-group tooltip-end-top col-6">
                            <i data-acorn-icon="user"></i>
                            <input placeholder="Name" id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 filled form-group tooltip-end-top col-6">
                            <i data-acorn-icon="user"></i>
                            <input placeholder="Lastname" id="lastname" type="text"
                            class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                            value="{{ old('lastname') }}" required autocomplete="lastname" autofocus />
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 filled form-group tooltip-end-top col-6">
                            <i data-acorn-icon="email"></i>
                            <input placeholder="Email" id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="mb-3 filled form-group tooltip-end-top col-6">
                            <i data-acorn-icon="phone"></i>
                            <input placeholder="Whatsapp" id="whatsapp" type="text"
                            class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp"
                            value="{{ old('whatsapp') }}" required autocomplete="whatsapp" autofocus />
                            @error('whatsapp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                    </div>
                    
                    
                    
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="lock-off"></i>
                        <input placeholder="Password" / id="password" type="password"
                        class="form-control pe-7 @error('password') is-invalid @enderror" name="password" required
                        >
                        {{-- <a class="text-small position-absolute t-3 e-3" href="#">olvidó?</a> --}}
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    
                    <h4>Agregue dirección de Entrega</h4>
                    
                    <div class="row d-flex">
                        
                        <div class="mb-3 filled form-group tooltip-end-top col-6">
                            <i data-acorn-icon="user"></i>
                            <input placeholder="Nombre de dirección" id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" name="nameDireccion"
                            value="{{ old('name') }}" required autocomplete="name" autofocus />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                           <div class="mb-3 filled form-group tooltip-end-top col-6">
                            <i data-acorn-icon="user"></i>
                            <input placeholder="Codigo Postal" id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" name="codigoPostal"
                            value="{{ old('name') }}" required autocomplete="name" autofocus />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                          <div class="mb-3 filled form-group tooltip-end-top col-6">
                            <i data-acorn-icon="user"></i>
                         
                              <select class="form-control" name="pais" value="{{ old('name') }}" required autocomplete="pais" autofocus >
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
                        
                             <select class="form-control" name="estado" value="{{ old('estado') }}" required autocomplete="estado" autofocus >
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
                          
                            
                                            <select class="form-control" name="ciudad" value="{{ old('ciudad') }}" required autocomplete="ciudad" autofocus >
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
                      
                  
                   
                       
                    </div>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Detalles De Dirección</label>
                            <textarea class="form-control" rows="3" name="direccion" placeholder="Direccion/calle/casa"></textarea>
                        </div>
                    </div>
                    
                
                <button type="submit" class="mt-4 btn btn-lg btn-primary">Registrar</button>
            </form>
            {{-- <p class="justify-content-center d-flex">Ingresar con</p>
            <div class="row justify-content-center g-3 ">
                <div class="col-3">
                    
                    <button type="button col-12" class="btn  btn-outline-primary ">
                        <i class="fa fa-google d-inline"><p class="d-inline ms-3">Google</p></i>
                    </button>
                </div>
                <div class="col-3 mx-5">
                    
                    <button type="button col-12" class="btn  btn-outline-primary">
                        <i class="fa fa-facebook d-inline"><p class="d-inline ms-3">Facebook</p></i>
                    </button>
                </div>
            </div> --}}
            
            {{-- </div> --}}
            
        </div>
    </div>
</div>
{{-- FCM --}}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyB2OvMYM6PArnwEEvVoFr9WUQMp1NIL8TY",
        authDomain: "test-web-push-6bd0c.firebaseapp.com",
        // databaseURL: 'https://test-web-push-6bd0c-default-rtdb.firebaseio.com/',
        projectId: "test-web-push-6bd0c",
        storageBucket: "test-web-push-6bd0c.appspot.com",
        messagingSenderId: "873557969264",
        appId: "1:873557969264:web:6a789fefda70e88254a7b5",
        measurementId: "G-H3LS7VMM54"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    function startFCM() {
        console.log("hola mundo");
        messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function (response) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route("store.token") }}',
                    type: 'POST',
                    data: {
                        token: response
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert('Token stored.');
                    },
                    error: function (error) {
                        alert(error);
                    },
                });
            }).catch(function (error) {
                alert(error);
            });
    }
    
    messaging.onMessage(function (payload) {
        const title = payload.notification.title;
        const options = {
            body: payload.notification.body,
            link: payload.notification.link,
            // de aqui toma el icon la notificacion
            icon: payload.notification.icon,
        };
        new Notification(title, options);
        // console.log(title);
        console.log(payload);
    });
</script>

@endsection
