@extends('/layouts/adminLayout')
@section('title', 'Editar Postagem')
@section('content')
    <main>
        <div class="container content">
            <a class="waves-effect waves-purple btn-large btn-listar-post pink darken-4" href="{{route('admin.posts.list')}}">Voltar</a>

            <div class="form-post white">
                <h4 class="title-post">Editando Post: {{$post->title}}</h4>
                <div class="row">
                    <form class="col s12" action="{{route('admin.post.put', $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="title-titulo" name="title" type="text" class="validate" value="{{$post->title}}">
                                <label for="title-titulo">Título</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="subhead" class="materialize-textarea">{{$post->subhead}}</textarea>
                                <label for="textarea1">Subtítulo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" name="content" class="materialize-textarea">{{$post->content}}</textarea>
                                <label for="textarea1">Conteúdo</label>
                            </div>
                        </div>
                        <div class="file-field input-field">
                            <div class="btn light-blue darken-4">
                                <span>Foto</span>
                                <input type="file" name="image"
                                    @if(@isset($post->image))
                                        value="{{$post->image}}"
                                    @endif
                                >
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <button class="btn waves-effect btn-submit-post waves-light green darken-2" type="submit" name="action">
                            Salvar Alterações
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @if($msg != '')
        <script>alert('{{$msg}}');</script>
    @endif
@endsection