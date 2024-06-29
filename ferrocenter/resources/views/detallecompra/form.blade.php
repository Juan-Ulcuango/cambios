<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Compra</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Detalle Compra</h2>
            {{ Form::open(['route' => 'detallecompras.store']) }}

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('detallecompra_id', 'Detallecompra Id') }}</label>
                <div>
                    {{ Form::text('detallecompra_id', $detallecompra->detallecompra_id, ['class' => 'form-control' . ($errors->has('detallecompra_id') ? ' is-invalid' : ''), 'placeholder' => 'Detallecompra Id']) }}
                    {!! $errors->first('detallecompra_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('precio_unitario', 'Precio Unitario') }}</label>
                <div>
                    {{ Form::text('precio_unitario', $detallecompra->precio_unitario, ['class' => 'form-control' . ($errors->has('precio_unitario') ? ' is-invalid' : ''), 'placeholder' => 'Precio Unitario']) }}
                    {!! $errors->first('precio_unitario', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('cantidad', 'Cantidad') }}</label>
                <div>
                    {{ Form::text('cantidad', $detallecompra->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
                    {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="button-container">
                <a href="{{ route('detallecompras.index') }}" class="register-button">Cancelar</a>
                <button type="submit" class="submit-button">Enviar</button>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</body>
</html>
