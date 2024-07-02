<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('compra_id') }}</label>
    <div>
        {{ Form::text('compra_id', $compra->compra_id, ['class' => 'form-control' .
        ($errors->has('compra_id') ? ' is-invalid' : ''), 'placeholder' => 'Compra Id']) }}
        {!! $errors->first('compra_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha_compra') }}</label>
    <div>
        {{ Form::date('fecha_compra', $compra->fecha_compra, ['class' => 'form-control' .
        ($errors->has('fecha_compra') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Compra']) }}
        {!! $errors->first('fecha_compra', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('total_compra') }}</label>
    <div>
        {{ Form::text('total_compra', $compra->total_compra, ['class' => 'form-control' .
        ($errors->has('total_compra') ? ' is-invalid' : ''), 'placeholder' => 'Total Compra']) }}
        {!! $errors->first('total_compra', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('metodo_pago') }}</label>
    <div>
        {{ Form::text('metodo_pago', $compra->metodo_pago, ['class' => 'form-control' .
        ($errors->has('metodo_pago') ? ' is-invalid' : ''), 'placeholder' => 'Metodo Pago']) }}
        {!! $errors->first('metodo_pago', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('compras.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Guardar</button>
            </div>
        </div>
    </div>