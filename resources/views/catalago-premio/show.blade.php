@extends('layouts.app')

@section('template_title')
    {{ $catalagoPremio->name ?? 'Show Catalago Premio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Catalago Premio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('catalago-premios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $catalagoPremio->image }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $catalagoPremio->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Valordescuento:</strong>
                            {{ $catalagoPremio->valorDescuento }}
                        </div>
                        <div class="form-group">
                            <strong>Puntosvalidar:</strong>
                            {{ $catalagoPremio->puntosValidar }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $catalagoPremio->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
