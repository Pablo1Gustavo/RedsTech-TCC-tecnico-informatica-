@extends('/layouts/adminLayout')
@section('title', 'Listar Cursos')
@section('content')
    <main>
        <h4 class="black-text center listando-curso-text">LISTANDO CURSOS</h4>
        <div class="container white lighten-3 table-cont">
            <table class="responsive-table centered tabela highlight">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Lições</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{$course->title}}</td>
                        <td>
                            <a class="waves-effect waves-purple btn pink darken-4" href="{{route('admin.lessons.list',['course_id'=>$course->id])}}">Ver lições</a>
                        </td>
                        <td>
                            <a target='_blank' href="{{route('course',$course->id)}}" class="btn blue waves-effect waves-light">
                                <i class="small material-icons black-text">assignment</i>
                            </a>
                            <a href="{{route('admin.course.edit', $course->id)}}" class="btn green waves-effect waves-light">
                                <i class="small material-icons black-text">create</i>
                            </a>
                            <form action="{{route('admin.course.delete',$course->id)}}" method='POST' style='display:inline'>
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