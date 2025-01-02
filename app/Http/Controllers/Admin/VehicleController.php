<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\ParkingLot;
use App\Models\ParkingSlot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class VehicleController extends Controller
{
    public function add_vehicle()
    {
        $data = [
            'parking_lots' => ParkingLot::all(),
            'parking_slots' => ParkingSlot::all(),
            'users' => User::all(),
            'vehicles' => Vehicle::all(),
        ];
        return view('admin.vehicles.add_vehicle', ['data' => $data]);
    }
    public function all_vehicle(Request $request)
    {
        $search = $request->input('search');

        $query = Vehicle::select(
            'vehicles.*',
            'parking_lots.name as parking_lot',
            'parking_slots.slort_number as parking_slot',
            'users.name as user',
            DB::raw('CASE 
                WHEN vehicles.exit_time IS NULL THEN "Đang đỗ"
                ELSE "Đã rời đi"
            END as status')    
        )
            ->join('parking_lots', 'parking_lots.parkingid', 'vehicles.parkingid')
            ->join('parking_slots','parking_slots.parking_slotid','vehicles.parking_slotid')
            ->join('users', 'users.userid','vehicles.ownerid');

        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('users.name', 'LIKE', '%'.$search.'%')
                  ->orWhere('vehicles.license_plate', 'LIKE', '%'.$search.'%')
                  ->orWhere('vehicles.vehicle_type', 'LIKE', '%'.$search.'%')
                  ->orWhere('parking_lots.name', 'LIKE', '%'.$search.'%')
                  ->orWhere('parking_slots.slort_number', 'LIKE', '%'.$search.'%');
            });
        }

        $all_vehicle = $query->orderBy('vehicles.vehicleid', 'desc')->paginate(5);
        
        if ($request->ajax()) {
            return view('admin.vehicles.vehicle_table', ['all_vehicle' => $all_vehicle])->render();
        }

        return view('admin.vehicles.all_vehicle', ['all_vehicle' => $all_vehicle]);
    }

    public function save_vehicle(Request $request) {
        // Kiểm tra biển số xe đã tồn tại trong cơ sở dữ liệu hay chưa
        $existing_vehicle = DB::table('vehicles')
            ->where('license_plate', $request->vehicle_license_plate)
            ->first();
    
        // Nếu biển số đã tồn tại, trả về thông báo lỗi
        if ($existing_vehicle) {
            return redirect()->back()->withErrors(['vehicle_license_plate' => 'Biển số này đã tồn tại.'])->withInput();
        }
    
        // Thu thập dữ liệu từ form
        $data['ownerid'] = $request->vehicle_ownerid;
        $data['license_plate'] = $request->vehicle_license_plate;
        $data['vehicle_type'] = $request->vehicle_vehicle_type;
        $data['entry_time'] = $request->vehicle_entry_time;
        $data['exit_time'] = $request->vehicle_exit_time;
        $data['image'] = $request->vehicle_image;
        $data['parkingid'] = $request->vehicle_parkingid;
        $data['parking_slotid'] = $request->vehicle_parking_slotid;   
        $data['status'] = $request->vehicle_status;
        // Xử lý ảnh nếu có
        $get_image = $request->file('vehicle_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/customer', $new_image);
            $data['image'] = $new_image;
        } else {
            $data['image'] = '';
        }
    
        // Chèn dữ liệu vào bảng
        DB::table('vehicles')->insert($data);
        Session::put('message', 'Thêm phương tiện thành công.');
        return Redirect::to('add-vehicle');
    }
    
    

    public function edit_vehicle($vehicle_id)
    {
        $edit_vehicle = DB::table('vehicles')->where('vehicleid', $vehicle_id)->first();
        if (!$edit_vehicle) {
            abort(404);
        }
        $data = [
            'parking_lots' => ParkingLot::all(),
            'parking_slots' => ParkingSlot::all(),
            'users' => User::all(),
            'edit_vehicle' => $edit_vehicle
        ];
        return view('admin.vehicles.edit_vehicle', ['data' => $data]);
    }



    public function update_vehicle(Request $request, $vehicle_id) {
        $data = [
            'ownerid' => $request->vehicle_ownerid,
            'license_plate' => $request->vehicle_license_plate,
            'vehicle_type' => $request->vehicle_vehicle_type,
            'entry_time' => $request->vehicle_entry_time,
            'parkingid' => $request->vehicle_parkingid,
            'parking_slotid' => $request->vehicle_parking_slotid,
        ];

        // Xử lý exit_time dựa vào trạng thái
        if ($request->vehicle_status === 'left') {
            $data['exit_time'] = $request->vehicle_exit_time;
        } else {
            $data['exit_time'] = null;
        }

        // Xử lý ảnh nếu có
        if ($request->hasFile('vehicle_image')) {
            $image = $request->file('vehicle_image');
            $new_image = time() . '.' . $image->getClientOriginalExtension();
            $image->move('public/customer', $new_image);
            $data['image'] = $new_image;
        }

        DB::table('vehicles')->where('vehicleid', $vehicle_id)->update($data);
        Session::put('message', 'Cập nhật thành công');
        return Redirect::to('all-vehicle');
    }
    public function delete_vehicle($vehicle_id){
        DB::table('vehicles')->where('vehicleid', $vehicle_id)->delete();
        Session::put('message', 'Xóa  thành công');
        return Redirect::to('all-vehicle');
    }
   
}
