<?php

namespace App\Http\Controllers;

use App\Models\MyLoftLog;
use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function stations()
    {
        $stations = Station::all();

        return view('stations.index', compact('stations'));
    }

    public function createStation()
    {
        return view('stations.create');
    }

    public function storeStation(Request $request)
    {
        $validatedData = $request->validate([
            'station_name' => 'required',
            'location_name' => 'nullable',
            'location' => 'nullable',
        ]);

        Station::create($validatedData);

        return redirect()->route('stations')->with('success', __('Station created successfully'));
    }

    public function myLoft()
    {
        return view('stations.my-loft');
    }

    public function storeMyLoft(Request $request)
    {
        $validatedData = $request->validate([
            'location' => 'required',
        ]);

        MyLoftLog::create($validatedData);

        return redirect()->route('stations.myloft')->with('success', __('Location saved successfully'));
    }
}
