@extends('/layouts/adminLayout')
@section('title', 'POST')
@section('content')
    <main>
        <div class="container content">
            <a class="waves-effect waves-purple btn-large btn-listar-post pink darken-4" href="{{route('admin.posts.list')}}">Listar</a>

            <div class="form-post white">
                <h4 class="title-post">CRIAR POST DO BLOG</h4>
                <div class="row">
                    <form class="col s12" method='POST' action='' enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="title" name='title' type="text" class="validate">
                                <label for="title">Título</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="content" name='content' class="materialize-textarea"></textarea>
                                <label for="content">Conteúdo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="subhead" name='subhead' class="materialize-textarea"></textarea>
                                <label for="subhead">Subtítulo</label>
                            </div>
                        </div>
                        <div class="file-field input-field">
                            <div class="btn light-blue darken-4">
                                <span>FOTO</span>
                                <input type="file" name='image'>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <button class="btn waves-effect btn-submit-post waves-light green darken-2" type="submit"
                            name="action">Cadastrar no blog</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection