<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Jawaban;
use App\Models\JoinEvent;
use App\Models\Kuesioner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showForm(){
        $event = Event::latest()->first();

        return view('peserta.dashboard', [
            'id_event' => $event?->id 
        ]) ;
    }

    public function show($id){
     $event = Event::findOrFail($id);
     return view('peserta.detailevent', compact('event'));
    }


    public function event()
    {
        $events = Event::all();
        return view('peserta.event', compact('events'));
    }

    // public function kuesioner($id_event){
    //  $event = Event::findOrFail($id_event);
    //  $kuesioners = Kuesioner::where('id_event', $id_event)->get();

    //  return view('peserta.kuesioner', compact('event', 'kuesioners', 'id_event'));
       
    // }

    public function kuesioner($id_event)
    {

    $join = JoinEvent::where('id_user', auth()->user()->id)
                     ->where('id_event', $id_event)
                     ->first();

    if (!$join) {
        return redirect()->back()->with('error', 'Kamu belum mendaftar event ini.');
    }

    $id_join = $join->id;

    $kuesioners = Kuesioner::where('id_event', $id_event)->get();

    return view('peserta.kuesioner', [
        'id_event' => $id_event,
        'id_join' => $id_join,           
        'kuesioners' => $kuesioners     
    ]);
         
  }

    public function profile(Request $request){
     $user = $request->user(); // ambil user yang login
     return view('peserta.profile', compact('user')); // kirim ke view
    }

    public function storeJawaban(Request $request, $id_event)
    {
    
    $request->validate([
        'jawaban.*' => 'required|string',
    ]);
    $idUser = Auth::id();

    // Cari join_event berdasarkan user yang login dan id_event
    $join = JoinEvent::where('id_user', $idUser)
                 ->where('id_event', $id_event)
                 ->first();

    // Kalau tidak ditemukan, redirect dengan pesan error
    if (!$join) {
        return redirect()->back()->with('error', 'Kamu belum mendaftar event ini.');
    }

    $id_join = $join->id;
    $tanggal = \Carbon\Carbon::now();

    foreach ($request->jawaban as $id_kuesioner => $jawaban) {
        Jawaban::create([
            'id_join' => $id_join,
            'id_kuesioner' => $id_kuesioner,
            'jawaban' => $jawaban,
            'tanggal' => $tanggal,
        ]);
    }

    return redirect()->route('peserta.dashboard')->with('success', 'Jawaban berhasil disimpan!');
   }

   public function ajukanDiri($id_event)
  {
     $user_id = auth()->id();

    // Cek apakah user sudah pernah join
     $existing = JoinEvent::where('id_user', $user_id)
                         ->where('id_event', $id_event)
                         ->first();

     if (!$existing) {
        JoinEvent::create([
            'id_user' => $user_id,
            'id_event' => $id_event,
            'tanggal' => now(),
            'status' => 'pending' // atau sesuai field di tabel
        ]);
     }

    return redirect()->route('peserta.kuesioner', ['id_event' => $id_event]);
    
}

public function history(){
    $userId = Auth::id(); // Ganti ini jika tidak pakai Auth
    $joinedEvents = JoinEvent::with('event')
                    ->where('id_user', $userId)
                    ->orderByDesc('tanggal')
                    ->get();

    return view('peserta.history', compact('joinedEvents'));

}

}
