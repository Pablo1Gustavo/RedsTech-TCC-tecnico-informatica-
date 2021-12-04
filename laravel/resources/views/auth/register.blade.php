@extends('../layouts/indexLayout')
@section('title', 'Redstech - LOGIN')
@section('content')

    <main id="main-register">
        <div class="row container">
            <div class="col s12 m12 l12 register" id="color">
                <img src="img/Redstone.png" alt="Logo" class="responsive-img register-logo" width="108" height="108">
                <h5 class="register-title text-align center">Registrar</h5>
                <hr id="hr-register">
                <div class="row form">
                    <div class="row">
                        <x-jet-validation-errors class="mb-4" style="text-align:center; max-height:30px" />
                    </div>
                    <div class="row">
                        <form class="col s12" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="input-field col s8 offset-s2">
                                    <input  id="name" 
                                            type="text" 
                                            class="validate"
                                            name="name" :value="old('name')" 
                                            required autofocus autocomplete="name"
                                    >
                                    <label for="name" value="{{ __('Name') }}">
                                        Nome
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s8 offset-s2">
                                    <input  id="email" 
                                            type="email" 
                                            class="validate"
                                            name="email" :value="old('email')" required
                                    >
                                    <label for="email" value="{{ __('Email') }}">
                                        E-mail
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s8 offset-s2">
                                    <input  id="password" 
                                            type="password" 
                                            class="validate"
                                            name="password" 
                                            required autocomplete="new-password"
                                    >
                                    <label for="password" value="{{ __('Password') }}">
                                        Senha
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s8 offset-s2">
                                    <input  id="conf-password" 
                                            type="password" 
                                            class="validate"
                                            name="password_confirmation" 
                                            required autocomplete="new-password"
                                    >
                                    <label for="conf-password" value="{{ __('Confirm Password') }}">
                                        Confirmar senha
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s8 offset-s2">
                                    <button class="btn-large waves-effect waves-light btn-enviar light-blue darken-4"
                                            type="submit" 
                                            name="action"
                                    >
                                        Registrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection