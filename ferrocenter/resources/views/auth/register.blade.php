@extends('tablar::auth.register')

@section('content')
<div style="display: flex; align-items: center; justify-content: center; min-height: 100vh; background: url('{{ asset('assets/Register.jpg') }}') no-repeat center center; background-size: cover;">
    <div class="container container-tight py-4" style="background: rgba(255, 255, 255, 0.8); max-width: 400px; border-radius: 8px; padding: 20px;">
        @parent
    </div>
</div>
@endsection

