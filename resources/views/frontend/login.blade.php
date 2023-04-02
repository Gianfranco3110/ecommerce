<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title " id="exampleModalLabel">Ingresar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="tooltip-end-bottom mb-3" action="{{route('user.login')}}" method="POST">
                    @csrf
                    <div class="mb-3 filled form-group tooltip-end-top">
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
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="lock-off"></i>
                        <input placeholder="Password" / id="password" type="password"
                            class="form-control pe-7 @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
                        <a class="text-small position-absolute t-3 e-3 btn_olvido_contraseña" data-bs-toggle="modal" data-bs-target="#moda_change_pass" data-bs-whatever="@mdo" href="#">olvidó?</a>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="col-5 btn btn-lg btn-primary">Ingresar</button>
                        <button type="button" class="col-5 btn btn-lg btn-primary"><a class="text-white" href="{{route('register.crate')}}">
                            Registrar
                        </a>
                        </button>
                    </div>
                </form>
                <p class="justify-content-center d-flex">Ingresar con</p>
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
                </div>

            </div>

        </div>
    </div>
</div>
<script>
$('.btn_olvido_contraseña').on('click',()=>{
    console.log("HOla");
    $('#exampleModal').modal('hide');
});
</script>
