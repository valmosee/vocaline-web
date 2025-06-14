<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdashboardController extends Controller
{
    public function index(){
        $pesertas = User::where('role', 'peserta')
                ->latest()
                ->take(5) 
                ->get(['nama', 'nrp', 'angkatan']);
        $pesertaCount = User::where('role', 'peserta')->count();

        return view('admin.adashboard', compact('pesertas', 'pesertaCount'));
    }

    public function showForm(){
        return view('admin.adashboard');
    }

    public function manajemenAkun(){
        return view('admin.makun');
    }
    public function event(){
        return view('admin.event');
    }
}
