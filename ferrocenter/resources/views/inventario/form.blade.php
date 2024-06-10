
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('inventario_id') }}</label>
    <div>
        {{ Form::text('inventario_id', $inventario->inventario_id, ['class' => 'form-control' .
        ($errors->has('inventario_id') ? ' is-invalid' : ''), 'placeholder' => 'Inventario Id']) }}
        {!! $errors->first('inventario_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">inventario <b>inventario_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('stock') }}</label>
    <div>
        {{ Form::text('stock', $inventario->stock, ['class' => 'form-control' .
        ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock']) }}
        {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">inventario <b>stock</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha_movimiento') }}</label>
    <div>
        {{ Form::text('fecha_movimiento', $inventario->fecha_movimiento, ['class' => 'form-control' .
        ($errors->has('fecha_movimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Movimiento']) }}
        {!! $errors->first('fecha_movimiento', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">inventario <b>fecha_movimiento</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('tipo_movimiento') }}</label>
    <div>
        {{ Form::text('tipo_movimiento', $inventario->tipo_movimiento, ['class' => 'form-control' .
        ($errors->has('tipo_movimiento') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Movimiento']) }}
        {!! $errors->first('tipo_movimiento', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">inventario <b>tipo_movimiento</b> instruction.</small>
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
