@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header elegant-color-dark"><h3 class="text-center text-light font-weight-bold">{{ __('Inicio de Sesión') }}</h3></div>

                 <div class="card-body"> 
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row d-flex justify-content-center">
                            <div class="col-md-6 md-form input-with-pre-icon">
                                <i class="fas fa-envelope input-prefix"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border-danger text-dark" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <label class="font-weight-bold blue-grey-text ml-2" for="prefixInside">Email</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center">
                            <div class="col-md-6 md-form input-with-pre-icon">
                                <i class="fas fa-key input-prefix"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border-danger text-dark" name="password" required autocomplete="current-password">
                                <label class="font-weight-bold blue-grey-text ml-2" for="prefixInside">Contraseña</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-dark rounded-pill">
                                    {{ __('Inicio de Sesión') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
