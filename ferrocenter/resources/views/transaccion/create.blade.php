@extends('tablar::page')

@section('content')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12">
                <form method="POST" action="{{ route('transaccions.store') }}" id="ajaxForm" role="form" enctype="multipart/form-data">
                    @csrf
                    @include('transaccion.form')

                    <div class="form-group">
                        <label for="cliente_id">Cliente:</label>
                        <select name="cliente_id" class="form-control">
                            <option value="">-- Selecciona un cliente --</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->cliente_id }}">
                                    {{ $cliente->nombre_cliente }} {{ $cliente->apellido_cliente }}
                                </option>
                            @endforeach
                        </select>
                    </div>

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
                                        <th>Precio</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="product0">
                                        <td>
                                            <select name="products[]" class="form-control product-dropdown">
                                                <option value="">-- Selecciona un producto --</option>
                                                @foreach ($productos as $producto)
                                                    <option value="{{ $producto->id }}" data-price="{{ $producto->precio_unitario }}">
                                                        {{ $producto->nombre_producto }} (${{ number_format($producto->precio_unitario, 2) }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="quantities[]" class="form-control quantity-input" value="1" />
                                        </td>
                                        <td>
                                            <input type="text" name="prices[]" class="form-control price-input" readonly />
                                        </td>
                                        <td>
                                            <input type="text" name="subtotals[]" class="form-control subtotal-input" readonly />
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

                    <div class="row clearfix" style="margin-top:20px">
                        <div class="pull-right col-md-4">
                            <table class="table table-bordered table-hover" id="tab_logic_total">
                                <tbody>
                                    <tr>
                                        <th class="text-center">Sub Total</th>
                                        <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Grand Total</th>
                                        <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div>
                        <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
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
                new_row.find('.price-input').val('');
                new_row.find('.subtotal-input').val('');
                $('#products_table tbody').append(new_row);
                row_number++;
            });

            $("#delete_row").click(function(e){
                e.preventDefault();
                if($('#products_table tbody tr').length > 1){
                    $('#products_table tbody tr:last').remove();
                    row_number--;
                }
                calculateTotal();
            });

            $('#products_table').on('change', '.product-dropdown', function(){
                let price = $(this).find(':selected').data('price');
                let row = $(this).closest('tr');
                row.find('.price-input').val(price);
                calculateRow(row);
                calculateTotal();
            });

            $('#products_table').on('keyup change', '.quantity-input', function(){
                let row = $(this).closest('tr');
                calculateRow(row);
                calculateTotal();
            });

            function calculateRow(row){
                let quantity = parseFloat(row.find('.quantity-input').val());
                let price = parseFloat(row.find('.price-input').val());
                let subtotal = quantity * price;
                row.find('.subtotal-input').val(subtotal.toFixed(2));
            }

            function calculateTotal(){
                let total = 0;
                $('#products_table .subtotal-input').each(function(){
                    total += parseFloat($(this).val());
                });

                $('#sub_total').val(total.toFixed(2));
                $('#total_amount').val(total.toFixed(2)); // Actualizar el total_amount
            }
        });
    </script>
@endsection
