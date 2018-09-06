@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title',"Ordenes")

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
        <div class="row">
          <div class="col-md-10 ml-auto mr-auto">
            <div class="profile-tabs">
              <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                    <i class="material-icons">lock</i> Pendiente
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                    <i class="material-icons">cancel_presentation</i> Cancelado
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                    <i class="material-icons">report_problem</i> Rechazado
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#accepted" role="tab" data-toggle="tab">
                    <i class="material-icons">playlist_add_check</i> Aceptado
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#finish" role="tab" data-toggle="tab">
                    <i class="material-icons">done_all</i> Finalizado
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="tab-content tab-space">
          <div class="tab-pane active text-center gallery" id="studio">
              <div class="row">
                <div class="col-md-12">
                  <table class="table">
                    <thead>
                        <tr id="miTablaPersonalizada">
                            <th class="text-center">#Orden</th>
                            <th class="text-center">Fecha de Orden</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Id de Usuario</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_pending as $order)
                          <tr>
                              <td class="text-center">
                                {{$order->id}}
                              </td>
                              <td class="text-center">
                                {{$order->order_date}}
                              </td>
                              <td>
                                {{$order->status}}
                              </td>
                              <td>
                                {{$order->user_id}}
                              </td>
                              <td class="td-actions text-center">
                                  <form method="post" action="{{url('/admin/order/accepted/'.$order->id)}}">
                                      @csrf
                                      <a href="{{url('/admin/orders/'.$order->id)}}" rel="tooltip" title="Info" class="btn btn-info btn-simple btn-xs" target="_blank">
                                        <i class="fa fa-info"></i> 
                                      </a>
                                      <button type="submit" rel="tooltip" title="Aceptar orden" class="btn btn-success btn-simple btn-xs">
                                      <i class="fa fa-check"></i>
                                      </button>
                                  </form>
                                  <form method="post" action="{{url('/admin/order/reject/'.$order->id)}}">
                                      @csrf
                                      <button type="submit" rel="tooltip" title="Rechazar orden" class="btn btn-danger btn-simple btn-xs">
                                      <i class="fa fa-times"></i>
                                      </button>
                                  </form>
                              </td>
                          </tr>                        
                        @endforeach
                      </tbody>
                    </table> 
                </div>
              </div>
          </div>
          <div class="tab-pane text-center gallery" id="works">
              <div class="row">
                <div class="col-md-12">
                  <table class="table">
                    <thead>
                        <tr id="miTablaPersonalizada">
                            <th class="text-center">#Orden</th>
                            <th class="text-center">Fecha de Orden</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Id de Usuario</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_cancelled as $order)
                          <tr>
                              <td class="text-center">
                                {{$order->id}}
                              </td>
                              <td class="text-center">
                                {{$order->order_date}}
                              </td>
                              <td>
                                {{$order->status}}
                              </td>
                              <td>
                                {{$order->user_id}}
                              </td>
                              <td class="td-actions text-center">
                                  <form method="post" action="">
                                      @csrf
                                      <input type="hidden" name="" value="">
                                      <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                      <i class="fa fa-times"></i>
                                      </button>
                                  </form>
                              </td>
                          </tr>                       
                        @endforeach
                      </tbody>
                    </table> 
                </div>
              </div>
          </div>
          <div class="tab-pane text-center gallery" id="favorite">
              <div class="row">
                <div class="col-md-12">
                  <table class="table">
                    <thead>
                        <tr id="miTablaPersonalizada">
                            <th class="text-center">#Orden</th>
                            <th class="text-center">Fecha de Orden</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Id de Usuario</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_rejected as $order)
                          <tr>
                              <td class="text-center">
                                {{$order->id}}
                              </td>
                              <td class="text-center">
                                {{$order->order_date}}
                              </td>
                              <td>
                                {{$order->status}}
                              </td>
                              <td>
                                {{$order->user_id}}
                              </td>
                              <td class="td-actions text-center">
                                  <form method="post" action="">
                                      @csrf
                                      <a href="{{url('/admin/orders/'.$order->id)}}" rel="tooltip" title="Info" class="btn btn-info btn-simple btn-xs" target="_blank">
                                        <i class="fa fa-info"></i> 
                                      </a>
                                      <input type="hidden" name="" value="">
                                      <button type="submit" rel="tooltip" title="Aceptar" class="btn btn-danger btn-simple btn-xs">
                                      <i class="fa fa-times"></i>
                                      </button>
                                  </form>
                              </td>
                          </tr>                       
                        @endforeach
                      </tbody>
                    </table> 
                </div>
              </div>
          </div>
          <div class="tab-pane text-center gallery" id="accepted">
              <div class="row">
                <div class="col-md-12">
                  <table class="table">
                    <thead>
                        <tr id="miTablaPersonalizada">
                            <th class="text-center">#Orden</th>
                            <th class="text-center">Fecha de Orden</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Id de Usuario</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_accepted as $order)
                          <tr>
                              <td class="text-center">
                                {{$order->id}}
                              </td>
                              <td class="text-center">
                                {{$order->order_date}}
                              </td>
                              <td>
                                {{$order->status}}
                              </td>
                              <td>
                                {{$order->user_id}}
                              </td>
                              <td class="td-actions text-center">
                                  <form method="post" action="{{url('/admin/order/finish/'.$order->id)}}">
                                      @csrf
                                      <a href="{{url('/admin/orders/'.$order->id)}}" rel="tooltip" title="Info" class="btn btn-info btn-simple btn-xs" target="_blank">
                                        <i class="fa fa-info"></i> 
                                      </a>
                                      <button type="submit" rel="tooltip" title="Finalizar orden" class="btn btn-success btn-simple btn-xs">
                                      <i class="fa fa-check"></i>
                                      </button>
                                  </form>
                                  <form method="post" action="">
                                      @csrf
                                      <input type="hidden" name="" value="">
                                      <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                      <i class="fa fa-times"></i>
                                      </button>
                                  </form>
                              </td>
                          </tr>                       
                        @endforeach
                      </tbody>
                    </table> 
                </div>
              </div>
          </div>
          <div class="tab-pane text-center gallery" id="finish">
              <div class="row">
                <div class="col-md-12">
                  <table class="table">
                    <thead>
                        <tr id="miTablaPersonalizada">
                            <th class="text-center">#Orden</th>
                            <th class="text-center">Fecha de Orden</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Id de Usuario</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_finish as $order)
                          <tr>
                              <td class="text-center">
                                {{$order->id}}
                              </td>
                              <td class="text-center">
                                {{$order->order_date}}
                              </td>
                              <td>
                                {{$order->status}}
                              </td>
                              <td>
                                {{$order->user_id}}
                              </td>
                              <td class="td-actions text-center">
                                  <form method="post" action="">
                                      @csrf
                                      <a href="{{url('/admin/orders/'.$order->id)}}" rel="tooltip" title="Info" class="btn btn-info btn-simple btn-xs" target="_blank">
                                        <i class="fa fa-info"></i> 
                                      </a>
                                      <input type="hidden" name="" value="">
                                      <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                      <i class="fa fa-times"></i>
                                      </button>
                                  </form>
                              </td>
                          </tr>                       
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

@endsection
