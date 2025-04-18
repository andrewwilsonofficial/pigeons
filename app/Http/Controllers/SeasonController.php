<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function seasons()
    {
        $seasons = Season::where('user_id', auth()->id())->get();

        return view('seasons.index', compact('seasons'));
    }

    public function createSeason()
    {
        return view('seasons.create');
    }

    public function storeSeason(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'current_season' => 'nullable',
        ]);

        if ($request->has('current_season')) {
            $validatedData['current_season'] = true;
        }

        $validatedData['user_id'] = auth()->id();

        try {
            Season::create($validatedData);
            return redirect()->route('seasons')->with('success', __('Season created successfully'));
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('seasons.create')->with('error', __('Failed to create season'));
        }
    }

    public function season(Season $season)
    {
        return view('seasons.view', compact('season'));
    }
}
