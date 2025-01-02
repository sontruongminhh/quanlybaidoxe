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
use Illuminate\Support\Facades\Cookie;

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

        $user = User::where('email', $request->input('Email'))->first();

        if ($user && $user->status == 0) {
            return redirect()->back()
                ->withErrors(['error_login' => 'Vui lòng xác thực email trước khi đăng nhập']);
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Cookie::queue('user_email', $user->email, 120);
            Cookie::queue('user_name', $user->name, 120);
            Cookie::queue('user_role', $user->role, 120);
            
            if ($user->role == 3) {
                return redirect()->route('home');
            } else {
                return redirect()->route('admin');
            }
        }

        return redirect()->back()
            ->withErrors(['error_login' => 'Tài khoản hoặc mật khẩu không chính xác']);
    }


    /**
     * Handle logout
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function register()
    {
        return view('user.register');
    }

    public function create_user(Request $request)
    {
        $request->validate([
            'Email' => 'required|email|unique:users,email',
            'Password' => 'required|min:6|confirmed',
        ], [
            'Email.required' => 'Email là bắt buộc',
            'Email.email' => 'Email không đúng định dạng',
            'Email.unique' => 'Email đã tồn tại trong hệ thống',
            'Password.required' => 'Mật khẩu là bắt buộc',
            'Password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'Password.confirmed' => 'Xác nhận mật khẩu không khớp',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->Email,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => Hash::make($request->Password),
                'remember_token' => Str::random(60),
                'role' => 3,
                'status' => 0
            ]);

            Mail::to($user->email)->send(new RegisterMail($user));

            return redirect()->route('register')
                ->with('success', 'Vui lòng kiểm tra email của bạn để xác thực tài khoản!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Có lỗi xảy ra khi đăng ký. Vui lòng thử lại.']);
        }
    }

    // Thêm function mới để xác thực email
    public function verifyEmail($token)
    {
        $user = User::where('remember_token', $token)->first();
        
        if ($user) {
            $user->email_verified_at = now();
            $user->status = 1;
            $user->remember_token = null;
            $user->save();
            
            return redirect()->route('login')
                ->with('success', 'Xác thực email thành công! Bạn có thể đăng nhập ngay bây giờ.');
        }
        
        return redirect()->route('login')
            ->with('error', 'Link xác thực không hợp lệ!');
    }

    /**
     * Show view login
     *
     * @return void
     */
    public function forget()
    {
        return view('user.forget');
    }
    public function forget_post(Request $request)
    {
        // $user = User::where('email', $request->email)->first();
        $count = User::where('email', '=', $request->email)->count();
        if ($count) {

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
