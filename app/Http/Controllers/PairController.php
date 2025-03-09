<?php

namespace App\Http\Controllers;

use App\Models\Pair;
use App\Models\Pigeon;
use App\Models\Season;
use Illuminate\Support\Facades\View;
use Symfony\Component\Process\Process;
use Illuminate\Http\Request;

class PairController extends Controller
{
    public function pairs()
    {
        $pairs = Pair::where('user_id', auth()->id())->get();
        $seasons = Season::where('user_id', auth()->id())->get();

        return view('pairs.index', compact('pairs', 'seasons'));
    }

    public function createPair()
    {
        $seasons = Season::where('user_id', auth()->id())->get();
        $cocks = Pigeon::where('sex', 'cock')->where('user_id', auth()->id())->get();
        $hens = Pigeon::where('sex', 'hen')->where('user_id', auth()->id())->get();

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

    public function pairPdf(Pair $pair)
    {
        // return view('components.pdf.pair', compact('pair'));
        $pdf_file_name = 'pair_' . $pair->id . '.pdf';
        $html = View::make('components.pdf.pair', ['pair' => $pair])->render();
        $outputPath = storage_path('app/' . $pdf_file_name . '.pdf');

        $generatePdfScript = base_path('nodejs/generate-pdf.js');
        $process = new Process(['node', $generatePdfScript, $html, $outputPath]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new \RuntimeException($process->getErrorOutput());
        }

        return response()->download($outputPath, $pdf_file_name . '.pdf')->deleteFileAfterSend(true);
        // return response()->file($outputPath)->deleteFileAfterSend(true);
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

    public function getChildrens(Request $request)
    {
        $pair = Pair::find($request->id);
        if (!$pair) {
            abort(404);
        }

        $pigeons = $pair->children;

        return view('components.tables.pigeons', compact('pigeons'));
    }

    public function addToSeason(Request $request)
    {
        $pair = Pair::find($request->pair_id);
        if (!$pair || $pair->user_id !== auth()->id()) {
            return redirect()->route('pairs')->with('error', __('Unauthorized access or pair not found'));
        }

        $pair->season_id = $request->season_id;
        $pair->save();

        return redirect()->route('pairs')->with('success', __('Pair added to season successfully'));
    }
}
