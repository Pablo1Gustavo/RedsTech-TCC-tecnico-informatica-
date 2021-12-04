@extends('/layouts/adminLayout')
@section('title', 'Listar Postagens')
@section('content')
    <main>
        <h4 class="black-text center listando-curso-text">LISTANDO POSTS</h4>
        <div class="container white lighten-3 table-cont">
            <table class="responsive-table centered tabela highlight">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Subtítulo</th>
                        <th>Data de criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>
                            {{$post->title}}
                        </td>
                        <td>
                            <a class="modal-trigger" href="#modal{{$post->id}}">
                                VER SUBTITULO
                            </a>
                        </td>
                        <div id="modal{{$post->id}}" class="modal">
                            <div class="modal-content">
                                <h4>{{$post->title}}</h4>
                                <p>{{$post->subhead}}</p>
                            </div>
                            <div class="modal-footer">
                                <a class="modal-close waves-effect waves-light btn-flat">Fechar</a>
                            </div>
                        </div>
                        <td>{{$post->created_at}}</td>
                        <td>
                            <a target='_blank' href="{{route('post',$post->id)}}" class="btn blue waves-effect waves-light">
                                <i class="small material-icons black-text">assignment</i>
                            </a>
                            <a href="{{route('admin.post.edit', $post->id)}}" class="btn green waves-effect waves-light">
                                <i class="small material-icons black-text">create</i>
                            </a>
                            <form action="{{route('admin.post.delete',$post->id)}}" method='POST' style='display:inline'>
                                @csrf @method('DELETE')
                                <button type='submit' class="btn red waves-effect waves-light">
                                    <i class="small material-icons black-text">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection