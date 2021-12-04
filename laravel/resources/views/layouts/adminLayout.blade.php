<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/materialize.css')}}">
    <link rel="stylesheet" href="{{url('css/admin.css')}}">
    <link rel="stylesheet" href="{{url('css/reset.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;900&display=swap" rel="stylesheet">
    <title>Admin - @yield('title')</title>
</head>

<body>
    <header class="header">
        <ul id="slide-out" class="sidenav sidenav-fixed light-blue darken-4">

            <li class="center" onclick="location.href='{{route('home')}}'" style='cursor:pointer'>
                    <img src="{{url('img/redstone.png')}}" class="logo-adm" height="40%" width="40%" alt="logo reds">
            </li>
            <li class="center nav-text">
                <h4>ADMIN</h4>
            </li>
            <li>
                <hr id="hr1">
            </li>
            <li>
                <a class="itens center nav-text" href="{{route('admin.course.create')}}">
                    <i class="small material-icons left white-text">book</i>
                    <span class="text-adm">COURSE</span>
                </a>
            </li>
            <li class="itens center">
                <a class="nav-text" href="{{route('admin.post.create')}}">
                    <i class="small material-icons left white-text">assignment</i>
                    <span class="text-adm">POST</span>
                </a>
            </li>
            <li class="itens center">
                <a class="nav-text" href="{{route('admin.lesson.create')}}">
                    <i class="small material-icons left white-text">assignment</i>
                    <span class="text-adm">LESSON</span>
                </a>
            </li>
            <li class="itens center">
                <a class="nav-text" href="{{route('admin.user.list')}}">
                    <i class="small material-icons left white-text">person</i>
                    <span class="text-adm">USERS</span>
                </a>
            </li>
        </ul>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </header>

    @yield('content');

    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="{{url('js/materialize.js')}}"></script>
    <script>
        M.AutoInit();
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, options);
        });
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
    </script>
</body>

</html>