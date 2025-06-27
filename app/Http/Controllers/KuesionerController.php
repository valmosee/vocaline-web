<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kuesioner;
use App\Models\Event;

class KuesionerController extends Controller
{
    public function index($id_event)
    {
        $event = Event::findOrFail($id_event);
        $kuesioner = Kuesioner::where('id_event', $id_event)->paginate(10);

        return view('admin.kuesioner', compact('event', 'kuesioner', 'id_event'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'choice_a' => 'required',
            'choice_b' => 'required',
            'choice_c' => 'required',
            'choice_d' => 'required',
            'id_event' => 'required',
        ]);

        Kuesioner::create([
            'pertanyaan' => $validated['pertanyaan'],
            'choice_a' => $validated['choice_a'],
            'choice_b' => $validated['choice_b'],
            'choice_c' => $validated['choice_c'],
            'choice_d' => $validated['choice_d'],
            'id_event' => $validated['id_event'],

        ]);

        return redirect()->route('admin.kuesioner', $validated['id_event'])
            ->with('success', 'Kuesioner berhasil ditambahkan!');
    }
    public function destroy($id)
    {
        $kuesioner = Kuesioner::findOrFail($id);
        $id_event = $kuesioner->id_event;
        $kuesioner->delete();

        return redirect()->route('admin.kuesioner', $id_event)
            ->with('success', 'Kuesioner berhasil dihapus.');
    }
}
