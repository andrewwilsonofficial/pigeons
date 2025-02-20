<?php

namespace App\Http\Controllers;

use App\Models\Pair;
use App\Models\Pigeon;
use App\Models\Season;
use Illuminate\Http\Request;

class PairController extends Controller
{
    public function pairs()
    {
        $pairs = Pair::where('user_id', auth()->id())->get();

        return view('pairs.index', compact('pairs'));
    }

    public function createPair()
    {
        $seasons = Season::where('user_id', auth()->id())->get();
        $cocks = Pigeon::where('sex', 'cock')->get();
        $hens = Pigeon::where('sex', 'hen')->get();

        return view('pairs.create', compact('seasons', 'cocks', 'hens'));
    }

    public function storePair(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date_paired' => 'required',
            'cock_id' => 'required',
            'hen_id' => 'required',
            'season_id' => 'nullable'
        ]);

        $validatedData['user_id'] = auth()->id();

        $pair = Pair::create($validatedData);

        if (!$pair) {
            return redirect()->route('pairs.create')->with('error', __('Failed to create pair'));
        }

        return redirect()->route('pairs')->with('success', __('Pair created successfully'));
    }

    public function pair(Pair $pair)
    {
        return view('pairs.view', compact('pair'));
    }

    public function editPair(Pair $pair)
    {
        if ($pair->user_id !== auth()->id()) {
            return redirect()->route('pairs')->with('error', __('Unauthorized access'));
        }

        $seasons = Season::where('user_id', auth()->id())->get();
        $cocks = Pigeon::where('sex', 'cock')->get();
        $hens = Pigeon::where('sex', 'hen')->get();

        return view('pairs.edit', compact('pair', 'seasons', 'cocks', 'hens'));
    }

    public function updatePair(Pair $pair, Request $request)
    {
        if ($pair->user_id !== auth()->id()) {
            return redirect()->route('pairs')->with('error', __('Unauthorized access'));
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date_paired' => 'required',
            'cock_id' => 'required',
            'hen_id' => 'required',
            'season_id' => 'nullable'
        ]);

        $pair->update($validatedData);

        return redirect()->route('pairs')->with('success', __('Pair updated successfully'));
    }

    public function destroyPair(Pair $pair)
    {
        if ($pair->user_id !== auth()->id()) {
            return redirect()->route('pairs')->with('error', __('Unauthorized access'));
        }

        $pair->delete();

        return redirect()->route('pairs')->with('success', __('Pair deleted successfully'));
    }
}
