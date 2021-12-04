@extends('layouts.main')
@section('title', 'Redstech - Curso X')
@section('css', url('css/classes.css'))
@section('content')

    <main>
        <div class="row container" id="course-description">
            <div class="col s12 m12 l7 white" id="div-desc">
                <div class="content">
                    <h4>{{$course->title}}</h4>
                    <p class="classes-desc flow-text">
                        {{$course->description}}
                    </p>
                </div>
            </div>

            <div class="col s12 m12 l5 hide-on-med-and-down white div-img">
                <img alt="Imagem Do Curso" class="responsive-img" id="foto-aulas"
                    @if(@isset($course->image))
                        src="{{url('img/courses/'.$course->image)}}"
                    @else
                        src="{{url('img/courseimg.png')}}"
                    @endif
                >

            </div>
        </div>
        @php $lessonNum = 1; @endphp
        @if($lessons->count() != 0)
            @php $colNum = 0 @endphp
            @foreach($lessons as $lesson)
                    <div class="row container white" id="course-classes">
                        <div class="col s8 m9 l9 div-class">
                            <p class="texto-aula-ver">Aula {{$lessonNum++}} | {{$lesson->title}}</p>
                        </div>
                        <div class="col s4 m3 l3 div-class ">
                            @php $color = ['blue','green','purple'][$colNum++%3]; @endphp
                            <button class="btn-ver waves-effect waves-light {{$color}}" onclick="location.href='{{route('lesson',$lesson->id)}}'">
                                <p class="texto-aula-ver white-text">Ver ➔</p>
                            </button>
                        </div>
                    </div>
            @endforeach
        @else
        <div class="container white" id="course-classes">
            <p style="font-size:30px; text-align:center">Ainda não há aulas neste curso</p>
        </div>
        @endif

    </main>

@endsection