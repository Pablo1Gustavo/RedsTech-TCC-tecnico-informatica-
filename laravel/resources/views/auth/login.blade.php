@extends('../layouts/indexLayout')
@section('title', 'Redstech - LOGIN')
@section('content')

    <main>
        <div class="row container main-login">
            <div class="col s12 m6 l7 hide-on-med-and-down description" id="color">
                <img src="{{url('img/creeper.png')}}" alt="Creeper" class="responsive-img" id="creeper" width="156" height="106">
                <div class="content-text container">
                    <h2 class="black-text creeper-title">Se aventure!</h2>
                    <p class="black-text creeper-paragraph">
                        O Redstech é uma plataforma de aprendizado <br>
                        onde se usa do jogo Minecraft para aplicar <br>
                        conceitos de várias áreas do conhecimento. <br>
                        Acesse nosso site e veja <br>
                        as possibilidades que o <br>
                        jogo tem pra lhe oferecer. <br>
                        Aprenda jogando!</p>
                </div>
            </div>
            <div class="col s12 m12 l5 login" id="color">
                <img src="{{url('img/Redstone.png')}}" 
                     alt="Logo" 
                     class="responsive-img logo" 
                     width="108" 
                     height="108"
                >
                <h5 class="login-title text-align center">Logar</h5>
                <hr id="hr-login">
                <div class="row form">
                    <form class="col s12" 
                            action="{{ route('login') }}" 
                            method="POST"
                    >
                        @csrf
                        <div class="row">
                            <div class="input-field col s8 offset-s2">
                                <input  id="email" 
                                        type="email" 
                                        class="validate"
                                        name="email" :value="old('email')" 
                                        required autofocus
                                >
                                <label for="email" value="{{ __('Email') }}">
                                    Email
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8 offset-s2">
                                <input  id="password" 
                                        type="password" 
                                        class="validate"
                                        name="password" 
                                        required autocomplete="current-password"
                                >
                                <label for="password" value="{{ __('Password') }}">
                                    Senha
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s8 offset-s2">
                                <button class="btn-large waves-effect waves-light btn-enviar light-blue darken-4"
                                        type="submit" 
                                        name="action"
                                >
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s8 offset-s2 center-align">
                                <a href="{{ route('password.request') }}" class="forgot-pass">
                                    Esqueceu sua senha?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection