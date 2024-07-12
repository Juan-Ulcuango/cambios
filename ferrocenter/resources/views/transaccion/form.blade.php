@extends('tablar::page')

@section('content')
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12">
            <form method="POST" action="{{ route('transaccions.store') }}" id="transaccionForm" role="form">
                @csrf
                <!-- Formulario de Transacción -->
                <div class="form-group mb-3">
                    <label class="form-label">{{ Form::label('transaccion_id', 'ID de la Transacción') }}</label>
                    <div>
                        {{ Form::text('transaccion_id', old('transaccion_id'), ['class' => 'form-control' . ($errors->has('transaccion_id') ? ' is-invalid' : ''), 'placeholder' => 'Transacción Id']) }}
                        {!! $errors->first('transaccion_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">{{ Form::label('fecha_transaccion', 'Fecha de Transacción') }}</label>
                    <div>
                        {{ Form::date('fecha_transaccion', old('fecha_transaccion'), ['class' => 'form-control' . ($errors->has('fecha_transaccion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha de Transacción']) }}
                        {!! $errors->first('fecha_transaccion', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">{{ Form::label('total_transaccion', 'Total de la Transacción') }}</label>
                    <div>
                        {{ Form::text('total_transaccion', old('total_transaccion'), ['class' => 'form-control' . ($errors->has('total_transaccion') ? ' is-invalid' : ''), 'placeholder' => 'Total de la Transacción', 'readonly' => true]) }}
                        {!! $errors->first('total_transaccion', '<div class="invalid-feedback">:message</div>') !!}
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
                    <label class="form-label">{{ Form::label('tipo_transaccion', 'Tipo de Transacción') }}</label>
                    <div>
                        {{ Form::text('tipo_transaccion', old('tipo_transaccion'), ['class' => 'form-control' . ($errors->has('tipo_transaccion') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de Transacción']) }}
                        {!! $errors->first('tipo_transaccion', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">{{ Form::label('cliente_id', 'Cliente') }}</label>
                    <div class="d-flex">
                        <select name="cliente_id" class="form-control{{ $errors->has('cliente_id') ? ' is-invalid' : '' }}">
                            <option value="">Seleccione un cliente</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->cliente_id }}">{{ $cliente->nombre_cliente }} {{ $cliente->apellido_cliente }}</option>
                            @endforeach
                        </select>
                    </div>
                    {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
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
                                    <th>Subtotal</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="product0">
                                    <td>
                                        <select name="producto_id[]" class="form-control" onchange="setProductPrice(this)">
                                            <option value="">-- Selecciona un producto --</option>
                                            @foreach ($productos as $producto)
                                                <option value="{{ $producto->producto_id }}">
                                                    {{ $producto->nombre_producto }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="cantidad[]" class="form-control" oninput="calculateSubtotal(this)" />
                                    </td>
                                    <td>
                                        <input type="number" name="precio_unitario[]" class="form-control" readonly />
                                    </td>
                                    <td>
                                        <input type="number" name="subtotal[]" class="form-control" readonly />
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#nuevoProductoModal" disabled>
                                            Nuevo Producto
                                        </button>
                                    </td>
                                </tr>
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
                            <a href="{{ route('transaccions.index') }}" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-primary ms-auto">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let row_number = 1;

        $("#add_row").click(function(e) {
            e.preventDefault();
            let new_row_number = row_number;
            let new_row = $('#product0').clone().attr('id', 'product' + new_row_number);
            new_row.find('input').val('');
            $('#products_table tbody').append(new_row);
            row_number++;
        });

        $("#delete_row").click(function(e) {
            e.preventDefault();
            if ($('#products_table tbody tr').length > 1) {
                $('#products_table tbody tr:last').remove();
                row_number--;
                calculateTotal();
            }
        });
    });

    function setProductPrice(selectElement) {
        let selectedProductId = selectElement.value;
        let selectedProduct = @json($productos).find(product => product.producto_id == selectedProductId);
        if (selectedProduct) {
            $(selectElement).closest('tr').find('input[name="precio_unitario[]"]').val(selectedProduct.precio_unitario);
        }
        calculateSubtotal(selectElement);
    }

    function calculateSubtotal(element) {
        let row = $(element).closest('tr');
        let cantidad = parseFloat(row.find('input[name="cantidad[]"]').val());
        let precio_unitario = parseFloat(row.find('input[name="precio_unitario[]"]').val());
        let subtotal = 0;
        if (!isNaN(cantidad) && !isNaN(precio_unitario)) {
            subtotal = cantidad * precio_unitario;
        }
        row.find('input[name="subtotal[]"]').val(subtotal.toFixed(2));
        calculateTotal();
    }

    function calculateTotal() {
        let total = 0;
        $('input[name="subtotal[]"]').each(function(index, element) {
            let subtotal = parseFloat($(element).val());
            if (!isNaN(subtotal)) {
                total += subtotal;
            }
        });
        $('#total_transaccion').val(total.toFixed(2));
    }
</script>
@endsection
