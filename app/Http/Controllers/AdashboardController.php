<?php

namespace App\Http\Controllers;

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
        $eventCount = 12; // Ganti dengan logika hitung event jika ada

        return view('admin.adashboard', compact('pesertas', 'anggotaCount', 'eventCount'));
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
}