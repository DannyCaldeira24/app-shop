@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title',"Lista de categorias")

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
            <a href="{{url('/admin/categories/create')}}" type="button" class="btn btn-primary">Nueva categoría</a>
            <h2 class="title">Listado de categorias</h2>
            <div class="team">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <table class="table">
                            <thead>
                                <tr id="miTablaPersonalizada">
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td class="text-center">{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td class="td-actions text-right">
                                        <form method="post" action="{{url('/admin/categories/'.$category->id.'/delete')}}">
                                            @csrf
                                            <a href="#" type="button" rel="tooltip" title="Información detallada" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-info"></i>
                                            </a>
                                            <a href="{{url('/admin/categories/'.$category->id.'/edit')}}" rel="tooltip" title="Editar categoria" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="submit" rel="tooltip" title="Eliminar categoria" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div style="display: flex;justify-content: center;">
                            {{$categories->links()}}
                        </div>
                    </div>               
                </div>
            </div>    
        </div>    
      </div>
    </div>
</div>

@endsection
