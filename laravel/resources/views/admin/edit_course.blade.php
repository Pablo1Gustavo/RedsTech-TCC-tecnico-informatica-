@extends('/layouts/adminLayout')
@section('title', 'Editar Curso')
@section('content')
    <main>
        <div class="container content">
            <a class="waves-effect waves-purple btn-large btn-listar pink darken-4" href="/admin/course/list">Voltar</a>

            <div class="form-course white">
                <h4 class="title-course">Editando Curso: {{$course->title}}</h4>
                <div class="row">
                    <form class="col s12" action="{{route('admin.course.put', $course->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="input-field col s12">
                                <input  id="first_name"
                                        name="title"
                                        type="text" 
                                        class="validate" 
                                        value="{{$course->title}}"
                                >
                                <label for="first_name">Título</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea1" class="materialize-textarea" name="description">{{$course->description}}</textarea>
                                <label for="textarea1">Descrição</label>
                            </div>
                        </div>
                        <div class="file-field input-field">
                            <div class="btn light-blue darken-4">
                                <span>FOTO</span>
                                <input type="file" name="image"
                                    @if(@isset($course->image))
                                        value="{{$course->image}}"
                                    @endif
                                >
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <button class="btn waves-effect btn-submit waves-light green darken-2" type="submit"
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