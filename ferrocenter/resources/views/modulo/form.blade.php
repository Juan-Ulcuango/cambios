<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulo</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Modulo</h2>
            {{ Form::open(['route' => 'modulos.store']) }}

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('modulo_id', 'Modulo Id') }}</label>
                <div>
                    {{ Form::text('modulo_id', $modulo->modulo_id, ['class' => 'form-control' . ($errors->has('modulo_id') ? ' is-invalid' : ''), 'placeholder' => 'Modulo Id']) }}
                    {!! $errors->first('modulo_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('nombre_modulo', 'Nombre Modulo') }}</label>
                <div>
                    {{ Form::text('nombre_modulo', $modulo->nombre_modulo, ['class' => 'form-control' . ($errors->has('nombre_modulo') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Modulo']) }}
                    {!! $errors->first('nombre_modulo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('descripcion_modulo', 'Descripcion Modulo') }}</label>
                <div>
                    {{ Form::text('descripcion_modulo', $modulo->descripcion_modulo, ['class' => 'form-control' . ($errors->has('descripcion_modulo') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Modulo']) }}
                    {!! $errors->first('descripcion_modulo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="button-container">
                <a href="{{ route('modulos.index') }}" class="register-button">Cancelar</a>
                <button type="submit" class="submit-button">Entregar</button>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</body>
</html>
