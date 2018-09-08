@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title',"Resultados de búsqueda")

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
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/city-profile.jpg')}}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="/img/search.png" alt="Busqueda" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title">Resultados de busqueda para "{{$query}}"</h3>
                 @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
          <p>Se encontraron {{$users->count()}} resultados</p>
          <form class="" method="get" action="{{url('/search')}}">
              <input type="text" placeholder="Nombre del producto" class="form-control" name="query" id="search3">
              <button class="btn btn-primary btn-just-icon" type="submit">
                  <i class="material-icons">
                      search
                  </i>
              </button>
          </form>
        </div>
        <div class="section text-center">
            <hr>
            <h2 class="title">Usuarios encontrados</h2>
            <hr>
            <div class="team">
              <div class="row">
                  @foreach ($users as $user)
                  <div class="col-md-4">
                      <div class="team-player">
                          <div class="card card-plain">
                              <div class="col-md-6 ml-auto mr-auto">
                                  <img style="width:150px;height:150px" src="{{asset('images/users/'. $user->avatar)}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                              </div>
                              <h4 class="card-title"><a href="{{url('admin/users/'.$user->id)}}">{{$user->name}} {{$user->surname}}</a>
                                  <br>
                                  <small class="card-description text-muted">{{$user->email}}</small>
                              </h4>
                              <div class="card-body">
                                  <p class="card-description">{{$user->direction}}</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
              <div class="col-md-12">
                  <div style="display: flex;justify-content: center;">
                      {{$users->links()}}
                  </div>
              </div> 
          </div>
          </div>
      </div>
    </div>
  </div>
@endsection

