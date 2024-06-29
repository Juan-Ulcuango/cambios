<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Cliente</h2>
            {{ Form::open(['route' => 'clientes.store']) }}

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('cliente_id', 'Cliente Id') }}</label>
                <div>
                    {{ Form::text('cliente_id', $cliente->cliente_id, ['class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''), 'placeholder' => 'Cliente Id']) }}
                    {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('nombre_cliente', 'Nombre Cliente') }}</label>
                <div>
                    {{ Form::text('nombre_cliente', $cliente->nombre_cliente, ['class' => 'form-control' . ($errors->has('nombre_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Cliente']) }}
                    {!! $errors->first('nombre_cliente', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('apellido_cliente', 'Apellido Cliente') }}</label>
                <div>
                    {{ Form::text('apellido_cliente', $cliente->apellido_cliente, ['class' => 'form-control' . ($errors->has('apellido_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Cliente']) }}
                    {!! $errors->first('apellido_cliente', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('direccion_cliente', 'Dirección Cliente') }}</label>
                <div>
                    {{ Form::text('direccion_cliente', $cliente->direccion_cliente, ['class' => 'form-control' . ($errors->has('direccion_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Dirección Cliente']) }}
                    {!! $errors->first('direccion_cliente', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('telefono_cliente', 'Teléfono Cliente') }}</label>
                <div>
                    {{ Form::text('telefono_cliente', $cliente->telefono_cliente, ['class' => 'form-control' . ($errors->has('telefono_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Teléfono Cliente']) }}
                    {!! $errors->first('telefono_cliente', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('email_cliente', 'Email Cliente') }}</label>
                <div>
                    {{ Form::text('email_cliente', $cliente->email_cliente, ['class' => 'form-control' . ($errors->has('email_cliente') ? ' is-invalid' : ''), 'placeholder' => 'Email Cliente']) }}
                    {!! $errors->first('email_cliente', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="button-container">
                <a href="{{ route('clientes.index') }}" class="register-button">Cancelar</a>
                <button type="submit" class="submit-button">Entregar</button>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</body>
</html>

