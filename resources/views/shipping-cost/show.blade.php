@extends('layouts.app')

@section('template_title')
    {{ $shippingCost->name ?? 'Show Shipping Cost' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Shipping Cost</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('shipping-costs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Ciudad Origen:</strong>
                            {{ $shippingCost->ciudad_origen }}
                        </div>
                        <div class="form-group">
                            <strong>Ciudad Destino:</strong>
                            {{ $shippingCost->ciudad_destino }}
                        </div>
                        <div class="form-group">
                            <strong>Valor:</strong>
                            {{ $shippingCost->valor }}
                        </div>
                        <div class="form-group">
                            <strong>Valordescuento:</strong>
                            {{ $shippingCost->valorDescuento }}
                        </div>
                        <div class="form-group">
                            <strong>Valorcompra:</strong>
                            {{ $shippingCost->valorCompra }}
                        </div>
                        <div class="form-group">
                            <strong>Tipodescuento:</strong>
                            {{ $shippingCost->tipoDescuento }}
                        </div>
                        <div class="form-group">
                            <strong>Active:</strong>
                            {{ $shippingCost->active }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
