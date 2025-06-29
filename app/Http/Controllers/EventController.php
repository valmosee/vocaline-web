<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(10); // Ambil semua data event
        return view('admin.event', compact('events'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
            'contact_person' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'total_penyanyi' => 'required',
            'keterangan' => 'string',
            'status' => 'required|in:onproses,selesai,dibatalkan'
        ]);

        // // Format tanggal sebelum disimpan
        // $validated['date'] = Carbon::createFromFormat('Y-m-d', $request->date)
        //     ->format('Y-m-d');

        // Simpan gambar dan ambil path-nya
        $imagePath = $request->file('image')->store('images', 'public');
        $validated['image'] = $imagePath;

        Event::create($validated);
        return redirect()->route('admin.event')
            ->with('success', 'Event berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit
     */
    public function edit($idevent)
    {
        $event = Event::find($idevent);
        return view('admin.event-edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'address' => 'required|string|max:255',
            'city' => 'required',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
            'contact_person' => 'required',
            'total_penyanyi' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:onproses,selesai,dibatalkan',
        ]);

        $event->fill($validated);

         if ($request->hasFile('image')) {
            $path = $request->file('image')->store('events', 'public');
            $event->image = $path;
        }
        
        $event->save();

        return redirect()->route('admin.event')
            ->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('admin.event')
            ->with('success', 'Event berhasil dihapus!');
    }
}