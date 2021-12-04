@extends('/layouts/adminLayout')
@section('title', 'CURSO')
@section('content')
    <main>
        <div class="container content">
            <a class="waves-effect waves-purple btn-large btn-listar pink darken-4" href="{{route('admin.courses.list')}}">Listar</a>
            
            <div class="form-course white">
                <h4 class="title-course">CRIAR CURSO</h4>
                <div class="row">
                    <form class="col s12" method="POST" action='course' enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="title" name='title' type="text" class="validate">
                                @if($msg == "Insira um título")
                                    <label for="title" style="color:red;">
                                        {{$msg}}
                                    </label>
                                @else
                                    <label for="title">
                                        Título
                                    </label>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="description" name='description' class="materialize-textarea"></textarea>
                                @if($msg == "Insira uma descrição")
                                    <label for="description" style="color:red;">
                                        {{$msg}}
                                    </label>
                                @else
                                    <label for="description">
                                        Descrição
                                    </label>
                                @endif
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
                        <button class="btn waves-effect btn-submit waves-light green darken-2"
                            type="submit" name="action">Cadastrar Curso</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @if($msg == 'Curso criado com sucesso!')
        <script>
            alert('{{$msg}}')
        </script>
    @endif

@endsection