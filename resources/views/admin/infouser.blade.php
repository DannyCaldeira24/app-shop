@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title',"Bela'Shop Dashboard")

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
            <div style="margin-bottom: -70px;" class="profile">
              <div class="avatar">
                <a title="Cambiar imagen de perfil" href="{{url('/user/edit')}}">
                  <img src="{{asset('images/users/'. $user->avatar)}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                </a>
              </div>
              <br>
              <div class="name">
                <div style="display: flex;justify-content: center;" class="row">
                    <div class="col-12 col-sm-8">
                        <div class="card">
                            <div class="card-header card-header-text card-header-primary">
                                <h4 class="card-title">{{ $user->name }} {{ $user->surname }}</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="title">@if ($user->admin) ADMIN @else Cliente @endif</h5>
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
        <div class="tab-content tab-space text-center">
            <div class="team">
                <div class="row">
                  <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile-tabs">
                      <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
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
                              </tr>
                          </thead>
                          <tbody>
                              @php
                                $n_order=1
                              @endphp
                              @foreach ($user->carts as $cart)
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
                                  </tr>
                                  @endforeach
                                  @php
                                    $n_order++
                                  @endphp
                                  @endif 
                                
                              @endforeach
                            </tbody>
                          </table>
                          <br>
                          <p><strong>Cantidad de pedidos realizados: </strong>{{$n_order-1}}</p> 
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

