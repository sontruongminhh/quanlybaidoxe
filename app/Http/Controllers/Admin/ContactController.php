<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
class ContactController extends Controller
{
    
    public function add_contact(){

        return view('admin.contact.add_contact');
    }
    public function all_contact()
    {
        $all_contact = DB::table('contact')
            ->select(
                'contact.*',
                'users.name as User'
            )
            ->join('users', 'users.userid', '=', 'contact.userid')
            ->orderby('contact.contactid', 'desc')
            ->get();
    
        $manager_contact = view('admin.contact.all_contact')->with('all_contact', $all_contact);
        return view('admin.index')->with('admin.all_contact', $manager_contact);
    }
    
    public function save_contact(Request $request) {
        $data['userid'] = $request -> contact_userid;
        $data['subject'] = $request -> contact_subject;
        $data['message'] = $request -> contact_message;
        $data['contact_time'] = $request -> contact_contact_time;
        $data['status'] = $request -> contact_status;
        $data['response'] = $request -> contact_response;
        $data['response_time'] = $request -> contact_response_time;
    
        DB::table('contact') -> insert($data);
        Session::put('message', 'Thêm thành công');
        return Redirect::to('add-contact');
    }
    
    public function edit_contact($contact_id)
    {
        $edit_contact = DB::table('contact')->where('contactid', $contact_id)->first();
        return view('admin.contact.edit_contact')->with('edit_contact', $edit_contact);
    }
    
    public function update_contact(Request $request, $contact_id) {
        $data['userid'] = $request -> contact_userid;
        $data['subject'] = $request -> contact_subject;
        $data['message'] = $request -> contact_message;
        $data['contact_time'] = $request -> contact_contact_time;
        $data['status'] = $request -> contact_status;
        $data['response'] = $request -> contact_response;
        $data['response_time'] = $request -> contact_response_time;
    
        DB::table('contact')->where('contactid', $contact_id)->update($data);
        Session::put('message', 'Cập nhật thành công');
        return Redirect::to('all-contact');
    }

        
    public function delete_contact($contact_id){
        DB::table('contact')->where('contactid', $contact_id)->delete();
        Session::put('message', 'Xóa  thành công');
        return Redirect::to('all-contact');
    }
}
