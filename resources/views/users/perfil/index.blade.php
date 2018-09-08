@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title',"Editar imagen de perfil")

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
<!--         <div class="description text-center">
  <p>Como administrador puede gestionar nuestros productos</p>
</div> -->
        <div class="tab-content tab-space text-center">
            <div style="display: flex;justify-content: center;" class="row">
                <div class="col-12 col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{url('/update/avatar')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header card-header-text card-header-primary">
                                    <h4 class="card-title">Subir imagen</h4>
                                    <p class="category">Eliga la imagen de su perfil de usuario</p>
                                    <input type="file" id="files" name="avatar" />
                                </div>     
                                <div class="card-body">
                                    @if ($errors->any())
                                       <div class="alert alert-danger">
                                           
                                        @foreach ($errors->all() as $error)
                                            {{$error}}
                                        @endforeach
                                           
                                       </div> 
                                    @endif
                                </div>
                                <output id="list"></output>
                                <br>
                                <button type="submit" class="btn btn-primary btn-round">Agregar imagen</button>
                                <a href="{{url('/home')}}" type="button" type="button" class="btn btn-danger btn-round">Volver</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>    
        </div>    
      </div>
    </div>
</div>

@endsection
