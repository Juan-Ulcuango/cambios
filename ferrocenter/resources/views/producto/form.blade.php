<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('producto_id') }}</label>
    <div>
        {{ Form::text('producto_id', $producto->producto_id, ['class' => 'form-control' . ($errors->has('producto_id') ? ' is-invalid' : ''), 'placeholder' => 'Producto Id']) }}
        {!! $errors->first('producto_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('nombre_producto') }}</label>
    <div>
        {{ Form::text('nombre_producto', $producto->nombre_producto, ['class' => 'form-control' . ($errors->has('nombre_producto') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Producto']) }}
        {!! $errors->first('nombre_producto', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('descripcion_producto') }}</label>
    <div>
        {{ Form::text('descripcion_producto', $producto->descripcion_producto, ['class' => 'form-control' . ($errors->has('descripcion_producto') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Producto']) }}
        {!! $errors->first('descripcion_producto', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('precio_unitario') }}</label>
    <div>
        {{ Form::text('precio_unitario', $producto->precio_unitario, ['class' => 'form-control' . ($errors->has('precio_unitario') ? ' is-invalid' : ''), 'placeholder' => 'Precio Unitario']) }}
        {!! $errors->first('precio_unitario', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('categoria_id', 'Categoría') }}</label>
    <div>
        {{ Form::select('categoria_id', $categorias->pluck('nombre_categoria', 'categoria_id'), null, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una categoría']) }}
        {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="{{ route('productos.index') }}" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary ms-auto ajax-submit">Guardar</button>
        </div>
    </div>
</div>
