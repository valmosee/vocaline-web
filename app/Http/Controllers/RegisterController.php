<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('register'); // Pastikan ini sesuai dengan nama view
    }

    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'nrp' => 'required|unique:users,nrp',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'nrp' => $validated['nrp'],
            'name' => $validated['name'],
            'password' => Hash::make($validated['password']),
            'role' => 'eventholder', // default role
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil!');
    }
}
