@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title',"Bela'Shop Dashboard")

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/city-profile.jpg')}}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="{{$category->featured_image_url}}" alt="Imagen representativa de la categoria {{$category->name}} " class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title">{{$category->name}}</h3>
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
          <p>{{$category->description}}</p>
        </div>
        <div class="section text-center">
            <hr>
            <h2 class="title">Productos disponibles</h2>
            <hr>
            <div class="team">
              <div class="row">
                  @foreach ($products as $product)
                  <div class="col-md-4">
                      <div class="team-player">
                          <div class="card card-plain">
                              <div class="col-md-6 ml-auto mr-auto">
                                  <img style="width:150px;height:150px" src="{{$product->featured_image_url}}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                              </div>
                              <h4 class="card-title"><a href="{{url('/products/'.$product->id)}}">{{$product->name}}</a>
                                  <br>
                                  <small class="card-description text-muted">{{$product->category_name}}</small>
                              </h4>
                              <div class="card-body">
                                  <p class="card-description">{{$product->description}}</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
              <div class="col-md-12">
                  <div style="display: flex;justify-content: center;">
                      {{$products->links()}}
                  </div>
              </div> 
          </div>
          </div>
      </div>
    </div>
  </div>
        <!-- Modal -->
  <div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Seleccione la cantidad que desea agregar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="{{url('/cart')}}">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">

            <div class="modal-body">
              <input type="number" name="quantity" value="1">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Añadir al carrito</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection

