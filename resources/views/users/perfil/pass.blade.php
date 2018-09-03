@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title',"Cambiar contraseña")

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
                <a title="Cambiar imagen de perfil" href="{{url('/user/edit')}}">
                  <img src="{{asset('images/users/'. Auth::user()->avatar)}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                </a>
              </div>
              <br>
              <div class="name">
                <div style="display: flex;justify-content: center;" class="row">
                    <div class="col-12 col-sm-8">
                        <div class="card">
                            <div class="card-header card-header-text card-header-primary">
                                <h4 class="card-title">{{ Auth::user()->name }}</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="title">@if (auth()->user()->admin) ADMIN @else Cliente @endif</h5>
                                @if (session('notification'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('notification') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>          
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-content tab-space text-center">
            <div class="team">
                <div class="row">
                    <div class="col-lg-8 col-md-8 ml-auto mr-auto">
                        <div class="card card-login">
                            <form method="POST" action="{{ url('/change_password/process') }}" aria-label="{{ __('Register') }}">
                                @csrf
                                <div class="card-header card-header-primary text-center">
                                    <h4 class="card-title">{{ __('Cambiar contraseña') }}</h4>
                                </div>
                                <p class="description text-center">Ingrese los datos que se le solicitan</p>
                                <div class="card-body">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>    
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña actual" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif                            
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>    
                                        <input id="newpass" type="password" class="form-control{{ $errors->has('newpass') ? ' is-invalid' : '' }}" name="newpass" placeholder="Contraseña nueva" required>

                                        @if ($errors->has('newpass'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('newpass') }}</strong>
                                            </span>
                                        @endif                            
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>    
                                        <input id="newpass_confirmation" type="password" class="form-control" name="newpass_confirmation" placeholder="Confirmar nueva contraseña" required>                            
                                    </div>   
                                    <br>             
                                    <div class="input-group">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Guardar') }}
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

