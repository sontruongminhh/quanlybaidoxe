<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
class UserController extends Controller
{
    public function add_user(){

        return view('admin.users.add_user');
    }
    public function all_user(){
        $all_user = DB::table('users')
        ->orderby('users.userid', 'desc')->get();
        $manager_user = view('admin.users.all_user')->with('all_user', $all_user);
        return view('admin.index')->with('admin.all_doctor', $manager_user);
    }

    public function save_user(Request $request)
    {
        $data = array();
        $data['email'] = $request -> user_email;
        $data['password'] = $request -> user_password;
        $data['role'] = $request -> user_role;
        $data['remember_token'] = $request -> user_token;
        $data['name'] = $request -> user_name;
        $data['phone'] = $request -> user_phone;
        $data['address'] = $request -> user_address;
        $data['image'] = $request -> user_image;
        DB::table('users')->insert($data);
        Session::put('message', 'Thêm thành công');
        return Redirect::to('add-user');
    }

    public function edit_user($user_id) {
        $edit_user = DB::table('users')->where('userid', $user_id)->first();
        if (!$edit_user) {
            abort(404); // doctor not found
        }
        return view('admin.users.edit_user', compact('edit_user'));
    }       
    public function update_user(Request $request, $user_id)
    {
        $data = array();
        $data['email'] = $request -> user_email;
        // $data['password'] = $request -> users_password;
        $data['role'] = $request -> user_role;
        // $data['remember_token'] = $request -> user_token;
        $data['name'] = $request -> user_name;
        $data['phone'] = $request -> user_phone;
        $data['address'] = $request -> user_address;
        DB::table('users')->where('userid', $user_id)->update($data);
        Session::put('message', 'Cập nhật thành công');
        return Redirect::to('all-user');
    }
    public function delete_user($user_id){
        DB::table('users')->where('userid', $user_id)->delete();
        Session::put('message', 'Xóa bài viết thành công');
        return Redirect::to('all-user');
    }

    public function checkEmail(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        // Kiểm tra xem email có tồn tại trong cơ sở dữ liệu hay không
        $emailExists = User::where('email', $validated['email'])->exists();

        if ($emailExists) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email đã tồn tại trong cơ sở dữ liệu.'
            ], 400);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Email chưa tồn tại trong cơ sở dữ liệu.'
        ]);
    }

    // public function checkEmail(Request $request)
    // {
    //     $validated = $request->validate([
    //         'email' => 'required|email',
    //     ]);

    //     // Kiểm tra xem email có tồn tại trong cơ sở dữ liệu hay không
    //     $emailExists = User::where('email', $validated['email'])->exists();

    //     if ($emailExists) {
    //         // Chuyển hướng lại trang trước và lưu thông báo vào session
    //         return redirect()->back()->with('error', 'Email đã tồn tại trong cơ sở dữ liệu.');
    //     }

    //     return redirect()->back()->with('success', 'Email chưa tồn tại trong cơ sở dữ liệu.');
    // }
}
