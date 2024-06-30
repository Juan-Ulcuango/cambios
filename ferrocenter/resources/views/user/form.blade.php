<div class="form-group mb-3">
    <label class="form-label" for="name">{{ __('Name') }}</label>
    <div>
        {{ Form::text('name', old('name', $user->name ?? ''), ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name', 'id' => 'name']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">user <b>name</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label" for="email">{{ __('Email') }}</label>
    <div>
        {{ Form::email('email', old('email', $user->email ?? ''), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email', 'id' => 'email']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">user <b>email</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label" for="password">{{ __('Password') }}</label>
    <div>
        {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password', 'id' => 'password']) }}
        {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">user <b>password</b> instruction.</small>
    </div>
</div>

<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary ms-auto">Entregar</button>
        </div>
    </div>
</div>
