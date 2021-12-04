<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\File;


class CourseController extends Controller
{
    public function create_course_page($msg = ''){
        if(!UserController::checkAdmin()){return redirect('/home');}
        
        return view('admin.course', ['msg' => $msg]);
    }

    public function list_courses_page(){
        if(!UserController::checkAdmin()){return redirect('/home');}

        $courses = Course::all()->sortBy('title');
        return view('admin.list_course',['courses'=>$courses]);
    }

    public function edit_course_page($id, $msg=''){
        if(!UserController::checkAdmin()){return redirect('/home');}

        $course = Course::where('id', $id)->first();
        return view('admin.edit_course', ['course' => $course, 'msg' => $msg]);
    }

    public function course_detail($id){
        $course = Course::where('id', $id)->first();
        $lessons = Lesson::where('course_id', $course->id)->get();

        return view('course_detail', ['course' => $course, 'lessons' => $lessons]);
    }

    public function courses_page(){
        $totalCourses = Course::all()->count();

        $courses = Course::paginate(9)->sortBy('title');
        
        foreach($courses as $course)
            $course->count_lessons = Lesson::where('course_id',$course->id)->count();

        return view('courses', ['courses' => $courses, 'totalCourses' => $totalCourses]);
    }
    


    public function store(Request $request){
        if(!UserController::checkAdmin()){return redirect('/home');}

        $course = new Course;

        if(!isset($request->title)){
            return $this->create_course_page('Insira um título');
        }
        $course->title = $request->title;

        if(!isset($request->description)){
            return $this->create_course_page('Insira uma descrição');
        }
        $course->description = $request->description;
    
        //Image upload
        if($request->hasFile('image') && $request->file('image')->isValid()){
    
            $requestImage = $request->image;
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")) . "." . $extension;
    
            $requestImage->move(public_path('img/courses'), $imageName);
    
            $course->image = $imageName;
        }
    
        $course->save();
        return $this->create_course_page('Curso criado com sucesso!');
    }

    public function update(Request $request, $id){
        if(!UserController::checkAdmin()){return redirect('/home');}

        $course = Course::where('id', $id)->first();

        if(!@isset($request->title)){
            return $this->edit_course_page($course->id, "O título não pode ficar vazio!");
        }elseif(!@isset($request->description)){
            return $this->edit_course_page($course->id, "A descrição não pode ficar vazia!");
        }

        if($request->image != $course->image){
            if(isset($course->image)) {
                File::delete("img/courses".$course->image);
            }
            if($request->hasFile('image') && $request->file('image')->isValid()){

                $requestImage = $request->image;
                $extension = $requestImage->extension();

                $request->image = md5($requestImage->getClientOriginalName().strtotime("now")) . "." . $extension;
                $requestImage->move(public_path('img/courses'), $request->image);
            }
        }

        Course::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image
        ]);

        return $this->edit_course_page($course->id);
    }

    public function destroy($id){
        if(!UserController::checkAdmin()){return redirect('/home');}

        Course::findOrFail($id)->delete();
        return redirect()->back();
    }

}
