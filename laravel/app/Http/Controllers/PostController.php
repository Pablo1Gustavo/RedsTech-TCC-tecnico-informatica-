<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function create_post_page(){
        if(!UserController::checkAdmin()){return redirect('/home');}

        return view('admin.post');
    }

    public function edit_post_page($id, $msg=''){
        if(!UserController::checkAdmin()){return redirect('/home');}

        $post = Post::where('id', $id)->first();
        return view('admin.edit_post', ['post' => $post, 'msg' => $msg]);
    }

    public function list_posts_page(){
        if(!UserController::checkAdmin()){return redirect('/home');}

        $posts = Post::all()->sortBy('title');
        return view('admin.list_post',['posts'=>$posts]);
    }

    public function home_page(){
        $lastPosts = Post::orderBy('created_at', 'DESC')->get();
        return view('home', ['lastPosts' => $lastPosts]);
    }

    public function blog_page(){
        $totalPosts = Post::all()->count();
        $posts = Post::paginate(9);
        return view('blog', ['posts' => $posts, 'totalPosts' => $totalPosts]);
    }

    public function post_detail($id){
        $post = Post::where('id', $id)->first();
        return view('post_detail', ['post' => $post]);
    }

    public function store(Request $request){
        if(!UserController::checkAdmin()){return redirect('/home');}

        $post = new Post;

        $post->title = $request->title;
        $post->content = $request->content;
        $post->subhead = $request->subhead;
    
        //Image upload
        if($request->hasFile('image') && $request->file('image')->isValid()){
    
            $requestImage = $request->image;
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")) . "." . $extension;
    
            $requestImage->move(public_path('img/blog'), $imageName);
    
            $post->image = $imageName;
        }
    
        $post->save();
        return redirect('admin/post');
    }

    public function update(Request $request, $id){
        if(!UserController::checkAdmin()){return redirect('/home');}

        $post = Post::where('id', $id)->first();

        if(!@isset($request->title)){
            return $this->edit_post_page($post->id, "O título não pode ficar vazio!");
        }elseif(!@isset($request->subhead)){
            return $this->edit_post_page($post->id, "O subtítulo não pode ficar vazio!");
        }elseif(!@isset($request->content)){
            return $this->edit_post_page($post->id, "O conteúdo não pode ficar vazio!");
        }

        if($request->image != $post->image){
            if(isset($post->image)) {
                File::delete("img/blog".$post->image);
            }
            if($request->hasFile('image') && $request->file('image')->isValid()){

                $requestImage = $request->image;
                $extension = $requestImage->extension();

                $request->image = md5($requestImage->getClientOriginalName().strtotime("now")) . "." . $extension;
                $requestImage->move(public_path('img/blog'), $request->image);
            }
        }

        Post::where('id', $id)->update([
            'title' => $request->title,
            'subhead' => $request->subhead,
            'content' => $request->content,
            'image' => $request->image
        ]);

        return redirect('admin/post/'.$post->id.'/edit');
    }

    public function destroy($id){
        if(!UserController::checkAdmin()){return redirect('/home');}
        
        Post::findOrFail($id)->delete();
        return redirect()->back();
    }

}
