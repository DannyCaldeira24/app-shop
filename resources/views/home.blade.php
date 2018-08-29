@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title',"Bela'Shop Dashboard")

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
              </div><br>
              <div class="name">
                <div style="display: flex;justify-content: center;" class="row">
                    <div class="col-12 col-sm-8">
                        <div class="card">
                            <div class="card-header card-header-text card-header-primary">
                                <h4 class="card-title">Bienvenido {{ Auth::user()->name }}</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="title">@if (auth()->user()->admin) ADMIN @else Cliente @endif</h3>
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
        <div class="description text-center">
          <p>@if (auth()->user()->admin) Como administrador puede gestionar el inventario @else Como cliente puedes hacer solicitudes sobre nuestros productos añadiendolos a tu carrito de compras y realizar pedidos @endif</p>
        </div>
        <div class="tab-content tab-space text-center">
            <div class="team">
                <div class="row">
                  <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile-tabs">
                      <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" href="#carrito" role="tab" data-toggle="tab">
                            <i class="material-icons">
                              shopping_cart
                            </i>Carrito de Compras
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                            <i class="material-icons">
                              markunread_mailbox
                            </i> Pedidos Realizados
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="tab-content tab-space">
                  <div class="tab-pane active text-center gallery" id="carrito">
                    <div class="row">
                      <div class="col-md-12">
                        <p>Tu carrito de compras presenta @if(auth()->user()->cart === null) 0 @else {{auth()->user()->cart->details->count()}} @endif solicitudes de productos agregados al carrito.</p>
                        <br>
                        <table class="table">
                          <thead>
                              <tr id="miTablaPersonalizada">
                                  <th class="text-center">Vista</th>
                                  <th class="text-center">Nombre</th>
                                  <th class="text-center">Precio</th>
                                  <th class="text-center">Cantidad</th>
                                  <th class="text-center">SubTotal</th>
                                  <th class="text-center">Opciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach (auth()->user()->cart->details as $detail)
                              <tr>
                                  <td class="text-center">
                                    <img style="border-radius:100%;height:60px;width:60px;" src="{{$detail->product->featured_image_url}}" alt="">
                                  </td>
                                  <td>
                                    <a href="{{url('/products/'.$detail->product->id)}}" target="_blank">{{$detail->product->name}}</a>
                                  </td>
                                  <td class="text-center">&euro; {{$detail->product->price}}</td>
                                  <td class="text-center">
                                    {{$detail->quantity}}
                                  </td>
                                  <td>&euro;
                                    {{$detail->quantity * $detail->product->price}}
                                  </td>
                                  <td class="td-actions text-center">
                                      <form method="post" action="{{url('/cart')}}">
                                          @csrf
                                          {{method_field('DELETE')}}
                                          <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                                          <a href="{{url('/products/'.$detail->product->id)}}" target="_blank" type="button" rel="tooltip" title="Información detallada" class="btn btn-info btn-simple btn-xs">
                                              <i class="fa fa-info"></i>
                                          </a>
                                          <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                          <i class="fa fa-times"></i>
                                          </button>
                                      </form>
                                  </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <form method="post" action="{{url('/order')}}">
                            @csrf
                            <button class="btn btn-primary btn-link">Realizar pedido</button>
                          </form>   
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane text-center gallery" id="favorite">
                    <div class="row">
                      <div class="col-md-3 ml-auto">
                        <img src="../assets/img/examples/mariya-georgieva.jpg" class="rounded">
                        <img src="../assets/img/examples/studio-3.jpg" class="rounded">
                      </div>
                      <div class="col-md-3 mr-auto">
                        <img src="../assets/img/examples/clem-onojeghuo.jpg" class="rounded">
                        <img src="../assets/img/examples/olu-eletu.jpg" class="rounded">
                        <img src="../assets/img/examples/studio-1.jpg" class="rounded">
                      </div>
                    </div>
                  </div>               
                </div>
              </div>
            </div>
        </div>  
    </div>    
</div>
@endsection

