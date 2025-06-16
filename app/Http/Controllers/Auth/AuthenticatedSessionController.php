<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Menangani request login.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        // Cek role dan arahkan sesuai dashboard-nya
        if ($user->role === 'admin') {
            return redirect()->intended(route('admin.adashboard'));
        } elseif ($user->role === 'eventholder') {
            return redirect()->intended(route('eventholder.dashboard'));
        } elseif ($user->role === 'peserta') {
            return redirect()->intended(route('peserta.dashboard'));
        }

        // Jika role tidak dikenali
        Auth::logout();
        return redirect('/login')->withErrors(['email' => 'Akun tidak memiliki role yang valid.']);
    }

    /**
     * Logout dan hapus session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
