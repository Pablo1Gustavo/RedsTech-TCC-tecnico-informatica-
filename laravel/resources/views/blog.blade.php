@extends('layouts.main')
@section('title', 'Redstech - HOME')
@section('css', 'css/home.css')
@section('content')
    <main>
        <hr id="hr3">

        <div class="container" id="divcards">

            <h3 class="center-align">Blog</h3>

            <div class="row" id="between-ultcard">

                @php $colNum = 0; @endphp
                @foreach($posts as $post)
                    <div class="col s12 m4 l3">
                        <div class="card card-length">
                            <div class="card-image">
                                <img height="200"
                                    @if(@isset($post->image))
                                        src="{{url('img/blog/'.$post->image)}}"
                                    @else
                                        src="img/redsore.png"
                                    @endif
                                >
                                @php $color = ['blue','green','purple'][$colNum++%3]; @endphp
                                <a class="btn-floating halfway-fab waves-effect waves-light {{$color}}" href="post_detail/{{$post->id}}">
                                    <i class="material-icons">keyboard_arrow_right</i>
                                </a>
                            </div>
                            <div class="card-content">
                                <span class="card-title" id="title-c">
                                    {{$post->title}}
                                </span>
                                <p class="p-cards-blog">{{$post->subhead}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <?php
                //Deve receber antes o n° total de informações que serão mostradas
                //E a variável com as informações e um "->paginate(<quant por página>)"
                
                $page = @isset($_GET['page'])? $_GET['page'] : 1;
                
                $numOfPages = intval((($totalPosts-1)/9)+1);   
                
                if($page < 4){               $forLogic = 1;
                }elseif($page>$numOfPages-4){$forLogic = $numOfPages-4;
                }else{                       $forLogic = $page-2;
                }
                
            ?>

            <div class="col s12 center" id="pagnat">
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
        </div>
    </main>
    <hr id="hr2">
@endsection