@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title',"Config")

@section('users')
    @if (auth()->user()->admin)
    <form style="margin-left:30px;color:black;" class="form-inline my-2 my-lg-0" method="get" action="{{url('admin/search')}}">
        <input style="color:#b3bdce;" class="form-control mr-sm-2" type="text" placeholder="Nombre del usuario" class="form-control" name="queryus" id="search3">
        <button class="btn btn-primary btn-just-icon" type="submit">
            <i class="material-icons">
                search
            </i>
        </button>
    </form>
    @endif
@endsection

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
                            <form method="POST" action="{{ url('/modify_user') }}" aria-label="{{ __('Register') }}">
                                @csrf
                                <div class="card-header card-header-primary text-center">
                                    <h4 class="card-title">{{ __('Modificar datos de usuario') }}</h4>
                                </div>
                                <p class="description text-center">Ingrese sus nuevos datos</p>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-6">  
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">face</i>
                                                    </span>
                                                </div>
                                                
                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', Auth::user()->name) }}" placeholder="Nombre..." required autofocus>

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
                                                
                                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{old('surname',Auth::user()->surname)}}" placeholder="Apellidos..." required autofocus>

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
                                                
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email',Auth::user()->email) }}" placeholder="Email..." readonly>

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
                                                
                                                <input id="postal_code" type="text" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{old('postal_code',Auth::user()->postal_code)}}" placeholder="Codigo postal..." required autofocus>

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
                                                
                                        <textarea class="form-control" name="direction" rows="2" placeholder="Dirección">{{old('direction',Auth::user()->direction)}}</textarea>
                                              

                                        @if ($errors->has('direction'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('direction') }}</strong>
                                            </span>
                                        @endif
                                        
                                    </div>                                
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>    
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña actual para confirmar cambios..." required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif                            
                                    </div>   
                                    <br>             
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


