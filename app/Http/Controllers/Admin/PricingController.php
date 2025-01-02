<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pricing;
use App\Models\Vehicle;
use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PricingController extends Controller
{
    public function all_pricing(Request $request)
    {
        $all_pricing = DB::table('vehicles')
            ->select(
                'vehicles.vehicleid',
                'vehicles.license_plate',
                'vehicles.vehicle_type',
                'vehicles.entry_time',
                'vehicles.exit_time',
                // 'pricing_rules.pricing_ruleid',
                // 'pricing_rules.price_per_hour',
                'logs.action'
            )
            // ->leftJoin('pricing_rules', 'vehicles.vehicleid', '=', 'pricing_rules.vehicleid')
            ->leftJoin('logs', 'vehicles.vehicleid', '=', 'logs.vehicleid')
            ->orderBy('vehicles.vehicleid')
            ->paginate(5);

        return view('admin.pricing.all_pricing', compact('all_pricing'));
    }

    public function edit_pricing($vehicleid)
    {
        $edit_pricing = DB::table('vehicles')
            ->select(
                'vehicles.vehicleid',
                'vehicles.license_plate',
                'vehicles.vehicle_type',
                'pricing_rules.pricing_ruleid',
                'pricing_rules.price_per_hour',
                'logs.action'
            )
            ->leftJoin('pricing_rules', 'vehicles.vehicleid', '=', 'pricing_rules.vehicleid')
            ->leftJoin('logs', 'vehicles.vehicleid', '=', 'logs.vehicleid')
            ->where('vehicles.vehicleid', $vehicleid)
            ->first();

        return view('admin.pricing.edit_pricing', compact('edit_pricing'));
    }

    public function update_pricing(Request $request, $vehicleid)
    {
        try {
            $pricing_data = [
                'price_per_hour' => $request->action == 'Vé tháng' 
                    ? ($request->vehicle_type == 'Xe máy' ? 1000000 : 1500000)
                    : ($request->vehicle_type == 'Xe máy' ? 7000 : 15000),
                'vehicleid' => $vehicleid
            ];

            DB::table('pricing_rules')
                ->updateOrInsert(
                    ['vehicleid' => $vehicleid],
                    $pricing_data
                );

            DB::table('logs')
                ->updateOrInsert(
                    ['vehicleid' => $vehicleid],
                    ['action' => $request->action]
                );

            Session::flash('message', 'Cập nhật giá thành công');
            return redirect('/all-pricing');
        } catch (\Exception $e) {
            Session::flash('error', 'Có lỗi xảy ra: ' . $e->getMessage());
            return redirect()->back();
        }
    }


}
