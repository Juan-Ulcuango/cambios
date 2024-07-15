@extends('tablar::page')

@section('title', 'View Inventario')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Ver Inventario</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('inventarios.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stock:</strong>
                    {{ $inventario->stock }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha Movimiento:</strong>
                    {{ $inventario->fecha_movimiento }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tipo Movimiento:</strong>
                    {{ $inventario->tipo_movimiento }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Producto:</strong>
                    {{ $inventario->producto->nombre_producto }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Producto ID:</strong>
                    {{ $inventario->producto->producto_id }}
                </div>
            </div>
        </div>
    </div>
@endsection
