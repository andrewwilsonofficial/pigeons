<?php

namespace App\Http\Controllers;

use App\Models\Pair;
use App\Models\Pigeon;
use App\Models\PigeonAttachment;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\View;

class PigeonController extends Controller
{
    public function index()
    {
        $pigeons = Pigeon::where('user_id', auth()->id())->get();

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
            'color' => 'nullable|string|max:255',
            'eye' => 'nullable|string|max:255',
            'leg' => 'nullable|string|max:255',
            'markings' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'sex' => 'required|string|in:unknown,cock,hen',
            'notes' => 'nullable|string',
            'date_hatched' => 'nullable|date',
        ]);

        $validatedData['user_id'] = auth()->id();

        if ($request->has('pair_id')) {
            $pair = Pair::find($request->input('pair_id'));
            if ($pair) {
                $validatedData['sire_id'] = $pair->cock_id;
                $validatedData['dam_id'] = $pair->hen_id;
            }
        }

        try {
            Pigeon::create($validatedData);
            return redirect()->back()->with('success', __('Pigeon created successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create pigeon: ' . $e->getMessage());
        }
    }

    public function edit(Pigeon $pigeon)
    {
        $sires = Pigeon::where('user_id', auth()->id())->where('sex', 'cock')->get();
        $dams = Pigeon::where('user_id', auth()->id())->where('sex', 'hen')->get();

        return view('pigeons.edit', compact('pigeon', 'sires', 'dams'));
    }

    public function update(Request $request, Pigeon $pigeon)
    {
        $pigeon->update($request->except(['_token', '_method']));

        return redirect()->back()->with('success', 'Pigeon updated successfully');
    }

    public function attachments(Pigeon $pigeon)
    {
        $attachments = PigeonAttachment::where('pigeon_id', $pigeon->id)->get();

        return view('pigeons.attachments', compact('attachments', 'pigeon'));
    }

    public function updateAttachments(Request $request, Pigeon $pigeon)
    {
        $validatedData = $request->validate([
            'files' => 'required|file|mimes:jpg,jpeg,png,mp4,mov|max:73400320',
        ]);

        try {
            $file = $validatedData['files'];
            $file_uplaod = $file->store('attachments', 'main');

            $attachment = PigeonAttachment::create([
                'pigeon_id' => $pigeon->id,
                'filename' => str_replace('attachments/', '', $file_uplaod),
            ]);

            return json_encode(['success' => true, 'element' => view('components.pigeons.attachment', ['attachment' => $attachment])->render()]);
        } catch (\Exception $e) {
            return json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function deleteAttachment(PigeonAttachment $attachment)
    {
        $attachment->delete();

        return redirect()->back()->with('success', __('Attachment deleted successfully'));
    }

    public function attachmentCover(PigeonAttachment $attachment)
    {
        $extension = pathinfo($attachment->filename, PATHINFO_EXTENSION);
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') {
            return response()->file(public_path('attachments/' . $attachment->filename));
        } else {
            return response()->file(public_path('assets/images/video-thumbnail.webp'));
        }
    }

    public function statistics()
    {
        $pigeons = Pigeon::where('user_id', auth()->id())->get();

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
        $pigeons = Pigeon::where('is_public', true)->where('user_id', auth()->id())->get();

        return view('pigeons.public', compact('pigeons'));
    }

    public function destroy(Pigeon $pigeon)
    {
        $pigeon->delete();

        return redirect()->route('pigeons.index')->with('success', __('Pigeon deleted successfully'));
    }

    public function pedigree(Pigeon $pigeon)
    {
        return view('pigeons.pedigree', compact('pigeon'));
    }

    public function downloadPedigree(Pigeon $pigeon)
    {
        $pdf_file_name = 'pigeon_pedigree_' . $pigeon->id . '.pdf';
        $html = View::make('components.pdf.pigeon-pedigree', ['pigeon' => $pigeon])->render();
        $outputPath = storage_path('app/' . $pdf_file_name . '.pdf');

        $generatePdfScript = base_path('nodejs/generate-pdf.js');
        $process = new Process(['sudo', 'node', $generatePdfScript, $html, $outputPath]);
        $process->run();

        if (!$process->isSuccessful()) {
            $errorOutput = $process->getErrorOutput();
            throw new \RuntimeException($errorOutput ?: 'An unknown error occurred while generating the PDF.');
        }

        return response()->download($outputPath, $pdf_file_name . '.pdf')->deleteFileAfterSend(true);
    }

    public function sendPigeonLink(Request $request, Pigeon $pigeon)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);

        $pigeon->sendLink($validatedData['email']);

        return redirect()->back()->with('success', __('Link sent successfully'));
    }

    public function publicPigeon(Pigeon $pigeon)
    {
        if ($pigeon->is_public) {
            return view('pigeons.public-view', compact('pigeon'));
        } else {
            abort(404);
        }
    }
}
