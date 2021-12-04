@extends('/layouts/adminLayout')
@section('title', 'LESSON')
@section('content')
    <main>
        <div class="container content">
            <a class="waves-effect waves-purple btn-large btn-listar-class pink darken-4" href="{{route('admin.courses.list')}}">Listar</a>

            <div class="form-class white">
                <h4 class="title-class">CRIAR AULA</h4>
                <div class="row">
                    <form class="col s12" method='POST' action=''>
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="title" name='title' type="text" class="validate" required>
                                <label for="title">Título</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="content" name='content' class="materialize-textarea" required></textarea>
                                <label for="content">Conteúdo</label>
                            </div>
                        </div>
                        <div class="input-field col s12">
                            <select class="icons" name="courseId" required>
                                <option value="" disabled selected>Escolha um curso</option>
                                @foreach($courses as $course)
                                <option value="{{$course->id}}"
                                        @if(@isset($course->image))
                                            data-icon="{{url('img/courses/'.$course->image)}}"
                                        @else
                                            data-icon="{{url('img/logicgates.png')}}"
                                        @endif
                                >
                                    {{$course->title}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn waves-effect btn-submit-class waves-light green darken-2" type="submit"
                            name="action">Cadastrar no curso</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection