<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::logout();                          // Logout user
        $request->session()->invalidate();      // Hapus session lama
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/edash');               // Redirect ke halaman login
    }
}
