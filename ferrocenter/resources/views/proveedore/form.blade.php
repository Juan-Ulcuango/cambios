<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedor</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Proveedor</h2>
            {{ Form::open(['route' => 'proveedores.store']) }}

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('proveedor_id', 'Proveedor Id') }}</label>
                <div>
                    {{ Form::text('proveedor_id', $proveedore->proveedor_id, ['class' => 'form-control' . ($errors->has('proveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedor Id']) }}
                    {!! $errors->first('proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('nombre_proveedor', 'Nombre Proveedor') }}</label>
                <div>
                    {{ Form::text('nombre_proveedor', $proveedore->nombre_proveedor, ['class' => 'form-control' . ($errors->has('nombre_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Proveedor']) }}
                    {!! $errors->first('nombre_proveedor', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('direccion_proveedor', 'Direccion Proveedor') }}</label>
                <div>
                    {{ Form::text('direccion_proveedor', $proveedore->direccion_proveedor, ['class' => 'form-control' . ($errors->has('direccion_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Direccion Proveedor']) }}
                    {!! $errors->first('direccion_proveedor', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('telefono_proveedor', 'Telefono Proveedor') }}</label>
                <div>
                    {{ Form::text('telefono_proveedor', $proveedore->telefono_proveedor, ['class' => 'form-control' . ($errors->has('telefono_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Telefono Proveedor']) }}
                    {!! $errors->first('telefono_proveedor', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('email_proveedor', 'Email Proveedor') }}</label>
                <div>
                    {{ Form::text('email_proveedor', $proveedore->email_proveedor, ['class' => 'form-control' . ($errors->has('email_proveedor') ? ' is-invalid' : ''), 'placeholder' => 'Email Proveedor']) }}
                    {!! $errors->first('email_proveedor', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="button-container">
                <a href="{{ route('proveedores.index') }}" class="register-button">Cancelar</a>
                <button type="submit" class="submit-button">Entregar</button>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</body>
</html>
