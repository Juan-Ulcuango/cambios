
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('transaccion_id') }}</label>
    <div>
        {{ Form::text('transaccion_id', $transaccion->transaccion_id, ['class' => 'form-control' .
        ($errors->has('transaccion_id') ? ' is-invalid' : ''), 'placeholder' => 'Transaccion Id']) }}
        {!! $errors->first('transaccion_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">transaccion <b>transaccion_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha_transaccion') }}</label>
    <div>
        {{ Form::date('fecha_transaccion', $transaccion->fecha_transaccion, ['class' => 'form-control' .
        ($errors->has('fecha_transaccion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Transaccion']) }}
        {!! $errors->first('fecha_transaccion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">transaccion <b>fecha_transaccion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('total_transaccion') }}</label>
    <div>
        {{ Form::text('total_transaccion', $transaccion->total_transaccion, ['class' => 'form-control' .
        ($errors->has('total_transaccion') ? ' is-invalid' : ''), 'placeholder' => 'Total Transaccion']) }}
        {!! $errors->first('total_transaccion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">transaccion <b>total_transaccion</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('metodo_pago') }}</label>
    <div>
        {{ Form::text('metodo_pago', $transaccion->metodo_pago, ['class' => 'form-control' .
        ($errors->has('metodo_pago') ? ' is-invalid' : ''), 'placeholder' => 'Metodo Pago']) }}
        {!! $errors->first('metodo_pago', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">transaccion <b>metodo_pago</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('tipo_transaccion') }}</label>
    <div>
        {{ Form::text('tipo_transaccion', $transaccion->tipo_transaccion, ['class' => 'form-control' .
        ($errors->has('tipo_transaccion') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Transaccion']) }}
        {!! $errors->first('tipo_transaccion', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">transaccion <b>tipo_transaccion</b> instruction.</small>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('transaccions.index') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
