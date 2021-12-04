<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{url('css/login.css')}}">
    <link rel="stylesheet" href="{{url('css/materialize.css')}}">
    <link rel="stylesheet" href="{{url('css/reset.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="light-blue darken-4 nav">
            <div class="nav-wrapper">
                <a href="home" class="brand-logo show-on-large hide-on-med-and-down center">
                    <img src="{{url('img/Redstone.png')}}" 
                         class="circle logo-img-nav" 
                         dth="28px" 
                         height="28px"
                    >
                    <span>
                        Redstech
                    </span>
                </a>
                <a href="home" class="brand-logo right hide-on-large-only logo-nav">
                    <img src="{{url('img/Redstone.png')}}" 
                         class="circle logo-img-nav" 
                         dth="28px" 
                         height="28px"
                    >
                    <span>
                        Redstech
                    </span>
                </a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li 
                        @if($_SERVER["REQUEST_URI"] == "/" || $_SERVER["REQUEST_URI"] == "/login")
                            style="background-color: #014E8B"
                        @endif
                    >
                        <a href="login">
                            LOGIN
                        </a>
                    </li>
                    <li
                        @if($_SERVER["REQUEST_URI"] == "/register")
                            style="background-color: #014E8B"
                        @endif
                    >
                        <a href="register">
                            REGISTRAR
                        </a>
                    </li>
                </ul>
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li>
                        <a href="about">
                            <i class="tiny material-icons left">
                                group
                            </i>
                            SOBRE
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-demo">
            <li>
                <a href="login">
                    LOGIN
                </a>
            </li>
            <li>
                <a href="register">
                    REGISTRAR
                </a>
            </li>
            <li>
                <a href="sobre">
                    <i class="tiny material-icons right">
                        group
                    </i>
                    SOBRE
                </a>
            </li>
        </ul>
    </header>


    @yield('content')

    
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="{{url('js/materialize.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.sidenav').sidenav();
        });
    </script>
</body>

</html>