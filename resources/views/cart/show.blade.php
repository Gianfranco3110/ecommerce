@extends('layouts.app')

@section('template_title')
    {{ $cart->name ?? 'Show Cart' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cart</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('carts.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Code:</strong>
                            {{ $cart->code }}
                        </div>
                        <div class="form-group">
                            <strong>Order Date:</strong>
                            {{ $cart->order_date }}
                        </div>
                        <div class="form-group">
                            <strong>Arrived Date:</strong>
                            {{ $cart->arrived_date }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $cart->status }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $cart->total }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $cart->user_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
