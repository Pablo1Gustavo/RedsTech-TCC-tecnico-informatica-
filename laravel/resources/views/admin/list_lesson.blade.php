@extends('/layouts/adminLayout')
@section('title', 'Listar Aulas')
@section('content')
    <main>
        <h4 class="black-text center listando-curso-text">LIÇÕES DO {{strtoupper($course_title)}}</h4>
        <div class="container white lighten-3 table-cont">
            <table class="responsive-table centered tabela highlight">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Data de Criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        @foreach($lessons as $lesson)
                        <td>{{$lesson->title}}</td>
                        <td>{{$lesson->created_at}}</td>
                        <td>
                            <a target='_blank' href="{{route('lesson',$lesson->id)}}" class="btn blue waves-effect waves-light">
                                <i class="small material-icons black-text">assignment</i>
                            </a>
                            <a href="{{route('admin.lesson.edit', $lesson->id)}}" class="btn green waves-effect waves-light">
                                <i class="small material-icons black-text">create</i>
                            </a>
                            <form action="{{route('admin.lesson.delete',$lesson->id)}}" method='POST' style='display:inline'>
                                @csrf 
                                @method('DELETE')
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