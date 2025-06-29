<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\JoinEvent;
use App\Models\User;
use Illuminate\Http\Request;

class AdashboardController extends Controller
{
    public function showForm()
    {
        $pesertas = User::where('role', 'peserta')
                        ->latest()
                        ->take(5)
                        ->get(['nama', 'nrp', 'angkatan']);

        $anggotaCount = User::where('role', 'peserta')->count();
        $eventCount = Event::count(); 

        $latestEvents = Event::latest()->take(4)->get(); 

        return view('admin.adashboard', compact('pesertas', 'anggotaCount', 'eventCount', 'latestEvents'));
    }

    public function manajemenAkun()
    {
        return view('admin.makun');
    }

    public function event()
    {
        return view('admin.event');
    }

    public function profile(Request $request)
    {
        $user = $request->user(); // Ini sekarang valid
        return view('admin.aprofile', compact('user'));
    }

    // Tambahkan method untuk dashboard agar user dimuat
    public function dashboard(Request $request)
    {
        $pesertas = User::where('role', 'peserta')
                        ->latest()
                        ->take(5)
                        ->get(['nama', 'nrp', 'angkatan']);

        $anggotaCount = User::where('role', 'peserta')->count();
        $eventCount = 12; // Ganti dengan logika hitung event jika ada
        $user = $request->user(); // Tambahkan user untuk menampilkan foto dan nama

        return view('admin.adashboard', compact('pesertas', 'anggotaCount', 'eventCount', 'user'));
    }

    public function manajemenKuesioner(){
        return view('admin.kuesioner');
    }

    public function approvalList($id_event)
{
    // Ambil semua peserta untuk event ini
    $peserta = JoinEvent::with('user', 'jawaban.kuesioner')
                ->where('id_event', $id_event)
                ->get()
                ->map(function ($item) {
                    $item->sudahIsi = $item->jawaban->isNotEmpty(); 
                    return $item;
                });

    return view('admin.approval-list', compact('peserta', 'id_event'));
}

 public function approve($id_join)
{
    $join = JoinEvent::findOrFail($id_join);
    $join->status = 'approved';
    $join->save();

    return back()->with('success', 'Peserta berhasil di-approve.');
}

public function reject($id_join)
{
    $join = JoinEvent::findOrFail($id_join);
    $join->status = 'rejected';
    $join->save();

    return back()->with('success', 'Peserta berhasil ditolak.');
}
}