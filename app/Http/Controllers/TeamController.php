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

        // Ensure all pigeons belong to the authenticated user
        foreach ($validatedData['pigeons'] as $pigeonId) {
            $pigeon = Pigeon::where('id', $pigeonId)->where('user_id', auth()->id())->first();
            if (!$pigeon) {
                return redirect()->route('teams.create')->with('error', __('Invalid pigeon selection'));
            }
        }

        $validatedData['pigeons'] = json_encode($validatedData['pigeons']);
        $validatedData['user_id'] = auth()->id();
        $team = Team::create($validatedData);

        if (!$team) {
            return redirect()->route('teams.create')->with('error', __('Failed to create team'));
        }

        return redirect()->route('teams')->with('success', __('Team created successfully'));
    }

    public function team(Team $team)
    {
        if ($team->user_id !== auth()->id()) {
            abort(403);
        }

        return view('teams.view', compact('team'));
    }

    public function editTeam(Team $team)
    {
        if ($team->user_id !== auth()->id()) {
            abort(403);
        }

        $pigeons = Pigeon::where('user_id', auth()->id())->get();

        return view('teams.edit', compact('team', 'pigeons'));
    }

    public function updateTeam(Team $team, Request $request)
    {
        if ($team->user_id !== auth()->id()) {
            abort(403);
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $team->update($validatedData);

        return redirect()->route('teams')->with('success', __('Team updated successfully'));
    }

    public function destroyTeam(Team $team)
    {
        if ($team->user_id !== auth()->id()) {
            abort(403);
        }

        $team->delete();

        return redirect()->route('teams')->with('success', __('Team deleted successfully'));
    }
}