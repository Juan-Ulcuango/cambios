<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoría</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Categoría</h2>
            {{ Form::open(['route' => 'categorias.store']) }}

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('categoria_id', 'Categoría Id') }}</label>
                <div>
                    {{ Form::text('categoria_id', $categoria->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoría Id']) }}
                    {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('nombre_categoria', 'Nombre Categoría') }}</label>
                <div>
                    {{ Form::text('nombre_categoria', $categoria->nombre_categoria, ['class' => 'form-control' . ($errors->has('nombre_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Categoría']) }}
                    {!! $errors->first('nombre_categoria', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">{{ Form::label('descripcion_categoria', 'Descripción Categoría') }}</label>
                <div>
                    {{ Form::text('descripcion_categoria', $categoria->descripcion_categoria, ['class' => 'form-control' . ($errors->has('descripcion_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Descripción Categoría']) }}
                    {!! $errors->first('descripcion_categoria', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>

            <div class="button-container">
                <a href="{{ route('categorias.index') }}" class="register-button">Cancelar</a>
                <button type="submit" class="submit-button">Entregar</button>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</body>
</html>
