
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('categoria_id') }}</label>
    <div>
        {{ Form::text('categoria_id', $categoria->categoria_id, ['class' => 'form-control' .
        ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoria Id']) }}
        {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">categoria <b>categoria_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre_categoria') }}</label>
    <div>
        {{ Form::text('nombre_categoria', $categoria->nombre_categoria, ['class' => 'form-control' .
        ($errors->has('nombre_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Categoria']) }}
        {!! $errors->first('nombre_categoria', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">categoria <b>nombre_categoria</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('descripcion_categoria') }}</label>
    <div>
        {{ Form::text('descripcion_categoria', $categoria->descripcion_categoria, ['class' => 'form-control' .
        ($errors->has('descripcion_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Categoria']) }}
        {!! $errors->first('descripcion_categoria', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">categoria <b>descripcion_categoria</b> instruction.</small>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>
