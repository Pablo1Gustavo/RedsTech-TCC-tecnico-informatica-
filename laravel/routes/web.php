<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

//Não precisam de autenticação
Route::get('/', function () {return redirect('/home');});
Route::get('/about',function(){
    echo "<a href='/home'>Voltar</a>";
    dd('Ainda não implementado');
});

//Precisam de autenticação
Route::group(['middleware'=>'auth'],function(){

    Route::get('/profile',[UserController::class,'profile_page']);
    Route::post('/updateProfileImage', [UserController::class, 'updateProfileImage']);
    Route::post('/updateProfileData', [UserController::class, 'updateProfileData']);
    
    Route::get('/home',[PostController::class,'home_page'])->name('home');
    Route::post('/home',[UserController::class,'resend_email']);
    Route::get('/blog',[PostController::class,'blog_page']);

    Route::get('/courses',[CourseController::class,'courses_page']);
    Route::get('/course/{id}',[CourseController::class,'course_detail'])->name('course');

    Route::get('/post_detail/{id}', [PostController::class, 'post_detail'])->name('post');

    Route::get('lesson/{lesson_id}',[LessonController::class,'lesson_page'])->name('lesson');
});

//Precisam de auntenticação de um admin
Route::group(['middleware'=>'auth', 'prefix' => '/admin'], function(){
    
    Route::get('/',function(){return redirect('admin/course');});

    Route::get('/course',[CourseController::class,'create_course_page'])->name('admin.course.create');
    Route::post('/course',[CourseController::class,'store'])->name('admin.course.store');
    Route::delete('/course/{id}',[CourseController::class,'destroy'])->name('admin.course.delete');
    Route::get('/course/list',[CourseController::class,'list_courses_page'])->name('admin.courses.list');
    Route::get('/course/{id}/edit',[CourseController::class,'edit_course_page'])->name('admin.course.edit');
    Route::put('/course/{id}',[CourseController::class, 'update'])->name('admin.course.put');
    
    Route::get('/post',[PostController::class,'create_post_page'])->name('admin.post.create');
    Route::post('/post',[PostController::class,'store'])->name('admin.post.store');
    Route::delete('/post/{id}',[PostController::class,'destroy'])->name('admin.post.delete');
    Route::get('/post/list',[PostController::class,'list_posts_page'])->name('admin.posts.list');
    Route::get('/post/{id}/edit',[PostController::class,'edit_post_page'])->name('admin.post.edit');
    Route::put('/post/{id}',[PostController::class,'update'])->name('admin.post.put');

    Route::get('/lesson',[LessonController::class,'create_lesson_page'])->name('admin.lesson.create');
    Route::post('/lesson',[LessonController::class,'store'])->name('admin.lesson.store');
    Route::delete('/lesson/{id}',[LessonController::class,'destroy'])->name('admin.lesson.delete');
    Route::get('/lesson/list/{course_id}',[LessonController::class,'list_lessons_page'])->name('admin.lessons.list');
    Route::get('/lesson/{id}/edit',[LessonController::class,'edit_lesson_page'])->name('admin.lesson.edit');
    Route::put('/lesson/{id}',[LessonController::class,'update'])->name('admin.lesson.put');
    
    Route::get('/user/list',[UserController::class,'list_user_page'])->name('admin.user.list');
    Route::delete('/user/{id}',[UserController::class,'destroy'])->name('admin.user.delete');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
