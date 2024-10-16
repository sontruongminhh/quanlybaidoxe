<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\RegisterMail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class AuthController
{
    /**
     * Show view login
     *
     * @return void
     */
    public function login()
    {
        return view('user.login');
    }

    /**
     * Handle login authentication
     *
     * @param Request $request
     * @return void
     */
    public function login_post(Request $request)
    {
        $credentials = [
            'email' => $request->input('Email'),
            'password' => $request->input('Password'),
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin');
        } else {
            return redirect()->back()->withErrors(['error_login' =>'Tài khoản hoặc mật khẩu không chính xác']);
        }
    }

    /**
     * Handle logout
     *
     * @return void
     */
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function register()
    {
        return view('user.register');
    }

    public function create_user(Request $request)
    {
        request()->validate([
            'Email' => 'required|Email|unique:users',
            'Password' => 'required'
        ]);
        $save = new User;
        $save->Email = trim($request->Email);
        $save->Password = Hash::make($request->Password);
        $save->Remember_token = Str::random(40);
        $save->save();

           Mail::to($save->Email)->send(new RegisterMail($save));
        
        return redirect('register')->with('Thành công', "Tài khoản của bạn đã đăng ký thành công");

        
    }
    /**
     * Show view login
     *
     * @return void
     */
    public function forget (){
        return view('user.forget');
    }
    public function forget_post(Request $request)
    {
        // $user = User::where('email', $request->email)->first();
        $count = User::where('email', '=', $request->email)->count();
        if($count) {
            
            $token = Str::random(50);
            $count->remember_token = $token;
            $count->save();
    
         
            Mail::to($count->email)->send(new ResetPasswordMail($count, $token));
    
            return redirect('register')->back()->with('success', 'Token lấy lại mật khẩu đã được gửi qua email.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Email không hợp lệ.');
        }



       
    }
    

     /**
     * Show view login
     *
     * @return void
     */
    

}


