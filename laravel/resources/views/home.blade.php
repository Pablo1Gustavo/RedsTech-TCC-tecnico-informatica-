@extends('layouts.main')
@section('title', 'Redstech - HOME')
@section('css', 'css/home.css')
@section('content')

    <main>
        <div class="slider">
            <ul class="slides">
                <li>
                    <img src="img/minewpp.png">
                    <div class="caption center-align">
                        <h3>Bem-vindo ao Redstech</h3>
                        <h5 class="light grey-text text-lighten-3">O Minecraft possui infinitas possibilidades</h5>
                    </div>
                </li>
                <li>
                    <img src="img/exeletronica.jpg">
                    <div class="caption center-align">
                    </div>
                </li>
                <li>
                    <img src="img/aaa.png">
                    <div class="caption left-align">
                    </div>
                </li>
            </ul>
        </div>

        <hr id="hr1">

        <div class="container" id="divcards">

            <h3 class="center-align">Últimas postagens</h3>

            <div class="row" id="between-ultcard">
                @php 
                    $count = 0;
                    $colNum = 0;
                @endphp
                @foreach($lastPosts as $lastPost)
                    @if($count == 3)
                        @break
                    @endif
                    <div class="col s12 m4 l3">
                        <div class="card card-length">
                            <div class="card-image">
                                <img src="img/redsore.png" width="400">
                                @php $color = ['blue','green','purple'][$colNum++%3]; @endphp
                                <a class="btn-floating halfway-fab waves-effect waves-light {{$color}}">
                                    <i class="material-icons">keyboard_arrow_right</i>
                                </a>
                            </div>
                            <div class="card-content">
                                <span class="card-title" id="title-c">{{$lastPost->title}}</span>
                                <p class="p-cards">{{$lastPost->subhead}}</p>
                            </div>
                        </div>
                    </div>
                    <?php $count++; ?>
                @endforeach

            </div>
            <p class="black-text center seemore"><a class="black-text" href="/blog">Acessar blog</a></p>
        </div>
    </main>
    <hr id="hr2">

@endsection