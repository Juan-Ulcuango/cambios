
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('detallecompra_id') }}</label>
    <div>
        {{ Form::text('detallecompra_id', $detallecompra->detallecompra_id, ['class' => 'form-control' .
        ($errors->has('detallecompra_id') ? ' is-invalid' : ''), 'placeholder' => 'Detallecompra Id']) }}
        {!! $errors->first('detallecompra_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">detallecompra <b>detallecompra_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('precio_unitario') }}</label>
    <div>
        {{ Form::text('precio_unitario', $detallecompra->precio_unitario, ['class' => 'form-control' .
        ($errors->has('precio_unitario') ? ' is-invalid' : ''), 'placeholder' => 'Precio Unitario']) }}
        {!! $errors->first('precio_unitario', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">detallecompra <b>precio_unitario</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cantidad') }}</label>
    <div>
        {{ Form::text('cantidad', $detallecompra->cantidad, ['class' => 'form-control' .
        ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
        {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">detallecompra <b>cantidad</b> instruction.</small>
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
