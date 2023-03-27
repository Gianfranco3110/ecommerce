<div class="box box-info padding-1">
    <div class="box-body row">
        
        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('ciudad_origen','Ciudad De Origen',['class'=>'mb-4']) }}
            {{ Form::select('ciudad_origen',$ciudad,null, ['class' => 'form-control' . ($errors->has('ciudad_origen') ? ' is-invalid' : ''), 'placeholder' => 'Ciudad Origen']) }}
            {!! $errors->first('ciudad_origen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('ciudad_destino','Ciuadad De Destino',['class'=>'mb-4']) }}
            {{ Form::select('ciudad_destino',$ciudad,null, ['class' => 'form-control' . ($errors->has('ciudad_destino') ? ' is-invalid' : ''), 'placeholder' => 'Ciudad Destino']) }}
            {!! $errors->first('ciudad_destino', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('valor','Costo Del Envio',['class'=>'mb-4']) }}
            {{ Form::text('valor', $shippingCost->valor, ['class' => 'form-control' . ($errors->has('valor') ? ' is-invalid' : ''), 'placeholder' => 'Valor']) }}
            {!! $errors->first('valor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group col-sm-6 mb-4">
            {{ Form::label('valorDescuento','Descuento',['class'=>'mb-4']) }}
            {{ Form::text('valorDescuento', $shippingCost->valorDescuento, ['class' => 'form-control' . ($errors->has('valorDescuento') ? ' is-invalid' : ''), 'placeholder' => 'Valordescuento']) }}
            {!! $errors->first('valorDescuento', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        {{-- <div class="form-group col-sm-6 mb-4">
            {{ Form::label('valorCompra','Valor De Compra',['class'=>'mb-4']) }}
            {{ Form::text('valorCompra', $shippingCost->valorCompra, ['class' => 'form-control' . ($errors->has('valorCompra') ? ' is-invalid' : ''), 'placeholder' => 'Valorcompra']) }}
            {!! $errors->first('valorCompra', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}
        {{-- <div class="form-group col-sm-6 mb-4">
            {{ Form::label('tipoDescuento','Tipo De Descuento',['class'=>'mb-4']) }}
            {!! Form::select('tipoDescuento', [
            'porcentaje' => 'Porcentaje',
            'valorNeto' => 'valorNeto',
            
            ], null,['class' => 'form-control']) !!}
            
        </div> --}}
        
        
        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-4 mt-4">
            
            {!! Form::label('active', 'Activo:', ['class' => 'bold']) !!}
            <label class="checkbox-inline">
                {!! Form::hidden('active', 0) !!}
                {!! Form::checkbox('active', '1', null) !!}
            </label>
        </div>
    </div>
    {!! Form::submit('Guardar', ['class' => 'btn_style mt-5 offset-2 form-submit']) !!}
    
</div>