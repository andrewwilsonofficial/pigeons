<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Race;

class RaceController extends Controller
{
    public function races()
    {
        $races = Race::where('user_id', auth()->id())->get();

        return view('races.index', compact('races'));
    }

    public function createRace()
    {
        return view('races.create');
    }

    public function storeRace(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'type' => 'nullable|in:one-loft,futurity,club,combine,federation,training',
            'date' => 'nullable|date',
            'club_name' => 'nullable|string',
            'club_number' => 'nullable|string',
            'club_location' => 'nullable|string',
            'combine_name' => 'nullable|string',
            'release_point_name' => 'nullable|string',
            'release_longitude' => 'nullable|string',
            'release_latitude' => 'nullable|string',
            'destination_point_name' => 'nullable|string',
            'destination_longitude' => 'nullable|string',
            'destination_latitude' => 'nullable|string',
            'release_temperature' => 'nullable|string',
            'release_weather' => 'nullable|string',
            'release_notes' => 'nullable|string',
            'destination_temperature' => 'nullable|string',
            'destination_weather' => 'nullable|string',
            'destination_notes' => 'nullable|string',
            'total_birds' => 'nullable|string',
            'total_lofts' => 'nullable|string',
            'release_time' => 'nullable',
        ]);

        $validatedData['user_id'] = auth()->id();
        $race = Race::create($validatedData);

        if (!$race) {
            return redirect()->route('races.create')->with('error', __('Failed to create race'));
        }

        return redirect()->route('races')->with('success', __('Race created successfully'));
    }

    public function race(Race $race)
    {
        return view('races.view', compact('race'));
    }

    public function editRace(Race $race)
    {
        return view('races.edit', compact('race'));
    }

    public function updateRace(Race $race, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'type' => 'nullable|in:one-loft,futurity,club,combine,federation,training',
            'date' => 'nullable|date',
            'club_name' => 'nullable|string',
            'club_number' => 'nullable|string',
            'club_location' => 'nullable|string',
            'combine_name' => 'nullable|string',
            'release_point_name' => 'nullable|string',
            'release_longitude' => 'nullable|string',
            'release_latitude' => 'nullable|string',
            'destination_point_name' => 'nullable|string',
            'destination_longitude' => 'nullable|string',
            'destination_latitude' => 'nullable|string',
            'release_temperature' => 'nullable|string',
            'release_weather' => 'nullable|string',
            'release_notes' => 'nullable|string',
            'destination_temperature' => 'nullable|string',
            'destination_weather' => 'nullable|string',
            'destination_notes' => 'nullable|string',
            'total_birds' => 'nullable|string',
            'total_lofts' => 'nullable|string',
            'release_time' => 'nullable',
        ]);

        $race->update($validatedData);

        return redirect()->route('races')->with('success', __('Race updated successfully'));
    }

    public function destroyRace(Race $race)
    {
        $race->delete();

        return redirect()->route('races')->with('success', __('Race deleted successfully'));
    }

    public function tools()
    {
        return view('races.tools');
    }
}
