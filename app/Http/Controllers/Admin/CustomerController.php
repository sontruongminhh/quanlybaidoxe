<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
class CustomerController extends Controller
{
    
    public function add_customer(){

        return view('admin.customers.add_customer');
    }
    public function all_customer(){
        $all_customer = DB::table('users')
        ->orderby('users.userid', 'desc')->get();
        $manager_customer = view('admin.customers.all_customer')->with('all_customer', $all_customer);
        return view('admin.index')->with('admin.all_customer', $manager_customer);
    }
    public function save_customer(Request $request) {
        $data['email'] = $request -> user_email;
        $data['password'] = $request -> user_password;
        $data['role'] = $request -> user_role;
        $data['remember_token'] = $request -> user_token;
        $data['name'] = $request -> user_name;
        $data['phone'] = $request -> user_phone;
        $data['address'] = $request -> user_address;
        $data['image'] = $request -> user_image;   
    
        $get_image = $request->file('customer_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99). '.'. $get_image->getClientOriginalExtension();
            $get_image->move('public/customer', $new_image);
            $data['image'] = $new_image;
            DB::table('users') -> insert($data);
            Session::put('message', 'Thêm  thành công');
            return Redirect::to('add-customer');
        }
        $data['image'] = '';
        DB::table('users') -> insert($data);
        Session::put('message', 'Thêm thành công');
        return Redirect::to('add-custpmer');
    }
    
    public function edit_customer($customer_id)
    {
        $edit_user = DB::table('users')->where('userid', $customer_id)->first();
        return view('admin.customers.edit_customer')->with('edit_user', $edit_user);
    }
    
    public function update_customer(Request $request, $customer_id) {
        $data['email'] = $request -> user_email;
        // $data['password'] = $request -> user_password;
        // $data['role'] = $request -> user_role;
        // $data['remember_token'] = $request -> user_token;
        $data['name'] = $request -> user_name;
        $data['phone'] = $request -> user_phone;
        $data['address'] = $request -> user_address;
        $data['image'] = $request -> user_image;
    
        $get_image = $request->file('customer_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/customer', $new_image);
            $data['image'] = $new_image;
        }
    
        DB::table('users')->where('userid', $customer_id)->update($data);
        Session::put('message', 'Cập nhật thành công');
        return Redirect::to('all-customer');
    }

        
    public function delete_customer($customer_id){
        DB::table('users')->where('userid', $customer_id)->delete();
        Session::put('message', 'Xóa  thành công');
        return Redirect::to('all-customer');
    }
}
