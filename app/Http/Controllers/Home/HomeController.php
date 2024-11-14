<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Contact;
class HomeController extends Controller
{
    public function index(){
        return view('home.welcome');
    }
    public function contact(){
        return view('contact.index');
       
    }
    public function sendContact(Request $request)
    {
        Contact::create([
            'userid' => $request->userid,
            'subject' => $request->subject,
            'message' => $request->message,
            'contact_time' => Carbon::now(),
            'status' => $request->status,
        ]);
    
        return redirect()->back()->with('success', 'Liên hệ của bạn đã được gửi thành công!');
    }
}
