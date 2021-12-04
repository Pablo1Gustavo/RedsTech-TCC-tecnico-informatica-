<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{url('css/materialize.css')}}">
    <link rel="stylesheet" href="@yield('css')">
    <link rel="stylesheet" href="{{url('css/reset.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="light-blue darken-4 nav">
            <div class="nav-wrapper">
                <a href="/home" class="brand-logo show-on-large hide-on-med-and-down center">
                    <img src="{{url('img/Redstone.png')}}" 
                        class="circle logo-img-nav" 
                        dth="28px"
                        height="28px"
                    >
                    <span>Redstech</span>
                </a>
                <a  href="/home" class="brand-logo right hide-on-large-only">
                    <img src="{{url('img/Redstone.png')}}" class="circle logo-img-nav" dth="28px" height="28px">
                    <span>Redstech</span>
                </a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li
                        @if(substr($_SERVER["REQUEST_URI"], 1, 4) == 'blog')
                            style="background-color: #014E8B";
                        @endif
                    >
                        <a href="/blog">
                            <i class="tiny material-icons left">
                                assignment
                            </i>
                            BLOG
                        </a>
                    </li>
                    <li
                        @if(substr($_SERVER["REQUEST_URI"], 1, 4) == 'cour')
                            style="background-color: #014E8B";
                        @endif
                    >
                        <a href="/courses">
                            <i class="tiny material-icons left">
                                class
                            </i>
                            CURSOS
                        </a>
                    </li>
                    <li
                        @if(substr($_SERVER["REQUEST_URI"], 1, 4) == 'sobr')
                            style="background-color: #014E8B";
                        @endif
                    >
                        <a href="/about">
                            <i class="tiny material-icons left">
                                group
                            </i>
                            SOBRE
                        </a>
                    </li>
                </ul>
                <ul class="right hide-on-med-and-down">
                    <li class="user-li">
                        <a href="/profile">
                            <img 
                                
                                @if(@isset(Auth::user()->image))
                                    src="{{url('img/users/'.Auth::user()->image)}}"
                                @else
                                    src="{{url('img/userdefault.png')}}"
                                @endif
                                alt="user padrão" 
                                id="user-img"
                                class="circle" 
                                dth="36px" 
                                height="36px"
                            >
                            <span id="username">
                                {{Auth::user()->name}}
                            </span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="/logout">
                            @csrf
                            <a href="/logout" onclick="event.preventDefault();this.closest('form').submit();">
                                <i class="tiny material-icons left">
                                    logout
                                </i>
                                SAIR
                            </a>
                        </form>
                </li>
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="mobile-demo">
            <li class="user-li">
                <a href="/profile">
                    <img 
                        @if(@isset(Auth::user()->image))
                            src="{{url('img/users/'.Auth::user()->image)}}"
                        @else
                            src="{{url('img/userdefault.png')}}"
                        @endif
                        alt="user padrão" 
                        id="user-img" 
                        class="circle user-img-small"
                        dth="36px" height="36px"
                    >
                    <span id="username" class="username-small">
                        User
                    </span>
                </a>
            </li>
            <li>
                <a href="/blog">
                    <i class="tiny material-icons left">
                        assignment
                    </i>
                    BLOG
                </a>
            </li>
            <li>
                <a href="/courses">
                    <i class="tiny material-icons left">
                        class
                    </i>
                    CURSOS
                </a>
            </li>
            <li>
                <a href="/sobre">
                    <i class="tiny material-icons left">
                        group
                    </i>
                    SOBRE
                </a>
            </li>
            <li>
                <form method="POST" action="/logout">
                    @csrf
                    <a href="/logout" onclick="event.preventDefault();this.closest('form').submit();">
                        <i class="tiny material-icons left">
                            logout
                        </i>
                        SAIR
                    </a>
            </form>
            </li>
        </ul>
    </header>
    @yield('content')

    <footer class="page-footer light-blue darken-4" id="foot">
        <div class="container">
            <br>
            <div class="row">
                <div class="col l2 s4 hide-on-med-and-down">
                    <img id="footer-img" src="{{url('img/Redstone.png')}}" width="130" height="130" alt="redstone footer">
                </div>

                <div class="col l2 s12 hide-on-large-only center">
                    <img src="{{url('img/Redstone.png')}}" width="120" height="130" alt="redstone footer">
                </div>

                <div class="col l2 s4 hide-on-med-and-down">
                    <h5 class="white-text">Mapa</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="/blog">Blog</a></li>
                        <li><a class="grey-text text-lighten-3" href="/courses">Cursos</a></li>
                        <li><a class="grey-text text-lighten-3" href="/blog">Posts</a></li>
                    </ul>
                </div>

                <div class="col l2 s12 hide-on-large-only center">
                    <h5 class="white-text">Mapa</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="/blog">Blog</a></li>
                        <li><a class="grey-text text-lighten-3" href="/courses">Cursos</a></li>
                        <li><a class="grey-text text-lighten-3" href="/blog">Posts</a></li>
                    </ul>
                </div>

                <div class="col l4 offset-l2 s4 hide-on-med-and-down">
                    <p class="grey-text text-lighten-4">
                        Este projeto foi criado por:<br/><br/>
                        Charles Eduardo Araújo de Faria<br/>
                        Gabriel Victor de Araújo Pereira<br/>
                        Otávio Augusto Couto de Castro<br/>
                        Pablo Gustavo Fernandes Maia
                    </p>
                </div>

                <div class="col l4 s12 center hide-on-large-only">
                    <p class="grey-text text-lighten-4">
                        Este projeto foi criado por:<br/><br/>
                        Charles Eduardo Araújo de Faria<br/>
                        Gabriel Victor de Araújo Pereira<br/>
                        Otávio Augusto Couto de Castro<br/>
                        Pablo Gustavo Fernandes Maia
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <p class="grey-text text-lighten-4 left">@Copyright ©2021 | RedsTech</p>
                <p class="grey-text text-lighten-4 right">Powered by REDSTECH</p>
            </div>
        </div>
    </footer>

    @if(!Auth::user()->email_verified_at)
        <div id="modal1" class="modal">
            <div class="modal-content red lighten-5">
                <h4>Verifique seu e-mail</h4>
                <p>É importante que você verifique seu e-mail e ative a conta.</p>
            </div>
            <div class="modal-footer red lighten-5">
                <form method="POST" action="" style="display:inline">
                    @csrf
                    <button class="green lighten-4 btn-flat" type="submit">
                        Reenviar E-mail
                    </button>
                </form>
                <a href="#!" class="modal-close white btn-flat">Entendi</a>
            </div>
        </div>
    @endif

    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="{{url('js/materialize.js')}}"></script>
    <script>
        M.AutoInit();

        $(document).ready(function () {
            $('.sidenav').sidenav();
        });

        $(document).ready(function () {
            $('.slider').slider({ "height": 600 });
        });

        $(document).ready(function () {
            $('.modal').modal();
        });
        
        @if(!Auth::user()->email_verified_at)
            $(document).ready(function(){
                $('#modal1').modal('open');
            });
        @endif
    </script>
</body>

</html>