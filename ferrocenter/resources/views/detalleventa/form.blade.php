<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Venta</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">

</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Detalle Venta</h2>
            {{ Form::open(['route' => 'detalleventas.store']) }}
            
            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('precio_venta_unidad', 'Precio Venta Unidad') }}</label>
                <div>
                    {{ Form::text('precio_venta_unidad', $detalleventa->precio_venta_unidad, ['class' => 'form-control' . ($errors->has('precio_venta_unidad') ? ' is-invalid' : ''), 'placeholder' => 'Precio Venta Unidad']) }}
                    {!! $errors->first('precio_venta_unidad', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            
            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('descuento', 'Descuento') }}</label>
                <div>
                    {{ Form::text('descuento', $detalleventa->descuento, ['class' => 'form-control' . ($errors->has('descuento') ? ' is-invalid' : ''), 'placeholder' => 'Descuento']) }}
                    {!! $errors->first('descuento', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            
            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('impuesto', 'Impuesto') }}</label>
                <div>
                    {{ Form::text('impuesto', $detalleventa->impuesto, ['class' => 'form-control' . ($errors->has('impuesto') ? ' is-invalid' : ''), 'placeholder' => 'Impuesto']) }}
                    {!! $errors->first('impuesto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            
            <div class="button-container">
                <a href="{{ route('detalleventas.index') }}" class="register-button">Registrar</a>
                <button type="submit" class="submit-button">Enviar</button>
            </div>
            
            {{ Form::close() }}
        </div>
    </div>
</body>
</html>

