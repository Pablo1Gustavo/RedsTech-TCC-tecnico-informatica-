@extends('layouts.main')
@section('title', 'Redstech - USUARIO')
@section('css', 'css/user.css')
@section('content')
    <main>
        <div class="white center" id="post-container">
            <form action="updateProfileImage" name="photo" method="POST" enctype="multipart/form-data">
                @csrf
                <h4 id="pag-user-text">Página do usuário</h4>
                <img 
                    @if(@isset($user->image))
                        src="{{url('img/users/'.$user->image)}}"
                    @else
                        src="img/userdefault.png"
                    @endif
                    alt="Imagem do Usuário" 
                    id="user-img"
                    class="circle"
                    dth="180px"
                    height="180px"
                >
                <label class="change-profile">
                    <input type="file" name="image" onchange="document.forms['photo'].submit()">
                </label>
                
            </form>

            <div class="container" id="info-user">
                <form action="updateProfileData" name="data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input
                                value="{{$user->name}}" 
                                name="name"
                                id="username" 
                                type="text" 
                                class="validate"
                                onchange="document.forms['data'].submit()"
                            >
                            <label class="lb" for="username">
                                Username
                            </label>
                        </div>
                    </div>
                    <div class="row info-input">
                        <div class="input-field col s12">
                            <input 
                                value="{{$user->email}}" 
                                name="email"
                                id="email" 
                                type="text"
                                class="validate"
                                onchange="document.forms['data'].submit()"
                            >
                            <label for="email">
                                Email
                            </label>
                        </div>
                    </div>
                </form>
            </div>
    </main>
    @if($errorMsg != '')
        <script>
            alert('{{$errorMsg}}');
        </script>
    @endif
@endsection