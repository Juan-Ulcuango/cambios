
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('proveedor_id') }}</label>
    <div>
        {{ Form::text('proveedor_id', $proveedore->proveedor_id, ['class' => 'form-control' .
        ($errors->has('proveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor Id']) }}
        {!! $errors->first('proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">proveedore <b>proveedor_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre_proveedor') }}</label>
    <div>
        {{ Form::text('nombre_proveedor', $proveedore->nombre_proveedor, ['class' => 'form-control' .
        ($errors->has('nombre_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Proveedor']) }}
        {!! $errors->first('nombre_proveedor', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">proveedore <b>nombre_proveedor</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('direccion_proveedor') }}</label>
    <div>
        {{ Form::text('direccion_proveedor', $proveedore->direccion_proveedor, ['class' => 'form-control' .
        ($errors->has('direccion_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Direccion Proveedor']) }}
        {!! $errors->first('direccion_proveedor', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">proveedore <b>direccion_proveedor</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('telefono_proveedor') }}</label>
    <div>
        {{ Form::text('telefono_proveedor', $proveedore->telefono_proveedor, ['class' => 'form-control' .
        ($errors->has('telefono_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Proveedor']) }}
        {!! $errors->first('telefono_proveedor', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">proveedore <b>telefono_proveedor</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('email_proveedor') }}</label>
    <div>
        {{ Form::text('email_proveedor', $proveedore->email_proveedor, ['class' => 'form-control' .
        ($errors->has('email_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Email Proveedor']) }}
        {!! $errors->first('email_proveedor', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">proveedore <b>email_proveedor</b> instruction.</small>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
