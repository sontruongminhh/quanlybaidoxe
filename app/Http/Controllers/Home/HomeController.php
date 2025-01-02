<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Contact;
use App\Models\Reservation;
use App\Models\ParkingLot;
use App\Models\ParkingSlot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; 
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

    // Lấy số liệu thống kê xe cho từng bãi trong ngày được chọn 
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
    public function sendContact(Request $request){
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

    public function sendBooking(Request $request)
    {
        try {
            // Xác thực dữ liệu
            $validated = $request->validate([
                'customerid' => 'required|integer',
                'parkingid' => 'required|exists:parking_lots,parkingid',
                'parking_slotid' => 'required|exists:parking_slots,parking_slotid',
                'start_time' => 'required|date',
                'end_time' => 'required|date|after:start_time'
            ]);

            // Kiểm tra trạng thái của slot
            // $parkingSlot = ParkingSlot::where('parking_slotid', $request->parking_slotid)
            //     ->with('parkingLot')
            //     ->first();
            
            // if ($parkingSlot->status === 'Có xe') {
            //     return redirect()->back()
            //         ->with('error', 'Vị trí đỗ xe này đã có xe. Vui lòng chọn vị trí khác!')
            //         ->withInput();
            // }

            // Kiểm tra trùng lịch đặt
            $existingReservation = Reservation::where([
                    ['parkingid', '=', $request->parkingid],
                    ['parking_slotid', '=', $request->parking_slotid],
                    ['status', '!=', 'Đã hủy']
                ])
                ->where(function($query) use ($request) {
                    $query->where(function($q) use ($request) {
                        $q->where('start_time', '<=', $request->start_time)
                          ->where('end_time', '>=', $request->start_time);
                    })
                    ->orWhere(function($q) use ($request) {
                        $q->where('start_time', '<=', $request->end_time)
                          ->where('end_time', '>=', $request->end_time);
                    })
                    ->orWhere(function($q) use ($request) {
                        $q->where('start_time', '>=', $request->start_time)
                          ->where('end_time', '<=', $request->end_time);
                    });
                })
                ->first();

            if ($existingReservation) {
                return redirect()->back()
                    ->with('error', 'Bạn đã đặt trùng lịch! Vị trí này đã được đặt trong khoảng thời gian bạn chọn. Vui lòng chọn chỗ khác hoặc thời gian khác.')
                    ->withInput();
            }

            // Tạo array dữ liệu để lưu
            $reservationData = [
                'customerid' => $request->customerid,
                'parkingid' => $request->parkingid,
                'parking_slotid' => $request->parking_slotid,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'reservation_time' => Carbon::now(),
                'status' => 'Chưa đỗ',
            ];

            // Lưu đặt lịch mới
            $reservation = Reservation::create($reservationData);

            if (!$reservation) {
                return redirect()->back()
                    ->with('error', 'Không thể tạo đặt chỗ. Vui lòng thử lại!')
                    ->withInput();
            }

            return redirect()->back()->with('success', 'Đặt lịch thành công!');

        } catch (\Exception $e) {
            Log::error('Booking Error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Có lỗi xảy ra: ' . $e->getMessage())
                ->withInput();
        }
    }
    public function showBookingForm()
    {
        if (Auth::check()) {
            $userid = Auth::id();
            $userEmail = Cookie::get('user_email');
            $userRole = Cookie::get('user_role');
            $userName = Cookie::get('user_name');

            // Lấy danh sách bãi đỗ xe
            $parkingLots = ParkingLot::all();
            $parkingSlots = ParkingSlot::all();
            return view('contact.booking', compact(
                'userid', 
                'userEmail', 
                'userRole', 
                'userName',
                'parkingLots',
                'parkingSlots'
            ));
        } else {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
        }
    }

    // Sửa lại method lấy chỗ đỗ theo bãi để chỉ lấy các slot trống
    public function getParkingSlots($parkingid)
    {
        $slots = ParkingSlot::where('parkingid', $parkingid)
            ->where('status', '!=', 'Có xe') // Chỉ lấy các slot không có xe
            ->select('parking_slotid', 'slort_number', 'status')
            ->get();
        return response()->json($slots);
    }
    public function lichdat(){
        $userEmail = Cookie::get('user_email');
        $userRole = Cookie::get('user_role');
        $userName = Cookie::get('user_name');
        return view('baido.lichdat', compact('userEmail','userRole','userName'));
    }
    public function showBookingHistory()
    {
        try {
            if (Auth::check()) {
                $userid = Auth::id();
                $userEmail = Cookie::get('user_email');
                $userRole = Cookie::get('user_role');
                $userName = Cookie::get('user_name');

                // Lấy lịch sử đặt chỗ của khách hàng hiện tại
                $bookings = Reservation::where('customerid', $userid)
                    ->with(['parkingLot', 'parkingSlot'])
                    ->orderBy('reservation_time', 'desc')
                    ->get();

                return view('baido.lichdat', compact(
                    'userid',
                    'userEmail', 
                    'userRole',
                    'userName',
                    'bookings'
                ));
            } else {
                return redirect()->route('login')
                    ->with('error', 'Bạn cần đăng nhập để xem lịch đặt.');
            }
        } catch (\Exception $e) {
            Log::error('Error in showBookingHistory: ' . $e->getMessage());
            // Trả về view với bookings rỗng
            return view('baido.lichdat', [
                'bookings' => collect(), // Trả về collection rỗng
                'error' => 'Có lỗi xảy ra khi tải lịch đặt. Vui lòng thử lại.'
            ]);
        }
    }
    public function cancelBooking($id)
    {
        try {
            $booking = Reservation::where('reservationid', $id)
                ->where('customerid', Auth::id())
                ->first();

            if (!$booking) {
                return redirect()->back()->with('error', 'Không tìm thấy lịch đặt này!');
            }

            // Kiểm tra xem có thể hủy không
            if ($booking->status === 'Đã hủy') {
                return redirect()->back()->with('error', 'Lịch đặt này đã được hủy trước đó!');
            }

            if ($booking->status === 'Đã đỗ') {
                return redirect()->back()->with('error', 'Không thể hủy lịch đặt đã hoàn thành!');
            }

            // Cập nhật trạng thái
            $booking->status = 'Đã hủy';
            $booking->save();

            return redirect()->back()->with('success', 'Hủy lịch đặt thành công!');

        } catch (\Exception $e) {
            Log::error('Error canceling booking: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi hủy lịch đặt!');
        }
    }
}
    