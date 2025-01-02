<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Log;
class LogController extends Controller
{
    
    public function add_log(){

        $data = [
            'vehicles' => Vehicle::all(),
            'users' => User::all(),
        ];
        return view('admin.logs.add_log', ['data' => $data]);
    }
    public function all_log(){
        $all_log = log::select(
            'logs.*',
            'vehicles.license_plate as vehicle',
            'vehicles.vehicle_type as vehicle_type',
            'vehicles.entry_time as vehicle_entry',
            'vehicles.exit_time as vehicle_exit',
            'users.name as user'    
        )
            ->join('vehicles', 'vehicles.vehicleid', 'logs.vehicleid')
            ->join('users', 'users.userid','logs.userid')
            ->orderby('logs.logid', 'desc')
            ->paginate(10);
        
        $manager_log = view('admin.logs.all_log')->with('all_log', $all_log);
        return view('admin.index')->with('admin.all_log', $manager_log);
    }
    public function save_log(Request $request) {
        // Kiểm tra xem lịch sử với cùng vehicleid (biển số) đã tồn tại trong cơ sở dữ liệu hay chưa
        $existing_reservation = DB::table('logs')
            ->where('vehicleid', $request->log_vehicleid)
            ->first();
        
        if ($existing_reservation) {
            return redirect()->back()->withErrors([
                'duplicate_reservation' => 'Biển số này đã tồn tại, vui lòng nhập lại.'
            ])->withInput();
        }
    
        // Xác thực các yêu cầu đầu vào
        $request->validate([
            'log_action' => 'required|string',
            'log_details' => 'required|string',
        ], [
            'log_action.required' => 'Loại vé không được để trống.',
            'log_details.required' => 'Ghi chú không được để trống.'
        ]);
    
        // Chuẩn bị dữ liệu để lưu vào bảng logs
        $data = [
            'userid' => $request->log_userid,
            'vehicleid' => $request->log_vehicleid,
            'action' => $request->log_action,
            'details' => $request->log_details
        ];
    
        // Thêm dữ liệu vào bảng logs
        DB::table('logs')->insert($data);
        Session::put('message', 'Thêm thành công');
    
        return Redirect::to('add-log');
    }
    
    
    
    public function edit_log($log_id)
    {
        $edit_log = DB::table('logs')->where('logid', $log_id)->first();
        if (!$edit_log) {
            abort(404);
        }
        $data = [
            'vehicles' => Vehicle::all(),
            'users' => User::all(),
            'edit_log' => $edit_log
        ];
        return view('admin.logs.edit_log', ['data' => $data]);
    }
    
    public function update_log(Request $request, $log_id) {
       
        $data['userid'] = $request -> log_userid;
        $data['vehicleid'] = $request -> log_vehicleid;
        $data['action'] = $request -> log_action;
        $data['details'] = $request -> log_details;
    
        
    
        DB::table('logs')->where('logid', $log_id)->update($data);
        Session::put('message', 'Cập nhật thành công');
        return Redirect::to('all-log');
    }

        
    public function delete_log($log_id){
        DB::table('logs')->where('logid', $log_id)->delete();
        Session::put('message', 'Xóa  thành công');
        return Redirect::to('all-log');
    }
}
