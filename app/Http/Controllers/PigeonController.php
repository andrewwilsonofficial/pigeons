<?php

namespace App\Http\Controllers;

use App\Models\Pigeon;
use Illuminate\Http\Request;

class PigeonController extends Controller
{
    public function index()
    {
        $pigeons = Pigeon::all();

        return view('pigeons.index', compact('pigeons'));
    }

    public function view(Pigeon $pigeon)
    {
        return view('pigeons.view', compact('pigeon'));
    }

    public function create()
    {
        return view('pigeons.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'band' => 'required|string|max:255',
            'second_band' => 'nullable|string|max:255',
            'color_description' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'family' => 'nullable|string|max:255',
            'last_owner' => 'nullable|string|max:255',
            'rating' => 'nullable|integer|min:0|max:100',
            'color' => "#" . 'nullable|string|max:255',
            'eye' => 'nullable|string|max:255',
            'leg' => 'nullable|string|max:255',
            'markings' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'sex' => 'required|string|in:unknown,cock,hen',
            'notes' => 'nullable|string',
            'date_hatched' => 'nullable|date',
        ]);

        try {
            Pigeon::create($validatedData);
            return redirect()->route('pigeons.index')->with('success', 'Pigeon created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create pigeon: ' . $e->getMessage());
        }
    }

    public function update(Request $request, Pigeon $pigeon)
    {
        $pigeon->update($request->except(['_token', '_method']));

        return redirect()->back()->with('success', 'Pigeon updated successfully');
    }

    public function statistics()
    {
        $pigeons = Pigeon::all();

        $totalPigeons = $pigeons->count();

        $genderStats = $pigeons->groupBy('sex')->map(function ($group, $key) use ($totalPigeons) {
            return [
                'name' => $key,
                'percentage' => round(($group->count() / $totalPigeons) * 100, 1),
                'color' => "#" . substr(md5($key), 0, 6)
            ];
        });

        $familyStats = $pigeons->groupBy('family')->map(function ($group, $key) use ($totalPigeons) {
            return [
                'name' => $key,
                'percentage' => round(($group->count() / $totalPigeons) * 100, 1),
                'color' => "#" . substr(md5($key), 0, 6)
            ];
        });

        $statusStats = $pigeons->groupBy('status')->map(function ($group, $key) use ($totalPigeons) {
            return [
                'name' => $key,
                'percentage' => round(($group->count() / $totalPigeons) * 100, 1),
                'color' => "#" . substr(md5($key), 0, 6)
            ];
        });

        $colorStats = $pigeons->groupBy('color')->map(function ($group, $key) use ($totalPigeons) {
            return [
                'name' => $key,
                'percentage' => round(($group->count() / $totalPigeons) * 100, 1),
                'color' => "#" . substr(md5($key), 0, 6)
            ];
        });

        $eyeStats = $pigeons->groupBy('eye')->map(function ($group, $key) use ($totalPigeons) {
            return [
                'name' => $key,
                'percentage' => round(($group->count() / $totalPigeons) * 100, 1),
                'color' => "#" . substr(md5($key), 0, 6)
            ];
        });

        return view('pigeons.statistics', compact('genderStats', 'familyStats', 'statusStats', 'colorStats', 'eyeStats'));
    }

    public function publicPigeons()
    {
        $pigeons = Pigeon::where('is_public', true)->get();

        return view('pigeons.public', compact('pigeons'));
    }
}
