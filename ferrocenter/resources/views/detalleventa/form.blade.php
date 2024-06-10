
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('detalleventa_id') }}</label>
    <div>
        {{ Form::text('detalleventa_id', $detalleventa->detalleventa_id, ['class' => 'form-control' .
        ($errors->has('detalleventa_id') ? ' is-invalid' : ''), 'placeholder' => 'Detalleventa Id']) }}
        {!! $errors->first('detalleventa_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">detalleventa <b>detalleventa_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('precio_venta_unidad') }}</label>
    <div>
        {{ Form::text('precio_venta_unidad', $detalleventa->precio_venta_unidad, ['class' => 'form-control' .
        ($errors->has('precio_venta_unidad') ? ' is-invalid' : ''), 'placeholder' => 'Precio Venta Unidad']) }}
        {!! $errors->first('precio_venta_unidad', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">detalleventa <b>precio_venta_unidad</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('descuento') }}</label>
    <div>
        {{ Form::text('descuento', $detalleventa->descuento, ['class' => 'form-control' .
        ($errors->has('descuento') ? ' is-invalid' : ''), 'placeholder' => 'Descuento']) }}
        {!! $errors->first('descuento', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">detalleventa <b>descuento</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('impuesto') }}</label>
    <div>
        {{ Form::text('impuesto', $detalleventa->impuesto, ['class' => 'form-control' .
        ($errors->has('impuesto') ? ' is-invalid' : ''), 'placeholder' => 'Impuesto']) }}
        {!! $errors->first('impuesto', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">detalleventa <b>impuesto</b> instruction.</small>
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
