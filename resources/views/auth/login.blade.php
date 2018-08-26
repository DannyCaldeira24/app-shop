@extends('layouts.app')

@section('body-class', 'login-page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-login">
                <form class="form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    <div class="card-header card-header-primary text-center">
                        <h4 class="card-title">{{ __('Iniciar Sesión') }}</h4>
                        <div class="social-line">
                            <a href="#pablo" class="btn btn-just-icon btn-link">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="#pablo" class="btn btn-just-icon btn-link">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#pablo" class="btn btn-just-icon btn-link">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                    <p class="description text-center">Ingrese sus datos</p>
                    <div class="card-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">mail</i>
                                </span>
                            </div>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email..." required autofocus>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif

                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                            </div>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña..." required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="footer text-center">
                        <!--<div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                       <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>-->
                        <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Ingresar</button>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Olvidaste tu contraseña?') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
