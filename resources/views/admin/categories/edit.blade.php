@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title',"Editar categoria")

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
                <img src="{{asset('img/faces/christian.jpg')}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title">Christian Louboutin</h3>
                <h6>Admin</h6>
              </div>
            </div>
          </div>
        </div>
<!--         <div class="description text-center">
  <p>Como administrador puede gestionar nuestros productos</p>
</div> -->
        <div class="tab-content tab-space text-center">
            <div class="team">
                <div style="display: flex;justify-content: center;" class="row">
                    <div class="col-12 col-sm-8">
                        <div class="card">
                            <div class="card-header card-header-text card-header-primary">
                                <h4 class="card-title">Editar Categoría</h4>
                                <p class="category">Datos de la categoría</p>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                   <div class="alert alert-danger">
                                       <ul>
                                           @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                           @endforeach
                                       </ul>
                                   </div> 
                                @endif
                                <form method="POST" action="{{ url('/admin/categories/'.$category->id.'/edit') }}">
                                    @csrf
                                      <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" name="name" value="{{old('name', $category->name)}}">
                                      </div>
                                      <div class="form-group">
                                        <textarea class="form-control" name="description" rows="5">{{old('description', $category->description)}}</textarea>
                                      </div>
                                      <button class="btn btn-primary">
                                          Guardar cambios
                                      </button>&nbsp;&nbsp;&nbsp;
                                      <a href="{{url('/admin/categories')}}" type="button" class="btn btn-danger">Cancelar</a> 
                                </form>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
             <a href="{{url('/admin/categories')}}" type="button" class="btn btn-primary">Ver categorias</a>    
        </div>    
      </div>
    </div>
</div>

@endsection

