@extends('/layouts/adminLayout')
@section('title', 'Listar usuários')
@section('content')
    <main>
        <h4 class="black-text center listando-curso-text">LISTANDO USUARIOS</h4>
        <div class="container white lighten-3 table-cont">
            <table class="responsive-table centered tabela highlight">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-Mail</th>
                        <th>Data de criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <form action="{{route('admin.user.delete', $user->id)}}" method='POST' style='display:inline'>
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