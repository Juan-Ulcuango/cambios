@extends('tablar::auth.login')

@section('content')
<div style="display: flex; align-items: center; justify-content: center; min-height: 100vh; background: url('{{ asset('assets/Login.jpg') }}') no-repeat center center; background-size: cover;">
    <div class="container container-tight py-4" style="background: rgba(255, 255, 255, 0.8); border-radius: 8px; max-width: 400px; padding: 20px;">
        @parent  
    </div>
</div>
@endsection


