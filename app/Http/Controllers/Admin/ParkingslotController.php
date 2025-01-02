<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\ParkingSlot;
class ParkingslotController extends Controller
{
    public function all_parkingslot(Request $request)
    {
        $items_per_page = 10;

        $all_parkingslot = ParkingSlot::select(
            'parking_slots.*',
            'vehicles.vehicleid',
            'vehicles.vehicle_type as vehicle_type',
            'vehicles.license_plate',
            'parking_lots.name as parking_lot_name'
        )
        ->leftJoin('vehicles', 'parking_slots.parking_slotid', '=', 'vehicles.parking_slotid')
        ->leftJoin('parking_lots', 'parking_lots.parkingid', '=', 'vehicles.parkingid')
        ->orderBy('parking_slots.parking_slotid', 'desc')
        ->paginate($items_per_page);

        if ($request->ajax()) {
            return view('admin.parkingslots.parking_slot_data', compact('all_parkingslot'));
        }

        return view('admin.parkingslots.all_parkingslot', compact('all_parkingslot'));
    }
    
    public function edit_parkingslot($parkingslot_id)
    {
        $edit_parkingslot = ParkingSlot::select(
            'parking_slots.*',
            'vehicles.vehicleid',
            'vehicles.vehicle_type as vehicle_type',
            'vehicles.license_plate',
            'parking_lots.name as parking_lot_name'
        )
        ->leftJoin('vehicles', 'parking_slots.parking_slotid', '=', 'vehicles.parking_slotid')
        ->leftJoin('parking_lots', 'parking_lots.parkingid', '=', 'vehicles.parkingid')
        ->where('parking_slots.parking_slotid', $parkingslot_id)
        ->first();

        return view('admin.parkingslots.edit_parkingslot', compact('edit_parkingslot'));
    }
    
    public function update_parkingslot(Request $request, $parkingslot_id) 
    {
        $request->validate([
            'slort_number' => 'required',
            'status' => 'required',
            'position_x' => 'required|numeric',
            'position_y' => 'required|numeric',
        ]);

        $parkingslot = ParkingSlot::find($parkingslot_id);
        $parkingslot->slort_number = $request->slort_number;
        $parkingslot->status = $request->status;
        $parkingslot->position_x = $request->position_x;
        $parkingslot->position_y = $request->position_y;
        $parkingslot->save();

        Session::flash('message', 'Cập nhật vị trí đỗ xe thành công');
        return redirect()->route('all-parkingslot');
    }

        
    public function delete_parkingslot($parkingslot_id)
    {
        try {
            // Tìm và xóa trực tiếp
            DB::table('parking_slots')
                ->where('parking_slotid', $parkingslot_id)
                ->delete();
            
            Session::flash('message', 'Xóa vị trí đỗ xe thành công');
            return redirect('/all-parkingslot');
            
        } catch (\Exception $e) {
            Session::flash('error', 'Có lỗi xảy ra khi xóa: ' . $e->getMessage());
            return redirect('/all-parkingslot');
        }
    }
}
