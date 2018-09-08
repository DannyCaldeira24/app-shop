@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title',"Imagenes de producto")

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
                            <form method="post" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header card-header-text card-header-primary">
                                    <h4 class="card-title">Subir imagen</h4>
                                    <p class="category">Eliga la imagen que desea agregar al producto</p>
                                    <input type="file" id="files" name="photo" />
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
                                <a href="{{url('/admin/products')}}" type="button" type="button" class="btn btn-danger btn-round">Volver</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
               
            <h2 class="title">Imágenes del producto "{{$product->name}}"</h2>
            <div class="team">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="row">
                            @foreach ($images as $image)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img style="width:250px;height:250px" src="{{$image->url}}" alt="">
                                        <form method="post" action="">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <input type="hidden" name="image_id" value="{{$image->id}}">
                                            <button type="submit" class="btn btn-danger btn-round">Eliminar imagen</button>
                                            @if ($image->featured)
                                                <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada de este producto">
                                                    <i class="material-icons">favorite</i>
                                                </button>
                                            @else
                                                <a href="{{url('/admin/products/'.$product->id.'/images/select/'.$image->id)}}" class="btn btn-primary btn-fab btn-fab-mini btn-round" rel="tooltip" title="Destacar esta imagen">
                                                    <i class="material-icons">favorite</i>
                                                </a>
                                            @endif    
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>            
                </div>
            </div>    
        </div>    
      </div>
    </div>
</div>

@endsection
