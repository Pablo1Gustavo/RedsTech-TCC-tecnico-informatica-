@extends('../layouts/indexLayout')
@section('title', 'Redstech - LOGIN')
@section('content')
<main class="main-register main-forgot-pass" id="">
    <div class="container">
        <x-jet-validation-errors class="center" style="background-color:#f3f8fc;border-radius:7px;"/>
        <div class="col s12 m12 l12 forgot-pass" id="color">
            <img src="img/Redstone.png" alt="Logo" class="responsive-img register-logo" width="108" height="108">
            <h5 class="register-title text-align center">Recupere sua senha</h5>
            <hr id="hr-forgot-pass">
            <p class="center legend black-text container">Perdeu sua senha? Digite email abaixo para recuperar:</p>    
            <div class="form">
                <form class="col s12" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="row">
                        <div class="input-field col s8 offset-s2 email-field">
                            <input id="email" type="email" name="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s8 offset-s2">
                            <button class="btn-large waves-effect waves-light btn-enviar light-blue darken-4"
                                type="submit">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
