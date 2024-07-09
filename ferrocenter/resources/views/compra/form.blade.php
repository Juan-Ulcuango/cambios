<!-- resources/views/compras/form.blade.php -->

<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('compra_id', 'ID de la Compra') }}</label>
    <div>
        {{ Form::text('compra_id', $compra->compra_id ?? '', ['class' => 'form-control' . ($errors->has('compra_id') ? ' is-invalid' : ''), 'placeholder' => 'Compra Id']) }}
        {!! $errors->first('compra_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('fecha_compra', 'Fecha de Compra') }}</label>
    <div>
        {{ Form::date('fecha_compra', $compra->fecha_compra ?? old('fecha_compra'), ['class' => 'form-control' . ($errors->has('fecha_compra') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Compra']) }}
        {!! $errors->first('fecha_compra', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('numero_factura', 'Número de Factura') }}</label>
    <div>
        {{ Form::text('numero_factura', $compra->numero_factura ?? old('numero_factura'), ['class' => 'form-control' . ($errors->has('numero_factura') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese el número de factura']) }}
        {!! $errors->first('numero_factura', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('subtotal', 'Subtotal') }}</label>
    <div>
        {{ Form::text('subtotal', $compra->subtotal ?? old('subtotal'), ['class' => 'form-control' . ($errors->has('subtotal') ? ' is-invalid' : ''), 'placeholder' => 'Subtotal']) }}
        {!! $errors->first('subtotal', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('impuesto', 'Impuesto') }}</label>
    <div>
        {{ Form::text('impuesto', $compra->impuesto ?? old('impuesto'), ['class' => 'form-control' . ($errors->has('impuesto') ? ' is-invalid' : ''), 'placeholder' => 'Impuesto']) }}
        {!! $errors->first('impuesto', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('total_compra', 'Total de la Compra') }}</label>
    <div>
        {{ Form::text('total_compra', $compra->total_compra ?? old('total_compra'), ['class' => 'form-control' . ($errors->has('total_compra') ? ' is-invalid' : ''), 'placeholder' => 'Total Compra']) }}
        {!! $errors->first('total_compra', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('metodo_pago', 'Método de Pago') }}</label>
    <div>
        {{ Form::text('metodo_pago', $compra->metodo_pago ?? old('metodo_pago'), ['class' => 'form-control' . ($errors->has('metodo_pago') ? ' is-invalid' : ''), 'placeholder' => 'Método de Pago']) }}
        {!! $errors->first('metodo_pago', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('estado', 'Estado de la Compra') }}</label>
    <div>
        {{ Form::select('estado', ['pendiente' => 'Pendiente', 'completada' => 'Completada', 'cancelada' => 'Cancelada'], $compra->estado ?? old('estado'), ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el estado']) }}
        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('proveedor_id', 'Proveedor') }}</label>
    <div>
        {{ Form::select('proveedor_id', $proveedores->pluck('nombre_proveedor', 'proveedor_id'), old('proveedor_id', $compra->proveedor_id ?? null), ['class' => 'form-control' . ($errors->has('proveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un proveedor']) }}
        {!! $errors->first('proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="{{ route('compras.index') }}" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary ms-auto ajax-submit">Guardar</button>
        </div>
    </div>
</div>
