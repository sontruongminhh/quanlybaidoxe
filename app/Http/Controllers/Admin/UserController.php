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
        $request->validate(
            [
                'user_name' => 'required|string|max:255',
                'user_phone' => 'required|numeric|digits_between:10,15',  // Kiểm tra số và độ dài từ 10 đến 15 ký tự
                'user_email' => 'required|email|regex:/^.+@gmail\.com$/',  // Kiểm tra email có định dạng @gmail.com
                'user_password' => 'required|string|min:6',
                'user_address' => 'required|string|max:255',
                'user_role' => 'required|string|max:50',
                'user_image' => 'required|string',
                // 'user_token' => 'nullable|string|max:100',
            ],
            [
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
                // 'user_token.max' => 'Token không được dài quá 100 ký tự.',
            ]
        );
        
        
        $data = [
            'email' => $request->user_email,
            'role' => $request->user_role,
            'name' => $request->user_name,
            'phone' => $request->user_phone,
            'address' => $request->user_address,
            'password' =>$request->user_password,
            'remember_token' =>$request->user_token,
            'image' =>$request->user_image,
        ];
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
