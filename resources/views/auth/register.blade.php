@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header  elegant-color-dark"><h3 class="text-center text-light font-weight-bold">{{ __('Registro') }}</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row d-flex justify-content-center">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label> -->

                            <div class="col-md-6 md-form input-with-pre-icon">
                                <i class="fas fa-user input-prefix"></i>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror border-danger text-dark" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <label class="font-weight-bold blue-grey-text ml-2" for="prefixInside">Nombre</label>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label> -->

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
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label> -->

                            <div class="col-md-6 md-form input-with-pre-icon">
                                <i class="fas fa-key input-prefix"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border-danger text-dark" name="password" required autocomplete="new-password">
                                <label class="font-weight-bold blue-grey-text ml-2" for="prefixInside">Contraseña</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center">
                            <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme Contraseña') }}</label> -->

                            <div class="col-md-6 md-form input-with-pre-icon">
                                <i class="fas fa-key input-prefix"></i>
                                <input id="password-confirm" type="password" class="form-control border-danger text-dark" name="password_confirmation" required autocomplete="new-password">
                                <label class="font-weight-bold blue-grey-text ml-2" for="prefixInside">Confirme Contraseña</label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-dark rounded-pill">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
