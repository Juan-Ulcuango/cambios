<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('transaccion_id', 'Transacción ID') }}</label>
    <div>
        {{ Form::text('transaccion_id', $transaccion->transaccion_id ?? '', ['class' => 'form-control' . ($errors->has('transaccion_id') ? ' is-invalid' : ''), 'placeholder' => 'Transaccion Id']) }}
        {!! $errors->first('transaccion_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('fecha_transaccion', 'Fecha Transacción') }}</label>
    <div>
        {{ Form::date('fecha_transaccion', $transaccion->fecha_transaccion ?? '', ['class' => 'form-control' . ($errors->has('fecha_transaccion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Transacción']) }}
        {!! $errors->first('fecha_transaccion', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('total_transaccion', 'Total Transacción') }}</label>
    <div>
        {{ Form::text('total_transaccion', $transaccion->total_transaccion ?? '', ['class' => 'form-control' . ($errors->has('total_transaccion') ? ' is-invalid' : ''), 'placeholder' => 'Total Transacción', 'readonly' => 'readonly']) }}
        {!! $errors->first('total_transaccion', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('metodo_pago', 'Método de Pago') }}</label>
    <div>
        {{ Form::text('metodo_pago', $transaccion->metodo_pago ?? '', ['class' => 'form-control' . ($errors->has('metodo_pago') ? ' is-invalid' : ''), 'placeholder' => 'Método de Pago']) }}
        {!! $errors->first('metodo_pago', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('tipo_transaccion', 'Tipo de Transacción') }}</label>
    <div>
        {{ Form::text('tipo_transaccion', $transaccion->tipo_transaccion ?? '', ['class' => 'form-control' . ($errors->has('tipo_transaccion') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de Transacción']) }}
        {!! $errors->first('tipo_transaccion', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group">
    <label for="cliente_id">Cliente:</label>
    <select name="cliente_id" class="form-control">
        <option value="">-- Selecciona un cliente --</option>
        @foreach ($clientes as $cliente)
            <option value="{{ $cliente->cliente_id }}">
                {{ $cliente->nombre_cliente }} {{ $cliente->apellido_cliente }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="{{ route('transaccions.index') }}" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary ms-auto">Guardar</button>
        </div>
    </div>
</div>
