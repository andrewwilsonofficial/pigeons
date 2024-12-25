<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Race;

class RaceController extends Controller
{
    public function races()
    {
        $races = Race::all();

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
            'description' => 'required',
        ]);

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

    public function editRace($id)
    {
        $race = Race::findOrFail($id);

        return view('races.edit', compact('race'));
    }

    public function updateRace(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $race = Race::findOrFail($id);
        $race->update($validatedData);

        return redirect()->route('races')->with('success', __('Race updated successfully'));
    }

    public function deleteRace($id)
    {
        $race = Race::findOrFail($id);
        $race->delete();

        return redirect()->route('races')->with('success', __('Race deleted successfully'));
    }

    public function tools()
    {
        return view('races.tools');
    }
}
