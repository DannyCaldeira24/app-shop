@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title',"Register")

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/city-profile.jpg')}}')">
</div>
<div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img style="height:150px !important ; width:200px; " src="{{asset('img/welcome.jpg')}}" alt="Circle Image" class="img-raised img-fluid">
              </div>
            </div>
          </div>
        </div>
        <div class="tab-content tab-space text-center">
            <div class="team">
                <div class="row">
                    <div class="col-lg-8 col-md-8 ml-auto mr-auto">
                        <div class="card card-login">
                            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                @csrf
                                <div class="card-header card-header-primary text-center">
                                    <h4 class="card-title">{{ __('Registro') }}</h4>
                                </div>
                                <p class="description text-center">Ingrese sus datos</p>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-6">  
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">face</i>
                                                    </span>
                                                </div>
                                                
                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nombre..." required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif  
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">    
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">face</i>
                                                    </span>
                                                </div>
                                                
                                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{old('surname')}}" placeholder="Apellidos..." required autofocus>

                                                @if ($errors->has('surname'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('surname') }}</strong>
                                                    </span>
                                                @endif    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">         
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">mail</i>
                                                    </span>
                                                </div>
                                                
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email..." required>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                                
                                            </div>
                                        </div> 
                                        <div class="col-12 col-md-6">    
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">move_to_inbox</i>
                                                    </span>
                                                </div>
                                                
                                                <input id="postal_code" type="text" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{old('postal_code')}}" placeholder="Codigo postal..." required autofocus>

                                                @if ($errors->has('postal_code'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                                    </span>
                                                @endif         
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">open_with</i>
                                            </span>
                                        </div>
                                                
                                        <textarea class="form-control" name="direction" rows="2" placeholder="Dirección">{{old('direction')}}</textarea>
                                              

                                        @if ($errors->has('direction'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('direction') }}</strong>
                                            </span>
                                        @endif
                                        
                                    </div>        
                                    <div class="row">
                                        <div class="col-12 col-md-6">
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
                                        <div class="col-12 col-md-6">
                                            <div class="input-group">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                    </span>
                                                </div>  
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña..." required>
                                                
                                            </div>
                                        </div>
                                    </div>        
                                    <div class="input-group">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Registrar') }}
                                            </button>
                                            <a class="btn btn-danger" href="{{url('/')}}">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>  
    </div>    
</div>
@endsection


