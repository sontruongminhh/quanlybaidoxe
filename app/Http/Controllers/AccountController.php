<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\user;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function login(){
        return view('user.login');
        
    }

    public function postlogin(Request $request){
        $user = user::where("Email","$request->Email")->first();
        if($user != null){
           $pass = user::where("Password","$request->Password")->first();
           if($pass != null){      
               Session::put('User_Id', $user->User_Id);
               Session::put('Type',$user->Type);
               Session::put('User_Name',$user->Name);  
               if($user->Type == 2){
                return redirect()->route('index');
               }     
           return redirect()->route('admin');
           }
        }
        return back()->withErrors([
            'email' => 'Không tìm thấy người dùng',
        ])->onlyInput('email');
          
    }
   
    public function register(){
        return view('user.register');
    }
    public function postregister(Request $req ){
            $users = new user();
            // $users->Name = $req->Name;
            $users->email = $req->email;
            $users->password = Hash::make($req->password);
            // $users->Phone =$req->Phone;
            // $users->Address = $req->Address;
            // $users->Type = $req->Type == true ? 2 : 1;
            // $users->Status = $req->Type == true ? 0 : 1;
              $users->save();    

              return redirect()->route('login');
    }
    public function logout(){
           Session::flush();
           return redirect()->route('login');
    }
    

}