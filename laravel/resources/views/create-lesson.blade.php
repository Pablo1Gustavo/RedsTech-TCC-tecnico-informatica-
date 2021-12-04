<html>
    <head>
        <?php
            $courses = App\Models\Course::get();
        ?>
    </head>
    <body>
        <form action="/createCourseClassOut" method="POST">
            @csrf
            <input type="text" name="title"><br><br>
            <input type="textarea" name="content"><br><br>
            <select name="courseId">
                @foreach ($courses as $course)
                    <option value="{{$course->id}}">{{$course->title}}</option>
                @endforeach
            </select>

            <input type="submit" placeholder="Enviar">
        </form>
    </body>
</html>