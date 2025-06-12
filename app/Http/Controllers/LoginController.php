<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'domain' => 'required',
            'password' => 'required'
        ]);

        $email = $request->username . $request->domain;

        // Cek hardcoded
        $users = [
            'admin123@staff.vg.ac.id' => 'admin123',
            'peserta123@member.vg.ac.id' => 'peserta123',
            'event123@event.vg.ac.id' => 'event123',
        ];

        if (isset($users[$email]) && $users[$email] === $request->password) {
            $request->session()->put('email', $email);

            if (str_ends_with($email, '@staff.vg.ac.id')) {
                return redirect()->intended('/adash');
            } elseif (str_ends_with($email, '@member.vg.ac.id')) {
                return redirect()->intended('/dashboard');
            } elseif (str_ends_with($email, '@event.vg.ac.id')) {
                return redirect()->intended('/homepage');
            } else {
                return back()->withErrors(['email' => 'Domain tidak dikenali.']);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.'
        ]);
    }
}
