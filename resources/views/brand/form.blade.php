<div class="box box-info padding-1" style="font-size: 20px">
    <div class="box-body">

            <div class="form-group col-sm-6 mb-4">
            {{ Form::label('name','Marca',['class'=>'mb-4']) }}
            {{ Form::text('name',$brand->name,['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>


           <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-4 mt-4">

            {!! Form::label('status', 'Activo:', ['class' => 'bold']) !!}
            <label class="checkbox-inline">
                {!! Form::hidden('status', 0) !!}
                {!! Form::checkbox('status', '1',$brand->status, null) !!}
            </label>
        </div>
        <div class="w-100 mt-5">
            {!! Form::submit('Guardar', ['class' => 'btn btn-success form-submit']) !!}

        </div>

    </div>
     {{-- {!! Form::submit('Guardar', ['class' => 'btn_style mt-5 offset-2 form-submit']) !!} --}}

</div>
