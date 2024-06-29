<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transacción</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Transacción</h2>
            {{ Form::open(['route' => 'transaccions.store']) }}

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('transaccion_id', 'Transacción Id') }}</label>
                <div>
                    {{ Form::text('transaccion_id', $transaccion->transaccion_id, ['class' => 'form-control' . ($errors->has('transaccion_id') ? ' is-invalid' : ''), 'placeholder' => 'Transacción Id']) }}
                    {!! $errors->first('transaccion_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('fecha_transaccion', 'Fecha Transacción') }}</label>
                <div>
                    {{ Form::date('fecha_transaccion', $transaccion->fecha_transaccion, ['class' => 'form-control' . ($errors->has('fecha_transaccion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Transacción']) }}
                    {!! $errors->first('fecha_transaccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('total_transaccion', 'Total Transacción') }}</label>
                <div>
                    {{ Form::text('total_transaccion', $transaccion->total_transaccion, ['class' => 'form-control' . ($errors->has('total_transaccion') ? ' is-invalid' : ''), 'placeholder' => 'Total Transacción']) }}
                    {!! $errors->first('total_transaccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('metodo_pago', 'Método Pago') }}</label>
                <div>
                    {{ Form::text('metodo_pago', $transaccion->metodo_pago, ['class' => 'form-control' . ($errors->has('metodo_pago') ? ' is-invalid' : ''), 'placeholder' => 'Método Pago']) }}
                    {!! $errors->first('metodo_pago', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('tipo_transaccion', 'Tipo Transacción') }}</label>
                <div>
                    {{ Form::text('tipo_transaccion', $transaccion->tipo_transaccion, ['class' => 'form-control' . ($errors->has('tipo_transaccion') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Transacción']) }}
                    {!! $errors->first('tipo_transaccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="button-container">
                <a href="{{ route('transaccions.index') }}" class="register-button">Cancelar</a>
                <button type="submit" class="submit-button">Enviar</button>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</body>
</html>
