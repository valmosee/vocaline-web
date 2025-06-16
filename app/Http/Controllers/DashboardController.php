<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showForm(){
        return view('peserta.dashboard');
    }

    public function event()
    {
        return view('peserta.event');
    }

    public function kuisioner()
    {
        return view('peserta.kuisioner');
    }

    public function profile(Request $request)
{
    $user = $request->user(); // ambil user yang login
    return view('peserta.profile', compact('user')); // kirim ke view
}
}
