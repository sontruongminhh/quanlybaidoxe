<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Contact;
use App\Models\Reservation;
use App\Models\ParkingLot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
{
    $welcome = DB::table('blog')->orderBy('blogid', 'desc')->get();
    $userEmail = Cookie::get('user_email');
    $userRole = Cookie::get('user_role');
    $userName = Cookie::get('user_name');

    // Lấy ngày người dùng chọn, nếu không chọn thì mặc định là ngày hôm nay
    $date = $request->get('date', Carbon::today()->toDateString());

    // Lấy số liệu thống kê xe cho từng bãi trong ngày được chọn (không phân biệt xe có đang trong bãi hay không)
    $parkingStats = ParkingLot::withCount([
        'vehicles as vehicle_count' => function ($query) use ($date) {
            $query->whereDate('entry_time', $date);  // Lọc theo ngày
        }
    ])->get();

    return view('home.welcome', compact('userEmail', 'userRole', 'userName', 'welcome', 'parkingStats', 'date'));
}
   
    public function blog(){
        $index =DB::table('blog')->orderBy('blogid','desc')->get();
        return view('blog.index')->with('index', $index);
    }
    public function blogdetail($id){
        $comments = DB::table('comments')->orderBy('commentid', 'desc')->get();
        $detail = DB::table('blog_detail')->orderBy('blog_detailid', 'desc')->where('blogid', $id)->first();
        return view('blog.detail')->with([
            'detail' => $detail,
            'comments' => $comments  
        ]);
    }
    public function contact(){
        $userEmail = Cookie::get('user_email');
        $userRole = Cookie::get('user_role');
        $userName = Cookie::get('user_name');
        return view('contact.index', compact('userEmail','userRole','userName'));
    }
    public function sendContact(Request $request)
   {
    // Xác thực dữ liệu
    $request->validate([
        'userid' => 'required|integer',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
        // 'status' => 'required|string',
        
    ]);

    // Lưu bản ghi liên hệ mới vào bảng contacts
    Contact::create([
        'userid' => $request->userid,
        'subject' => $request->subject,
        'message' => $request->message,
        'contact_time' => Carbon::now(),
        'status' => 'Chưa giải quyết',
    ]);

    // Chuyển hướng với thông báo thành công
    return redirect()->back()->with('success', 'Liên hệ của bạn đã được gửi thành công!');
    }
    public function showContactForm()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (Auth::check()) {
            $userid = Auth::id(); // Lấy ID người dùng đã đăng nhập  
            // Lấy thông tin từ cookie
            $userEmail = Cookie::get('user_email');
            $userRole = Cookie::get('user_role');
            $userName = Cookie::get('user_name');
    
            // Truyền biến vào view
            return view('contact.index', compact('userid', 'userEmail', 'userRole', 'userName'));
        } else {
            // Nếu chưa đăng nhập, chuyển hướng đến trang login
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
        }
    }
    
    public function booking(){
        $userEmail = Cookie::get('user_email');
        $userRole = Cookie::get('user_role');
        $userName = Cookie::get('user_name');
        return view('contact.booking', compact('userEmail','userRole','userName'));
    }

    public function sendBooking(Request $request){
    // Xác thực dữ liệu
    $request->validate([
        'userid' => 'required|integer',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
        // 'status' => 'required|string',
        'customerid',
        'parking_slotid',
        'reservation_time',
        'start_time',
        'end_time',
        'status'
    ]);

    // Lưu bản ghi liên hệ mới vào bảng contacts
    Reservation::create([
        'userid' => $request->userid,
        'subject' => $request->subject,
        'message' => $request->message,
        'contact_time' => Carbon::now(),
        'status' => 'Chưa giải quyết',
    ]);
    return redirect()->back()->with('success', 'Liên hệ của bạn đã được gửi thành công!');
    }
    public function showBookingForm()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (Auth::check()) {
            $userid = Auth::id(); // Lấy ID người dùng đã đăng nhập  
            // Lấy thông tin từ cookie
            $userEmail = Cookie::get('user_email');
            $userRole = Cookie::get('user_role');
            $userName = Cookie::get('user_name');
    
            // Truyền biến vào view
            return view('contact.booking', compact('userid', 'userEmail', 'userRole', 'userName'));
        } else {
            // Nếu chưa đăng nhập, chuyển hướng đến trang login
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
        }
    }
}
