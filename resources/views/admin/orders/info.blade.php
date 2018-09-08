@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title',"Ordenes")

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
              <h5>Información de la orden {{$order_info->id}}</h5>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table class="table">
              <thead>
                  <tr id="miTablaPersonalizada">
                      <th class="text-center">Vista</th>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Precio</th>
                      <th class="text-center">Cantidad</th>
                      <th class="text-center">SubTotal</th>
                      <th class="text-center">Total</th>
                  </tr>
              </thead>
              <tbody>
                    @php
                      $cont=0
                    @endphp                                     
                     @foreach ($order_info->details as $detail)
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
                            @php
                              $cont+=$detail->quantity * $detail->product->price
                            @endphp
                            {{$cont}}
                          </td>
                      </tr>
                      @endforeach
                </tbody>
              </table>
              <div class="text-center"> 
                <p><strong>Importe a pagar: </strong>{{$cont}} &euro;</p><br>
                <h3>Imagen de la transferencia</h3>
                <img style="max-height:350px;max-width:350px;" src="{{asset('images/carts/'. $order_info->order_trans)}}" alt="">
              </div>
              <div style="padding:20px" class="text-center">
                <a href="{{url('/admin/orders')}}">Ordenes de compra</a>
              </div> 
          </div>
        </div>   
      </div>
    </div>
</div>

@endsection
