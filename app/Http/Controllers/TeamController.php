<?php

namespace App\Http\Controllers;

use App\Models\Pigeon;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function teams()
    {
        $teams = Team::where('user_id', auth()->id())->get();

        return view('teams.index', compact('teams'));
    }

    public function createTeam()
    {
        $pigeons = Pigeon::where('user_id', auth()->id())->get();

        return view('teams.create', compact('pigeons'));
    }

    public function storeTeam(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'pigeons' => 'required|array',
        ]);

        $validatedData['pigeons'] = json_encode($validatedData['pigeons']);
        $team = Team::create($validatedData);

        if (!$team) {
            return redirect()->route('teams.create')->with('error', __('Failed to create team'));
        }

        return redirect()->route('teams')->with('success', __('Team created successfully'));
    }

    public function team(Team $team)
    {
        return view('teams.view', compact('team'));
    }

    public function editTeam($id)
    {
        $team = Team::findOrFail($id);

        return view('teams.edit', compact('team'));
    }

    public function updateTeam(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $team = Team::findOrFail($id);
        $team->update($validatedData);

        return redirect()->route('teams')->with('success', __('Team updated successfully'));
    }

    public function deleteTeam($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->route('teams')->with('success', __('Team deleted successfully'));
    }
}