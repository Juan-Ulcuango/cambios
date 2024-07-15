@extends('tablar::page')

@section('title')
    Modulo
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Lista
                    </div>
                    <h2 class="page-title">
                        {{ __('Modulo ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('modulos.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Crear Modulo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            @if (config('tablar', 'display_alert'))
                @include('tablar::common.alert')
            @endif
            <div class="row row-deck">
                @forelse ($modulos as $modulo)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Thumbnail">
                            <div class="card-body">
                                <h5 class="card-title">{{ $modulo->nombre_modulo }}</h5>
                                <p class="card-text">{{ $modulo->descripcion_modulo }}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('modulos.show', $modulo->modulo_id) }}"
                                        class="btn btn-primary btn-sm">Ver</a>
                                    <a href="{{ route('modulos.edit', $modulo->modulo_id) }}"
                                        class="btn btn-secondary btn-sm ms-1">Editar</a>
                                    <form action="{{ route('modulos.destroy', $modulo->modulo_id) }}" method="POST"
                                        class="ms-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="if(!confirm('Do you Want to Proceed?')){return false;}">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>Datos no encontrados</p>
                    </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-4">
                {!! $modulos->links('tablar::pagination') !!}
            </div>
        </div>
    </div>
@endsection
