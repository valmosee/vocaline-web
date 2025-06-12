<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdashboardController extends Controller
{
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
