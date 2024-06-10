
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('modulo_id') }}</label>
    <div>
        {{ Form::text('modulo_id', $modulo->modulo_id, ['class' => 'form-control' .
        ($errors->has('modulo_id') ? ' is-invalid' : ''), 'placeholder' => 'Modulo Id']) }}
        {!! $errors->first('modulo_id', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">modulo <b>modulo_id</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre_modulo') }}</label>
    <div>
        {{ Form::text('nombre_modulo', $modulo->nombre_modulo, ['class' => 'form-control' .
        ($errors->has('nombre_modulo') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Modulo']) }}
        {!! $errors->first('nombre_modulo', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">modulo <b>nombre_modulo</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('descripcion_modulo') }}</label>
    <div>
        {{ Form::text('descripcion_modulo', $modulo->descripcion_modulo, ['class' => 'form-control' .
        ($errors->has('descripcion_modulo') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Modulo']) }}
        {!! $errors->first('descripcion_modulo', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">modulo <b>descripcion_modulo</b> instruction.</small>
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
