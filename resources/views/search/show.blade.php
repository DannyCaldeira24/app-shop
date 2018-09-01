@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title',"Resultados de búsqueda")

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
          <p>Se encontraron {{$products->count()}} resultados</p>
          <form class="" method="get" action="{{url('/search')}}">
              <input type="text" placeholder="Nombre del producto" class="form-control" name="query" id="search">
              <button class="btn btn-primary btn-just-icon" type="submit">
                  <i class="material-icons">
                      search
                  </i>
              </button>
          </form>
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
@endsection

@section('scripts')
    <script src="{{asset('/js/typeahead.bundle.min.js')}}"></script>
    <script>
        $(function(){
            //Bloodhound
            var products = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch: '{{url("/products/json")}}'
            });
            //inicializar typeahead sobre nuestro input de búsqueda
            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'products',
                source: products
            });
        });
    </script>
@endsection

