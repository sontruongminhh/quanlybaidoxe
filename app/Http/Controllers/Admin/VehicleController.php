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
        ];
        return view('admin.vehicles.add_vehicle', ['data' => $data]);
    }
    public function all_vehicle()
    {
        $all_vehicle = Vehicle::select(
            'vehicles.*',
            'parking_lots.name as parking_lot',
            'parking_slots.slort_number as parking_slot',
            'users.name as user'    
        )
            ->join('parking_lots', 'parking_lots.parkingid', 'vehicles.parkingid')
            ->join('parking_slots','parking_slots.parking_slotid','vehicles.parking_slotid')
            ->join('users', 'users.userid','vehicles.ownerid')
            ->orderby('vehicles.vehicleid', 'desc')->get();
        $manager_vehicle = view('admin.vehicles.all_vehicle')->with('all_vehicle', $all_vehicle);
        return view('admin.index')->with('admin.all_vehicle', $manager_vehicle);
    }

    public function save_vehicle(Request $request) {
        $data['ownerid'] = $request -> vehicle_ownerid;
        $data['license_plate'] = $request -> vehicle_license_plate;
        $data['vehicle_type'] = $request -> vehicle_vehicle_type;
        $data['entry_time'] = $request -> vehicle_entry_time;
        $data['exit_time'] = $request -> vehicle_exit_time;
        $data['image'] = $request -> vehicle_image;
        $data['parkingid'] = $request -> vehicle_parkingid;
        $data['parking_slotid'] = $request -> vehicle_parking_slotid;   
    
        $get_image = $request->file('vehicle_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99). '.'. $get_image->getClientOriginalExtension();
            $get_image->move('public/customer', $new_image);
            $data['image'] = $new_image;
            DB::table('vehicles') -> insert($data);
            Session::put('message', 'Thêm  thành công');
            return Redirect::to('add-vehicle');
        }
        $data['image'] = '';
        DB::table('vehicles') -> insert($data);
        Session::put('message', 'Thêm thành công');
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

    // public function update_vehicle(Request $request, $vehicle_id)
    // {
    //     // Validate input data
    //     $request->validate([
    //         'vehicle_parkingid' => 'required',
    //         'vehicle_parking_slotid' => 'required',
    //         'vehicle_userid' => 'required',  // Ensure this field is required
    //         'vehicle_license_plate' => 'required',
    //         'vehicle_vehicle_type' => 'required',
    //         // Add other necessary validations
    //     ]);
    
    //     // Find the vehicle
    //     $vehicle = Vehicle::find($vehicle_id);
    //     if (!$vehicle) {
    //         abort(404);
    //     }
    
    //     // Update the vehicle record, including 'ownerid' from 'vehicle_userid'
    //     $vehicle->update([
    //         'parkingid' => $request->vehicle_parkingid,
    //         'parking_slotid' => $request->vehicle_parking_slotid,
    //         'ownerid' => $request->vehicle_userid, // Assign the ownerid here
    //         'license_plate' => $request->vehicle_license_plate,
    //         'vehicle_type' => $request->vehicle_vehicle_type,
    //         'entry_time' => $request->vehicle_entry_time,
    //         'exit_time' => $request->vehicle_exit_time,
    //         'image' => $request->vehicle_image, // Handle file upload if necessary
    //     ]);
    
    //     return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    // }
    



    public function update_vehicle(Request $request, $vehicle_id) {
        $data['ownerid'] = $request -> vehicle_ownerid;
        $data['license_plate'] = $request -> vehicle_license_plate;
        $data['vehicle_type'] = $request -> vehicle_vehicle_type;
        $data['entry_time'] = $request -> vehicle_entry_time;
        $data['exit_time'] = $request -> vehicle_exit_time;
        $data['image'] = $request -> vehicle_image;
        $data['parkingid'] = $request -> vehicle_parkingid;
        $data['parking_slotid'] = $request -> vehicle_parking_slotid;   
    
        $get_image = $request->file('vehicle_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/customer', $new_image);
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
