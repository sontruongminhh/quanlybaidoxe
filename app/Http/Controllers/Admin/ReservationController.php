<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\ParkingLot;
use App\Models\ParkingSlot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class ReservationController extends Controller
{
    public function add_reservation()
    {
        $data = [
            'parking_lots' => ParkingLot::all(),
            'parking_slots' => ParkingSlot::all(),
            'users' => User::all(),
        ];
        return view('admin.reservations.add_reservation', ['data' => $data]);
    }
    public function all_reservation()
    {
        $all_reservation = reservation::select(
            'reservations.*',
            'parking_lots.name as parking_lot',
            'parking_slots.slort_number as parking_slot',
            'users.name as user'    
        )
            ->join('parking_lots', 'parking_lots.parkingid', 'reservations.parkingid')
            ->join('parking_slots','parking_slots.parking_slotid','reservations.parking_slotid')
            ->join('users', 'users.userid','reservations.customerid')
            ->orderby('reservations.reservationid', 'desc')->get();
        $manager_reservation = view('admin.reservations.all_reservation')->with('all_reservation', $all_reservation);
        return view('admin.index')->with('admin.all_reservation', $manager_reservation);
    }

    public function save_reservation(Request $request) {
        // Kiểm tra biển số xe đã tồn tại trong cơ sở dữ liệu hay chưa
        $existing_reservation = DB::table('reservations')
        ->where('parkingid', $request->reservation_parkingid)
        ->where('parking_slotid', $request->reservation_parking_slotid)
        ->first();
    
    if ($existing_reservation) {
        return redirect()->back()->withErrors([
            'duplicate_reservation' => 'Vị trí đỗ xe này đã được đặt, vui lòng chọn vị trí khác.'
        ])->withInput();
    }
    
    // Thêm các thao tác tiếp theo nếu không có trùng lặp
    
    
        // Thu thập dữ liệu từ form
        $data['customerid'] = $request->reservation_customerid;
        $data['reservation_time'] = $request->reservation_reservation_time;      
        $data['start_time'] = $request->reservation_start_time;
        $data['end_time'] = $request->reservation_end_time;
        $data['status'] = $request->reservation_status;
        $data['parking_slotid'] = $request->reservation_parking_slotid;   
        $data['parkingid'] = $request->reservation_parkingid;   
    
        // Chèn dữ liệu vào bảng
        DB::table('reservations')->insert($data);
        Session::put('message', 'Thêm thành công.');
        return Redirect::to('add-reservation');
    }
    
    

    public function edit_reservation($reservation_id)
    {
        $edit_reservation = DB::table('reservations')->where('reservationid', $reservation_id)->first();
        if (!$edit_reservation) {
            abort(404);
        }
        $data = [
            'parking_lots' => ParkingLot::all(),
            'parking_slots' => ParkingSlot::all(),
            'users' => User::all(),
            'edit_reservation' => $edit_reservation
        ];
        return view('admin.reservations.edit_reservation', ['data' => $data]);
    }



    public function update_reservation(Request $request, $reservation_id) {
        $data['customerid'] = $request->reservation_customerid;
        $data['reservation_time'] = $request->reservation_reservation_time;
        $data['start_time'] = $request->reservation_start_time;
        $data['end_time'] = $request->reservation_end_time;
        $data['status'] = $request->reservation_status;
        $data['parking_slotid'] = $request->reservation_parking_slotid;     
        $data['parkingid'] = $request->reservation_parkingid;
    
        DB::table('reservations')->where('reservationid', $reservation_id)->update($data);
        Session::put('message', 'Cập nhật thành công');
        return Redirect::to('all-reservation');
    }
    public function delete_reservation($reservation_id){
        DB::table('reservations')->where('reservationid', $reservation_id)->delete();
        Session::put('message', 'Xóa  thành công');
        return Redirect::to('all-reservation');
    }
   
    public function updateStatus(Request $request, $id)
{
    $product = Reservation::find($id);
    if ($product) {
        // Chuyển đổi trạng thái
        $product->status = $product->status === 'đang chờ' ? 'đã duyệt' : 'đang chờ';
        $product->save();

        return response()->json([
            'success' => true,
            'newStatus' => $product->status
        ]);
    }
    return response()->json(['success' => false]);
}


}
