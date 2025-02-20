<?php

namespace App\Http\Controllers;

use App\Models\MyLoftLog;
use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function stations()
    {
        $stations = Station::where('user_id', auth()->id())->get();

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
            'location_name' => 'required',
            'location' => 'required',
        ]);

        $validatedData['user_id'] = auth()->id();
        Station::create($validatedData);

        return redirect()->route('stations')->with('success', __('Station created successfully'));
    }

    public function editStation(Station $station)
    {
        return view('stations.edit', compact('station'));
    }

    public function updateStation(Request $request, Station $station)
    {
        $validatedData = $request->validate([
            'station_name' => 'required',
            'location_name' => 'required',
            'location' => 'required',
        ]);

        $station->update($validatedData);

        return redirect()->route('stations')->with('success', __('Station updated successfully'));
    }

    public function destroyStation(Station $station)
    {
        $station->delete();

        return redirect()->route('stations')->with('success', __('Station deleted successfully'));
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

        $validatedData['user_id'] = auth()->id();
        MyLoftLog::create($validatedData);

        return redirect()->route('stations.myloft')->with('success', __('Location saved successfully'));
    }
}
