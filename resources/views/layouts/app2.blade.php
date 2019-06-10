<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="images/iconoGolden.png"  />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/configurar.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) 
  <link href="css/style.css" rel="stylesheet">-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
  <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>


 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    
  <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script><script src="https://unpkg.com/popper.js"></script>


    Scripts
    <script src="{{ asset('js/app.js') }}" defer></script>

    Fonts
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

     Styles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->

    <title>GOLDENVISION-@yield('title')</title>
</head>
<body >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="images/logo.png" style="width: 200px; height: 50px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links --> 
                        @if (Auth::check())
                            <li>
                                <small style="color:#2E519f" >
                                    {{ Auth::user()->us_nombres }} {{ Auth::user()->us_apellidos }}&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span class="caret"></span>
                                </small>
                                 
                            </li> 
                            @if (Auth::user()->ro_id==1)
                        <li class="nav-item">
                                <a  href="administrador"  style="color:#2E519f"><strong>Inicio&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</strong></a>
                        </li>
                        @endif  
                        @if (Auth::user()->ro_id==2 || Auth::user()->ro_id==3)
                        <li class="nav-item">
                                <a  href="secretaria"  style="color:#2E519f"><strong>Inicio&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</strong></a>
                            </li>
                        @endif                          
                        @if (Auth::user()->ro_id==4)
                        <li class="nav-item">
                                <a  href="secretaria"  style="color:#2E519f"><strong>Inicio&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</strong></a>
                            </li>
                        @endif
                            <li class="nav-item">                                  
                                <a  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"  style="color:#2E519f"><strong>
                                                Salir&nbsp;&nbsp;&nbsp;</strong>
                                    </a>        
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                    </form>     
                            </li>  
                            @endif   
                        
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>
