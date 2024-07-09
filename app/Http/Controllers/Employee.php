<?php

namespace App\Http\Controllers;

use App\Models\Employee as ModelsEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class Employee extends Controller
{
    public function index()
    {
        $employee = ModelsEmployee::orderBy('total_bonus', 'desc')->whereNull('deleted_at')->paginate(5);
        return view('employee.index', compact('employee'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'presence' => "required",
            'customer_complain' => "required",
            'vehicle_complain' => "required",
            'total_service' => "required",
            'team_complain' => "required"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        ModelsEmployee::create([
            'name' => $request->name,
            'presence' => $request->presence,
            'customer_complain' => $request->customer_complain,
            'vehicle_complain' => $request->vehicle_complain,
            'total_service' => $request->total_service,
            'team_complain' => $request->team_complain,
            'total_bonus' => 0
        ]);
        return redirect()->route('employee.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(ModelsEmployee $employee)
    {
        return view("employee.edit", compact('employee'));
    }

    public function update(Request $request, ModelsEmployee $employee)
    {
        $this->validate($request, [
            'name' => "required",
            'presence' => "required",
            'customer_complain' => "required",
            'vehicle_complain' => "required",
            'total_service' => "required",
            'team_complain' => "required"
        ]);

        $employee->update([
            'name' => $request->name,
            'presence' => $request->presence,
            'customer_complain' => $request->customer_complain,
            'vehicle_complain' => $request->vehicle_complain,
            'total_service' => $request->total_service,
            'team_complain' => $request->team_complain,
            'total_bonus' => 0
        ]);
        return redirect()->route('employee.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(ModelsEmployee $employee)
    {
        return view("employee.show", compact('employee'));
    }

    public function refreshscore(Request $request)
    {

        $emp_data = ModelsEmployee::whereNull('deleted_at')->get();

        $sum_presence = 0;
        $sum_customer_complain = 0;
        $sum_vehicle_complain = 0;
        $sum_total_service = 0;
        $sum_team_complain = 0;

        // 1
        foreach ($emp_data as $item) {
            $presence = ($item->presence / 72) * 100;
            if ($presence == 100) {
                $total_presence = 100;
            }
            if ($presence > 80 && $presence < 100) {
                $total_presence = 90;
            }
            if ($presence > 69 && $presence < 81) {
                $total_presence = 75;
            }
            if ($presence < 70) {
                $total_presence = 50;
            }
            $sum_presence = $sum_presence + $total_presence;
        }

        // 2
        foreach ($emp_data as $item) {
            if ($item->customer_complain == 0) {
                $total_customer_complain = 100;
            }
            if ($item->customer_complain > 0 && $item->customer_complain < 4) {
                $total_customer_complain = 90;
            }
            if ($item->customer_complain > 3 && $item->customer_complain < 7) {
                $total_customer_complain = 75;
            }
            if ($item->customer_complain > 6) {
                $total_customer_complain = 50;
            }
            $sum_customer_complain = $sum_customer_complain + $total_customer_complain;
        }

        // 3
        foreach ($emp_data as $item) {
            if ($item->vehicle_complain == 0) {
                $total_vehicle_complain = 100;
            }
            if ($item->vehicle_complain > 0 && $item->vehicle_complain < 4) {
                $total_vehicle_complain = 90;
            }
            if ($item->vehicle_complain > 3 && $item->vehicle_complain < 7) {
                $total_vehicle_complain = 75;
            }
            if ($item->vehicle_complain > 6) {
                $total_vehicle_complain = 50;
            }
            $sum_vehicle_complain = $sum_vehicle_complain + $total_vehicle_complain;
        }

        // 4
        foreach ($emp_data as $item) {
            if ($item->total_service > 360) {
                $x_total_service = 100;
            }
            if ($item->total_service > 300 && $item->total_service < 361) {
                $x_total_service = 90;
            }
            if ($item->total_service > 214 && $item->total_service < 301) {
                $x_total_service = 75;
            }
            if ($item->total_service < 215) {
                $x_total_service = 50;
            }
            $sum_total_service = $sum_total_service + $x_total_service;
        }

        // 5
        foreach ($emp_data as $item) {
            if ($item->team_complain == 0) {
                $total_team_complain = 100;
            }
            if ($item->team_complain > 0 && $item->team_complain < 4) {
                $total_team_complain = 90;
            }
            if ($item->team_complain > 3 && $item->team_complain < 7) {
                $total_team_complain = 75;
            }
            if ($item->team_complain > 6) {
                $total_team_complain = 50;
            }
            $sum_team_complain = $sum_team_complain + $total_team_complain;
        }


        // initial
        $s = 0;
        $arrays = [];
        foreach ($emp_data as $item) {
            // Menghitung Kehadiran
            $presence = ($item->presence / 72) * 100;
            if ($presence == 100) {
                $total_presence = 100;
            }
            if ($presence > 80 && $presence < 100) {
                $total_presence = 90;
            }
            if ($presence > 69 && $presence < 81) {
                $total_presence = 75;
            }
            if ($presence < 70) {
                $total_presence = 50;
            }
            $c1 = round($total_presence / ($sum_presence ?: 1), 2, PHP_ROUND_HALF_EVEN);
            $w1 = round(pow($c1, 0.25), 2, PHP_ROUND_HALF_EVEN);

            // Menghitung komplain pelanggan
            $total_customer_complain = 0;
            if ($item->customer_complain == 0) {
                $total_customer_complain = 100;
            }
            if ($item->customer_complain > 0 && $item->customer_complain < 4) {
                $total_customer_complain = 90;
            }
            if ($item->customer_complain > 3 && $item->customer_complain < 7) {
                $total_customer_complain = 75;
            }
            if ($item->customer_complain > 6) {
                $total_customer_complain = 50;
            }
            $c2 = round($total_customer_complain / ($sum_customer_complain ?: 1), 2, PHP_ROUND_HALF_EVEN);
            $w2 = round(pow($c2, 0.15), 2, PHP_ROUND_HALF_EVEN);

            // Menghitung komplain kendaraan
            $total_vehicle_complain = 0;
            if ($item->vehicle_complain == 0) {
                $total_vehicle_complain = 100;
            }
            if ($item->vehicle_complain > 0 && $item->vehicle_complain < 4) {
                $total_vehicle_complain = 90;
            }
            if ($item->vehicle_complain > 3 && $item->vehicle_complain < 7) {
                $total_vehicle_complain = 75;
            }
            if ($item->vehicle_complain > 6) {
                $total_vehicle_complain = 50;
            }
            $c3 = round($total_vehicle_complain / ($sum_vehicle_complain ?: 1), 2, PHP_ROUND_HALF_EVEN);
            $w3 = round(pow($c3, 0.20), 2, PHP_ROUND_HALF_EVEN);

            // Menghitung total servis
            $x_total_service = 0;
            if ($item->total_service > 360) {
                $x_total_service = 100;
            }
            if ($item->total_service > 300 && $item->total_service < 361) {
                $x_total_service = 90;
            }
            if ($item->total_service > 214 && $item->total_service < 301) {
                $x_total_service = 75;
            }
            if ($item->total_service < 215) {
                $x_total_service = 50;
            }
            $c4 = round($x_total_service / ($sum_total_service ?: 1), 2, PHP_ROUND_HALF_EVEN);
            $w4 = round(pow($c4, 0.30), 2, PHP_ROUND_HALF_EVEN);

            // Menghitung komplain kerjasama tim
            $total_team_complain = 0;
            if ($item->team_complain == 0) {
                $total_team_complain = 100;
            }
            if ($item->team_complain > 0 && $item->team_complain < 4) {
                $total_team_complain = 90;
            }
            if ($item->team_complain > 3 && $item->team_complain < 7) {
                $total_team_complain = 75;
            }
            if ($item->team_complain > 6) {
                $total_team_complain = 50;
            }
            $c5 = round($total_team_complain / ($sum_team_complain ?: 1), 2, PHP_ROUND_HALF_EVEN);
            $w5 = round(pow($c5, 0.10), 2, PHP_ROUND_HALF_EVEN);

            $total_bonus = $w1 * $w2 * $w3 * $w4 * $w5;
            $s = $s + round($total_bonus, 2, PHP_ROUND_HALF_EVEN);
            $item->total_bonus = round($total_bonus, 2, PHP_ROUND_HALF_EVEN);
        }

        foreach ($emp_data as $item) {
            $result = round($item->total_bonus / $s, 2, PHP_ROUND_HALF_EVEN);
            $item->update([
                'total_bonus' => $result
            ]);
            Log::info($result);
        }
        return redirect()->route('employee.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy(ModelsEmployee $employee)
    {
        $employee->deleted_at = now();
        $employee->save();
        return redirect()->route('employee.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
