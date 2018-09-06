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
                                          <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                          <i class="fa fa-times"></i>
                                          </button>
                                      </form>
                                  </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <p><strong>Importe a pagar: </strong>{{auth()->user()->cart->total}} &euro;</p> 
                          <form method="post" action="{{url('/order')}}">
                            @csrf
                            
                            <button class="btn btn-primary btn-link">Realizar pedido</button>
                          </form>   
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane text-center gallery" id="favorite">
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table">
                          <thead>
                              <tr id="miTablaPersonalizada">
                                  <th class="text-center">Vista</th>
                                  <th class="text-center">#Orden</th>
                                  <th class="text-center">Nombre</th>
                                  <th class="text-center">Precio</th>
                                  <th class="text-center">Cantidad</th>
                                  <th class="text-center">SubTotal</th>
                                  <th class="text-center">Estado</th>
                                  <th class="text-center">Total</th>
                                  <th class="text-center">Opciones</th>
                              </tr>
                          </thead>
                          <tbody>
                                @php
                                  $n_order=1
                                @endphp
                              @foreach (auth()->user()->carts as $cart)
                                @php
                                  $cont=0
                                @endphp
                                @if($cart->status!='Active')                    
                                 @foreach ($cart->details as $detail)
                                  <tr>
                                      <td class="text-center">
                                        <img style="border-radius:100%;height:60px;width:60px;" src="{{$detail->product->featured_image_url}}" alt="">
                                      </td>
                                      <td class="text-center">
                                        {{$n_order}}
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
                                      <td>
                                        {{$cart->status}}
                                      </td>
                                      <td class="td-actions text-center">
                                        @php
                                          $cont+=$detail->quantity * $detail->product->price
                                        @endphp
                                        {{$cont}}
                                      </td>
                                      <td class="td-actions text-center">
                                          <a href="{{url('/order/trans/'.$cart->id)}}" rel="tooltip" title="Subir imagen con la transferencia" class="btn btn-primary btn-simple btn-xs">
                                              <i class="material-icons">add_photo_alternate</i>
                                          </a>
                                          <form method="post" action="{{url('/destroy/order')}}">
                                              @csrf
                                              {{method_field('DELETE')}}
                                              <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                                              <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                              <i class="fa fa-times"></i>
                                              </button>
                                          </form>
                                      </td>
                                  </tr>
                                  @endforeach
                                  @php
                                    $n_order++
                                  @endphp
                                  @endif 
                                
                              @endforeach
                            </tbody>
                          </table> 
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

