<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('cliente_id') }}</label>
    <div>
        {{ Form::text('cliente_id', $cliente->cliente_id, [
            'class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''),
            'placeholder' => 'Cliente Id',
        ]) }}
        {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('nombre_cliente') }}</label>
    <div>
        {{ Form::text('nombre_cliente', $cliente->nombre_cliente, [
            'class' => 'form-control' . ($errors->has('nombre_cliente') ? ' is-invalid' : ''),
            'placeholder' => 'Nombre Cliente',
        ]) }}
        {!! $errors->first('nombre_cliente', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('apellido_cliente') }}</label>
    <div>
        {{ Form::text('apellido_cliente', $cliente->apellido_cliente, [
            'class' => 'form-control' . ($errors->has('apellido_cliente') ? ' is-invalid' : ''),
            'placeholder' => 'Apellido Cliente',
        ]) }}
        {!! $errors->first('apellido_cliente', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('direccion_cliente') }}</label>
    <div>
        {{ Form::text('direccion_cliente', $cliente->direccion_cliente, [
            'class' => 'form-control' . ($errors->has('direccion_cliente') ? ' is-invalid' : ''),
            'placeholder' => 'Direccion Cliente',
        ]) }}
        {!! $errors->first('direccion_cliente', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('telefono_cliente') }}</label>
    <div>
        {{ Form::text('telefono_cliente', $cliente->telefono_cliente, [
            'class' => 'form-control' . ($errors->has('telefono_cliente') ? ' is-invalid' : ''),
            'placeholder' => 'Telefono Cliente',
        ]) }}
        {!! $errors->first('telefono_cliente', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label"> {{ Form::label('email_cliente') }}</label>
    <div>
        {{ Form::text('email_cliente', $cliente->email_cliente, [
            'class' => 'form-control' . ($errors->has('email_cliente') ? ' is-invalid' : ''),
            'placeholder' => 'Email Cliente',
        ]) }}
        {!! $errors->first('email_cliente', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="{{ route('clientes.index') }}" class="btn btn-danger" id="btn-cancelar">Cancelar</a>
            <button type="submit" class="btn btn-primary ms-auto ajax-submit">Guardar</button>
        </div>
    </div>
</div>
</div>
