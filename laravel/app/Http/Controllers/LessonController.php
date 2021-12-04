<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;

class LessonController extends Controller
{
    public function create_lesson_page(){
        if(!UserController::checkAdmin()){return redirect('/home');}

        $courses = Course::all()->sortBy('title');
        return view('admin.lesson',['courses'=>$courses]);
    }

    public function edit_lesson_page($id, $msg=''){
        if(!UserController::checkAdmin()){return redirect('/home');}

        $lesson = Lesson::where('id', $id)->first();
        return view('admin.edit_lesson', ['lesson' => $lesson, 'msg' => $msg]);
    }

    public function list_lessons_page($course_id){
        if(!UserController::checkAdmin()){return redirect('/home');}

        $lessons = Lesson::where('course_id',$course_id)->get();
        $course_title = Course::where('id',$course_id)->first()->title;
        return view('admin.list_lesson',['lessons' => $lessons,'course_title'=>$course_title]);
    }

    public function lesson_page($lesson_id){
        $lesson = Lesson::where('id', $lesson_id)->first();
        return view ('lesson', ['lesson' => $lesson]);
    }

    public function store(Request $request){
        if(!UserController::checkAdmin()){return redirect('/home');}

        $lesson = new Lesson;

        $lesson->title = $request->title;
        $lesson->content = $request->content;
        $lesson->course_id = $request->courseId;
        $lesson->save();
    
        return redirect('admin/lesson');
    }

    public function update(Request $request, $id){
        if(!UserController::checkAdmin()){return redirect('/home');}
        
        if(!@isset($request->title)){
            return $this->edit_lesson_page($id, "O título não pode ficar vazio!");
        }elseif(!@isset($request->content)){
            return $this->edit_lesson_page($id, "O conteúdo não pode ficar vazio!");
        }

        Lesson::where('id', $id)->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return $this->edit_lesson_page($id);
    }

    public function destroy($id){
        if(!UserController::checkAdmin()){return redirect('/home');}
        
        Lesson::findOrFail($id)->delete();
        return redirect()->back();
    }
}
