<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Compra</h2>
            {{ Form::open(['route' => 'compras.store']) }}

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('compra_id', 'Compra Id') }}</label>
                <div>
                    {{ Form::text('compra_id', $compra->compra_id, ['class' => 'form-control' . ($errors->has('compra_id') ? ' is-invalid' : ''), 'placeholder' => 'Compra Id']) }}
                    {!! $errors->first('compra_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('fecha_compra', 'Fecha Compra') }}</label>
                <div>
                    {{ Form::date('fecha_compra', $compra->fecha_compra, ['class' => 'form-control' . ($errors->has('fecha_compra') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Compra']) }}
                    {!! $errors->first('fecha_compra', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('total_compra', 'Total Compra') }}</label>
                <div>
                    {{ Form::text('total_compra', $compra->total_compra, ['class' => 'form-control' . ($errors->has('total_compra') ? ' is-invalid' : ''), 'placeholder' => 'Total Compra']) }}
                    {!! $errors->first('total_compra', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('metodo_pago', 'Método Pago') }}</label>
                <div>
                    {{ Form::text('metodo_pago', $compra->metodo_pago, ['class' => 'form-control' . ($errors->has('metodo_pago') ? ' is-invalid' : ''), 'placeholder' => 'Método Pago']) }}
                    {!! $errors->first('metodo_pago', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="button-container">
                <a href="{{ route('compras.index') }}" class="register-button">Cancelar</a>
                <button type="submit" class="submit-button">Enviar</button>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</body>
</html>
