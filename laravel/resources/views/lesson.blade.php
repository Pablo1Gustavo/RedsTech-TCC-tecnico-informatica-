@extends('layouts.main')
@section('title', 'Redstech - PUBLICAÇÃO')
@section('css', '/css/post_detail.css')
@section('content')
    <main>
        <div class="white" id="post-container">
            <div class="row">
                <div class="title left">
                    <h3 id="titulo-post">
                        {{$lesson->title}}<br/>
                    </h3>
                </div>
                <div class="right" id="div-btn-text">
                    <a class="btn-floating btn waves-effect waves-light blue darken-3" href="/course/{{$lesson->course_id}}">
                        <i class="material-icons">arrow_back</i>
                    </a>
                    <span id="txt-voltar" class="blue-text darken-3">Voltar</span>
                </div>
            </div>
            <div id="data">
                <i class="tiny material-icons left small" id="time-icon">access_time</i>
                <p id="datetime">{{$lesson->created_at->format('d/m/Y')}}</p>
            </div>
            <div id="betdatatext" >
                {!!$lesson->content!!}
            </div>

        </div>

    </main>
@endsection