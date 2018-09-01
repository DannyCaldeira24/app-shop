@extends('layouts.app')

@section('body-class', 'landing-page')

@section('title',"Bienvenido a Bela'Shop")

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title">Bienvenido a Bela'Shop.</h1>
                <h4 style="text-align:justify">Creemos tener lo que estas buscando, desde carteras hasta zarcillos. Podemos decirte que somos la mejor opción pero pensamos que es mejor darte la oportunidad de que pruebes por ti mismo y asi nos cuentes. Estamos enfocados en la experiencia de usuario, nuestra prioridad eres tu, no dudes en contactarnos tus segurencias las vemos como nuestras.</h4>
                <br>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
                    <i class="fa fa-play"></i> Ver video
                </a>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="title">Perfecto, seamos concisos</h2>
                    <h5 class="description">Sabemos que tu tiempo es valioso, y nosotros no queremos que lo pierdas divagando, asi que te ofrecemos.</h5>
                </div>
            </div>
            <div class="features">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-info">
                                <i class="material-icons">chat</i>
                            </div>
                            <h4 class="info-title">Atendemos tus dudas</h4>
                            <p>Te ofrecemos una pronta atención al cliente, no dudes en contactarnos. Estamos en la capacidad de darte información actualizada de nuestras productos y servicios a todas horas, como también somos capaces de guiarte en como hacer tus pedidos.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Pago seguro</h4>
                            <p>Le ofrecemos metodos de pagos que mas se ajusten a sus necesidades, y estamos capacitados para verificar cada una de sus compras, por lo que no debe preocuparse por ello.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">fingerprint</i>
                            </div>
                            <h4 class="info-title">Privacidad</h4>
                            <p>Solo usted a través del panel de usuario una vez haya iniciado sesión tendra acceso a cualquier información sobre sus pedidos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section text-center">
            <hr>
            <h2 class="title">Visita nuestras categorías</h2>
            
            <form class="" method="get" action="{{url('/search')}}">
                <input type="text" placeholder="Nombre del producto" class="form-control" name="query" id="search">
                <button class="btn btn-primary btn-just-icon" type="submit">
                    <i class="material-icons">
                        search
                    </i>
                </button>
            </form>
            <div class="team">
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-md-4">
                        <div class="team-player">
                            <div class="card card-plain">
                                <div class="col-md-6 ml-auto mr-auto">
                                    <img style="width:150px;height:150px" src="{{$category->featured_image_url}}" alt="Imagen representativa de la categoria {{$category->name}}" class="img-raised rounded-circle img-fluid">
                                </div>
                                <h4 class="card-title"><a href="{{url('/categories/'.$category->id)}}">{{$category->name}}</a>
                                    <br>
                                </h4>
                                <div class="card-body">
                                    <p class="card-description">{{$category->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> 
            </div>
        </div>
        <div class="section section-contacts">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="text-center title">Contactenos</h2>
                    <h4 class="text-center description">Nuestra prioridad eres tu por lo tanto escribenos a cualquier hora del día, estamos capacitados para ayudarle. También atendemos sus sugerencias buscamos mejorar por y para nuestros clientes.</h4>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Su nombre y apellido</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Su Email</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleMessage" class="bmd-label-floating">Escriba su mensaje</label>
                            <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 ml-auto mr-auto text-center">
                                <button class="btn btn-primary btn-raised">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </form>
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
