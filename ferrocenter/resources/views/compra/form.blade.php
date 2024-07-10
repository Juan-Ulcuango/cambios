@extends('tablar::page')

@section('content')
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12">
                <form method="POST" action="{{ route('compras.store') }}" id="compraForm" role="form">
                    @csrf
                    <!-- Formulario de Compra -->
                    <div class="form-group mb-3">
                        <label class="form-label">{{ Form::label('compra_id', 'ID de la Compra') }}</label>
                        <div>
                            {{ Form::text('compra_id', old('compra_id'), ['class' => 'form-control' . ($errors->has('compra_id') ? ' is-invalid' : ''), 'placeholder' => 'Compra Id']) }}
                            {!! $errors->first('compra_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">{{ Form::label('numero_factura', 'Número de Factura') }}</label>
                        <div>
                            {{ Form::text('numero_factura', old('numero_factura'), ['class' => 'form-control' . ($errors->has('numero_factura') ? ' is-invalid' : ''), 'placeholder' => 'Número de Factura']) }}
                            {!! $errors->first('numero_factura', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">{{ Form::label('fecha_compra', 'Fecha de Compra') }}</label>
                        <div>
                            {{ Form::date('fecha_compra', old('fecha_compra'), ['class' => 'form-control' . ($errors->has('fecha_compra') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de Compra']) }}
                            {!! $errors->first('fecha_compra', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">{{ Form::label('subtotal', 'Subtotal') }}</label>
                        <div>
                            {{ Form::text('subtotal', old('subtotal'), ['class' => 'form-control' . ($errors->has('subtotal') ? ' is-invalid' : ''), 'placeholder' => 'Subtotal', 'readonly' => true]) }}
                            {!! $errors->first('subtotal', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">{{ Form::label('impuesto', 'Impuesto (%)') }}</label>
                        <div>
                            {{ Form::text('impuesto', old('impuesto'), ['class' => 'form-control' . ($errors->has('impuesto') ? ' is-invalid' : ''), 'placeholder' => 'Impuesto']) }}
                            {!! $errors->first('impuesto', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">{{ Form::label('total_compra', 'Total de la Compra') }}</label>
                        <div>
                            {{ Form::text('total_compra', old('total_compra'), ['class' => 'form-control' . ($errors->has('total_compra') ? ' is-invalid' : ''), 'placeholder' => 'Total de la Compra', 'readonly' => true]) }}
                            {!! $errors->first('total_compra', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">{{ Form::label('metodo_pago', 'Método de Pago') }}</label>
                        <div>
                            {{ Form::text('metodo_pago', old('metodo_pago'), ['class' => 'form-control' . ($errors->has('metodo_pago') ? ' is-invalid' : ''), 'placeholder' => 'Método de Pago']) }}
                            {!! $errors->first('metodo_pago', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">{{ Form::label('estado', 'Estado de la Compra') }}</label>
                        <div>
                            {{ Form::select('estado', ['pendiente' => 'Pendiente', 'completada' => 'Completada', 'cancelada' => 'Cancelada'], old('estado'), ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione el estado']) }}
                            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">{{ Form::label('proveedor_id', 'Proveedor') }}</label>
                        <div>
                            {{ Form::select('proveedor_id', $proveedores->pluck('nombre_proveedor', 'proveedor_id'), old('proveedor_id'), ['class' => 'form-control' . ($errors->has('proveedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un proveedor']) }}
                            {!! $errors->first('proveedor_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>

                    <!-- Tabla de Productos -->
                    <div class="card">
                        <div class="card-header">
                            Productos
                        </div>
                        <div class="card-body">
                            <table class="table" id="products_table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="product0">
                                        <td>
                                            <select name="producto_id[]" class="form-control">
                                                <option value="">-- Selecciona un producto --</option>
                                                @foreach ($productos as $producto)
                                                    <option value="{{ $producto->producto_id }}">{{ $producto->nombre_producto }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="cantidad[]" class="form-control" oninput="calculateSubtotal()" />
                                        </td>
                                        <td>
                                            <input type="number" name="precio_unitario[]" class="form-control" oninput="calculateSubtotal()" />
                                        </td>
                                    </tr>
                                    <tr id="product1"></tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <button id="add_row" class="btn btn-default pull-left">+ Añadir Fila</button>
                                    <button id='delete_row' class="pull-right btn btn-danger">- Eliminar Fila</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer mt-3">
                        <div class="text-end">
                            <div class="d-flex">
                                <a href="{{ route('compras.index') }}" class="btn btn-danger">Cancelar</a>
                                <button type="submit" class="btn btn-primary ms-auto">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            let row_number = 1;

            $("#add_row").click(function(e){
                e.preventDefault();
                let new_row_number = row_number;
                let new_row = $('#product0').clone().attr('id', 'product' + new_row_number);
                new_row.find('input').val('');
                $('#products_table tbody').append(new_row);
                row_number++;
            });

            $("#delete_row").click(function(e){
                e.preventDefault();
                if($('#products_table tbody tr').length > 1){
                    $('#products_table tbody tr:last').remove();
                    row_number--;
                    calculateSubtotal();
                }
            });
        });

        function calculateSubtotal() {
            let subtotal = 0;
            $('input[name="cantidad[]"]').each(function(index, element) {
                let cantidad = parseFloat($(element).val());
                let precio_unitario = parseFloat($('input[name="precio_unitario[]"]').eq(index).val());
                if (!isNaN(cantidad) && !isNaN(precio_unitario)) {
                    subtotal += cantidad * precio_unitario;
                }
            });
            $('#subtotal').val(subtotal.toFixed(2));
            calculateTotal();
        }

        function calculateTotal() {
            let subtotal = parseFloat($('#subtotal').val());
            let impuesto = parseFloat($('#impuesto').val());
            if (!isNaN(subtotal) && !isNaN(impuesto)) {
                let total = subtotal + (subtotal * (impuesto / 100));
                $('#total_compra').val(total.toFixed(2));
            }
        }

        $('#impuesto').on('input', calculateTotal);
    </script>
@endsection
