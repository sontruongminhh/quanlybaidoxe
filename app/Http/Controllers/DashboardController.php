<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Contact;
use App\Models\Reservation;

class DashboardController extends Controller
{
        public function index(Request $request)
        {
                // Lấy ngày tháng từ người dùng hoặc mặc định là ngày hiện tại
                $date = $request->get('date', Carbon::today()->toDateString());

                // Tổng số lượng xe trong ngày
                $totalVehiclesToday = Vehicle::whereDate('entry_time', $date)->count();

                // Tổng số xe hiện tại trong bãi
                $totalVehiclesInParking = Vehicle::whereNull('exit_time')
                        ->whereDate('entry_time', '<=', Carbon::today()) // Đảm bảo xe đã vào bãi trước hoặc trong hôm nay
                        ->count();

                // Tổng số khách hàng từ bảng users với role = 3
                $totalCustomers = User::where('role', 3)->count();

                // Thống kê phản hồi
                $feedbackResolved = Contact::whereDate('contact_time', $date)
                        ->where('status', 'Đã được xử lý')
                        ->count();
                $feedbackPending = Contact::whereDate('contact_time', $date)
                        ->where('status', 'Chưa giải quyết')
                        ->count();

                // Thống kê lịch đặt
                $reservationResolvedToday = Reservation::whereDate('reservation_time', $date)->count();

                // Truyền dữ liệu sang view
                return view('admin.dashboard', compact(
                        'totalVehiclesToday',
                        'totalVehiclesInParking', // Truyền số xe hiện tại trong bãi
                        'totalCustomers',
                        'date',
                        'feedbackPending',
                        'feedbackResolved',
                        'reservationResolvedToday',
                       
                ));
        }
}
