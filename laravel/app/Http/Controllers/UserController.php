<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Auth;

class UserController extends Controller
{
    public static function checkAdmin(){
        if(auth()->user()->admin == 1){
            return true;
        }else{
            return false;
        }
    }

    public function profile_page($errorMsg = ''){
        $sessao = auth()->user();
        $user = User::where('id', $sessao->id)->first();
        //dd($errorMsg);
        return view('user', ['user' => $user, 'errorMsg' => $errorMsg]);
    }

    public function list_user_page(){
        if(!$this->checkAdmin()){return redirect('/home');}

        $users = User::where('id','!=',Auth::id())->get();
        return view('admin.list_user',['users'=>$users]);
    }

    public function updateProfileImage(Request $request){
        $sessao = auth()->user();
        if(@isset($sessao->image)){
            File::delete("img/users/".$sessao->image);
        }

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/users'), $imageName);

            User::where('id',$sessao->id)->update(['image' => $imageName]);
        }

        return redirect('profile');
        
    }

    public function updateProfileData(Request $request){
        $sessao = auth()->user();
        
        $user = User::where('email', $request->email)->first();

        if(@isset($user->email)){
            //Email ocupado
            if($user->email == $sessao->email){
                //Email novo igual ao antigo
                if($request->name != $sessao->name){
                    //Porém o nome é diferente
                    User::where('id',$sessao->id)->update(['name' => $request->name]);
                }
                return redirect('profile');
            }
            return $this->profile_page('Este email já está ocupado');
        }
        
        User::where('id',$sessao->id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect('profile');
        
    }
    public function destroy($id){
        if(!$this->checkAdmin()){return redirect('/home');}

        User::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function resend_email(){
        Auth::user()->sendEmailVerificationNotification();
        Auth::guard('web')->logout();
    }
}
