<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
        <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            @yield('title')
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- CSS Files -->
        <link href="{{asset('css/material-kit.css?v=2.0.4')}}" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="{{asset('demo/demo.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/v4-shims.css">
        <style>
          .thumb {
            height: 300px;
            border: 1px solid #000;
            margin: 10px 5px 0 0;
          }
            table{
              table-layout: fixed;
            }

            #miTablaPersonalizada th{
              width: 130px;
              overflow: auto;
              
            }

            .tt-query {
              -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                 -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                      box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            }

            .tt-hint {
              color: #999
            }

            .tt-menu {    /* used to be tt-dropdown-menu in older versions */
              width: 250px;
              margin-top: 4px;
              padding: 4px 0;
              background-color: #fff;
              border: 1px solid #ccc;
              border: 1px solid rgba(0, 0, 0, 0.2);
              -webkit-border-radius: 4px;
                 -moz-border-radius: 4px;
                      border-radius: 4px;
              -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                 -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                      box-shadow: 0 5px 10px rgba(0,0,0,.2);
            }

            .tt-suggestion {
              padding: 3px 20px;
              line-height: 24px;
            }

            .tt-suggestion.tt-cursor,.tt-suggestion:hover {
              color: #fff;
              background-color: #0097cf;

            }

            .tt-suggestion p {
              margin: 0;
            }
        </style>
    </head>

    <body class="@yield('body-class') sidebar-collapse">
        <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
            <div class="container">
                <div class="navbar-translate">
                    <a class="navbar-brand" href="{{url('/')}}">
                        Bela'Shop </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="material-icons">exit_to_app</i> {{ __('Entrar') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="material-icons">person_add</i> {{ __('Registrarse') }}
                            </a>
                        </li>
                        @else
                        <li class="dropdown nav-item">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="material-icons">apps</i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-with-icons" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/home') }}">
                                    <i class="material-icons">
                                        home
                                    </i>{{ __('Home') }}
                                </a>
                                <a class="dropdown-item" href="{{ url('/edit_user') }}">
                                    <i class="material-icons">
                                        settings
                                    </i>{{ __('Config') }}
                                </a>
                                @if (auth()->user()->admin)
                                    <a class="dropdown-item" href="{{ url('/admin/products') }}">
                                    <i class="material-icons">add_shopping_cart</i>{{ __('Gestionar Productos') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/admin/categories') }}">
                                    <i class="material-icons">library_add</i>{{ __('Gestionar categorías') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/admin/orders') }}">
                                    <i class="material-icons">bookmark_border</i>{{ __('Gestionar ordenes') }}
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ url('/change_password') }}">
                                    <i class="material-icons">
                                        vpn_key
                                    </i>{{ __('Cambiar contraseña') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="material-icons">exit_to_app</i>{{ __('Cerrar sesión') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                        @yield('welcome')
<!--                         <li class="nav-item">
    <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" data-original-title="Follow us on Twitter">
        <i class="fa fa-twitter"></i>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" data-original-title="Like us on Facebook">
        <i class="fa fa-facebook-square"></i>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" data-original-title="Follow us on Instagram">
        <i class="fa fa-instagram"></i>
    </a>
</li> -->
                    </ul>
                    <form style="margin-left:30px;color:black;" class="form-inline my-2 my-lg-0" method="get" action="{{url('/search')}}">
                        <input style="color:#bcc7d8;" class="form-control mr-sm-2" type="text" placeholder="Nombre del producto" class="form-control" name="query" id="search">
                        <button class="btn btn-primary btn-just-icon" type="submit">
                            <i class="material-icons">
                                search
                            </i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        
        @yield('content')
            
        <footer class="footer">
            <div class="container">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com">
                                Bela'Shop
                            </a>
                        </li>
                        <li>
                            <a href="https://creative-tim.com/presentation">
                                Sobre nosotros
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright float-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, made with <i class="material-icons">favorite</i> by
                    <a href="#" target="_blank">Danny Caldeira</a>
                </div>
            </div>
        </footer>

        <!--   Core JS Files   -->
        <script src="{{asset('js/core/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/plugins/moment.min.js')}}"></script>
        <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
        <script src="{{asset('js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="{{asset('js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
        <!--  Plugin for Sharrre btn -->
        <script src="{{asset('js/plugins/jquery.sharrre.js')}}" type="text/javascript"></script>
        <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
        <script src="{{asset('js/material-kit.js?v=2.0.4')}}" type="text/javascript"></script>
        <script>
          function archivo(evt) {
              var files = evt.target.files; // FileList object
         
              // Obtenemos la imagen del campo "file".
              for (var i = 0, f; f = files[i]; i++) {
                //Solo admitimos imágenes.
                if (!f.type.match('image.*')) {
                    continue;
                }
         
                var reader = new FileReader();
         
                reader.onload = (function(theFile) {
                    return function(e) {
                      // Insertamos la imagen
                     document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(f);
         
                reader.readAsDataURL(f);
              }
          }
         
          document.getElementById('files').addEventListener('change', archivo, false);
        </script>
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
                $('#search1').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                }, {
                    name: 'products',
                    source: products
                });
                $('#search2').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                }, {
                    name: 'products',
                    source: products
                });
            });
        </script>
    </body>

</html>
