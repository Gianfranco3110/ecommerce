<div class="box box-info padding-1">
    <div class="box-body row">
     
        <div class="form-group col-sm-6 mb-4">
            
            {{ Form::label('nombre','Nombre',['class'=>'mb-4']) }}
            {{ Form::text('nombre', $catalagoPremio->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-sm-6 mb-4">
            
            {{ Form::label('valorDescuento','Monto descuento',['class'=>'mb-4']) }}
            {{ Form::text('valorDescuento', $catalagoPremio->valorDescuento, ['class' => 'form-control' . ($errors->has('valorDescuento') ? ' is-invalid' : ''), 'placeholder' => 'Valordescuento']) }}
            {!! $errors->first('valorDescuento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-sm-6 mb-4">
            
            {{ Form::label('puntosValidar','Puntos Necesarios',['class'=>'mb-4']) }}
            {{ Form::text('puntosValidar', $catalagoPremio->puntosValidar, ['class' => 'form-control' . ($errors->has('puntosValidar') ? ' is-invalid' : ''), 'placeholder' => 'Puntosvalidar']) }}
            {!! $errors->first('puntosValidar', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-6 col-xl-6 col-xxl-4 mt-4">
            
            {!! Form::label('status', 'Activo:', ['class' => 'bold']) !!}
            <label class="checkbox-inline">
                {!! Form::hidden('status', 0) !!}
                {!! Form::checkbox('status', '1', null) !!}
            </label>
        </div>
        
        <div class="form-group  mb-5">
            <img src="/img/seo/default.png" id="picture2" alt="10" srcset="" width="150" class="img-thumbnail">
            
            {{Form::label('image2', 'Subir imagen', ['class'=>'mb-4'])}}
            <input type="file" name="image" class="" id="image2">
            
        </div>
    </div>
    <div class="box-footer mt20">
        {!! Form::submit('Guardar', ['class' => 'btn_style mt-5 offset-2 form-submit']) !!}
        
    </div>
</div>



<script>
    
    
    
    document.getElementById("image2").addEventListener('change',CambiarImagen2);
    
    function CambiarImagen2(event) {
        var file= event.target.files[0];
        var reader = new FileReader();
        reader.onload = (event)=>{
            document.getElementById('picture2').setAttribute('src',event.target.result);
        };
        reader.readAsDataURL(file);
    }
</script>