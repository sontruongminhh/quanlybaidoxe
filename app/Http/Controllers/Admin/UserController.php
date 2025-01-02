<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function add_user(){

        return view('admin.users.add_user');
    }
    public function all_user(){
        $all_user = DB::table('users')
            ->orderBy('userid', 'desc')
            ->paginate(10);
        return view('admin.users.all_user', compact('all_user'));
    }

    public function save_user(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_phone' => 'required|numeric|digits_between:10,15',
            'user_email' => 'required|email|unique:users,email',
            'user_password' => 'required|string|min:6',
            'user_address' => 'required|string|max:255',
            'user_role' => 'required|in:admin,user,doctor',
        ], [
            'user_name.required' => 'Tên người dùng không được để trống.',
            'user_phone.required' => 'Số điện thoại không được để trống.',
            'user_phone.numeric' => 'Số điện thoại phải là số.',
            'user_phone.digits_between' => 'Số điện thoại phải có từ 10 đến 15 chữ số.',
            'user_email.required' => 'Email không được để trống.',
            'user_email.email' => 'Email phải đúng định dạng.',
            'user_email.regex' => 'Email phải có định dạng @gmail.com.',
            'user_password.required' => 'Password không được để trống.',
            'user_address.required' => 'Địa chỉ không được để trống.',
            'user_role.required' => 'Phân quyền không được để trống.',
            'user_image.required' => 'Ảnh không được để trống.',
        ]);
        
        $data = [
            'email' => $request->user_email,
            'password' => Hash::make($request->user_password),
            'role' => $request->user_role,
            'name' => $request->user_name,
            'phone' => $request->user_phone,
            'address' => $request->user_address,
            'created_at' => now(),
            'updated_at' => now()
        ];

        DB::table('users')->insert($data);
        Session::put('message', 'Thêm người dùng thành công');
        return Redirect::to('all-user');
    }

    public function edit_user($user_id) {
        $edit_user = DB::table('users')->where('userid', $user_id)->first();
        return view('admin.users.edit_user', compact('edit_user'));
    }

    public function update_user(Request $request, $user_id)
    {
        $data = [
            'email' => $request->user_email,
            'role' => $request->user_role,
            'name' => $request->user_name,
            'phone' => $request->user_phone,
            'address' => $request->user_address,
        ];

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
}