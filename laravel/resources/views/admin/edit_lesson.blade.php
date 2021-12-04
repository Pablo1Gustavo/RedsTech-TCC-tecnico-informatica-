@extends('/layouts/adminLayout')
@section('title', 'Listar Lições')
@section('content')
    <main>
        <div class="container content">
            <a class="waves-effect waves-purple btn-large btn-listar-class pink darken-4" href="{{route('admin.lessons.list', $lesson->course_id)}}">Voltar</a>

            <div class="form-class white">
                <h4 class="title-class">Editando Lição: {{$lesson->title}}</h4>
                <div class="row">
                    <form class="col s12" action="{{route('admin.lesson.put', $lesson->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="title-titulo" name="title" type="text" class="validate" value="{{$lesson->title}}">
                                <label for="title-titulo">Título</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="content" class="materialize-textarea">{{$lesson->content}}</textarea>
                                <label for="textarea1">Conteúdo</label>
                            </div>
                        </div>
                        <button class="btn waves-effect btn-submit-class waves-light green darken-2" type="submit"
                            name="action">Salvar alterações</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @if($msg != '')
        <script>alert('{{$msg}}');</script>
    @endif
@endsection