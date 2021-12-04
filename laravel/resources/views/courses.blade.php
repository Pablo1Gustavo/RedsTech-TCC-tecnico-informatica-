@extends('layouts.main')
@section('title', 'Redstech - CURSOS')
@section('css', 'css/home.css')
@section('content')

    <main>

        <hr id="hr5">

        <div class="container" id="divcards">

            <h3 class="center-align">Cursos</h3>

            <div class="row" id="between-ultcard">
                @foreach($courses as $course)
                <div class="col s12 m4 l3" id="card-length">
                    <div class="card">
                        <div class="card-image">
                            <img 
                                @if(@isset($course->image))
                                    src="{{url('img/courses/'.$course->image)}}"
                                @else
                                    src="{{url('img/courseimg.png')}}"
                                @endif    
                            >
                        </div>
                        <div class="card-content">
                            <span class="card-title center course-title" id="title-c">{{$course->title}}</span>
                            <div class="card-view">
                                <p class="p-cards">
                                    <i class="tiny material-icons left small" id="time-icon">list</i>
                                    {{$course->count_lessons}} Aulas
                                </p>
                                <p class="p-cards" id="card-texts" style="font-size:13px">
                                    <i class="tiny material-icons left small" id="time-icon">access_time</i>
                                    <b>Criado em {{$course->created_at->format('d/m/Y')}}</b>
                                </p>
                                <p class="p-cards" id="card-texts">
                                    {{$course->description}}
                                </p>
                            </div>
                            <a class="waves-effect waves-light btn light-blue darken-3" 
                                href="course/{{$course->id}}"
                                id="btn-acessar-c">
                                <i class="material-icons right">
                                    arrow_forward
                                </i>
                                Acessar
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    <?php
        //Deve receber antes o n° total de informações que serão mostradas
        //E a variável com as informações e um "->paginate(<quant por página>)"
        
        $page = @isset($_GET['page'])? $_GET['page'] : 1;
        
        $numOfPages = intval((($totalCourses-1)/9)+1);   
        
        if($page < 4){               $forLogic = 1;
        }elseif($page>$numOfPages-4){$forLogic = $numOfPages-4;
        }else{                       $forLogic = $page-2;
        }
        
    ?>

    <div class="col s12 center pagnat-c">
        <ul class="pagination">
            @if($page != 1)
                <li class="waves-effect">
                    <a href="?page={{($page-1)}}">
                        <i class="material-icons">chevron_left</i>
                    </a>
                </li>
            @endif
            @for ($f = $forLogic; $f <= ($forLogic+4); $f++)
                @if($f>0 && $f<=$numOfPages)
                    <li @if($f == $page)class="active grey"
                        @else           class="waves-effect" 
                        @endif
                    >
                        <a href="?page={{$f}}">{{$f}}</a>
                    </li>
                @endif
            @endfor
            @if(($page+1)<=$numOfPages)
                <li class="waves-effect">
                    <a href="?page={{($page+1)}}">
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
            @endif
        </ul>
    </div>

    <hr id="hr6">

@endsection