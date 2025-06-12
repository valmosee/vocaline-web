<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EdashboardController extends Controller
{
    public function showForm(){
        return view('eventholder.edash');
    }

    public function show(){
        return view('eventholder.homepage');
    }

    public function profile(){
        return view('eventholder.eprofile');
    }
}
