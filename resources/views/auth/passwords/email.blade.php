@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header elegant-color-dark"><h3 class="text-center text-light font-weight-bold">{{ __('Restablecer la Contraseña') }}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row d-flex justify-content-center">
                            <div class="col-md-6 md-form input-with-pre-icon">
                                <i class="fas fa-envelope input-prefix"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border-danger text-dark" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label class="font-weight-bold blue-grey-text ml-2" for="prefixInside">Email</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-dark rounded-pill">
                                    {{ __('Enviar Enlace') }}
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
