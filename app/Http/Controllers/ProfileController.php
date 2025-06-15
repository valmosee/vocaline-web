<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    /**
     * Tampilkan form profil sesuai role.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        switch ($user->role) {
            case 'admin':
                return view('admin.aprofile', ['user' => $user]);
            case 'peserta':
                return view('peserta.profile', ['user' => $user]);
            case 'eventholder':
                return view('event.eprofile', ['user' => $user]);
            default:
                abort(403, 'Role tidak dikenali.');
        }
    }

    /**
     * Update profil pengguna.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Ambil data yang divalidasi
        $data = $request->validated();

        // Periksa dan update email_verified_at jika email berubah
        if (isset($data['email']) && $user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Update foto profil hanya jika ada file baru
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            try {
                $path = $file->store('profile_photos', 'public');
                $user->foto = '/storage/' . $path;
                Log::info('Foto baru disimpan: ' . $user->foto);
            } catch (\Exception $e) {
                Log::error('Gagal menyimpan foto: ' . $e->getMessage());
                return Redirect::back()->with('error', 'Gagal menyimpan foto. Periksa izin direktori.');
            }
        } else {
            // Pertahankan foto lama jika tidak ada file baru
            $user->foto = $user->foto ?? null;
            Log::info('Foto lama dipertahankan: ' . $user->foto);
        }

        // Isi dan simpan semua data yang divalidasi
        $user->fill($data);
        $user->save();
        Log::info('Profil disimpan: ' . json_encode($user->toArray()));

        // Redirect sesuai role dengan pesan sukses
        switch ($user->role) {
            case 'admin':
                return Redirect::route('admin.aprofile')->with('status', 'profile-updated');
            case 'peserta':
                return Redirect::route('peserta.profile')->with('status', 'profile-updated');
            case 'eventholder':
                return Redirect::route('eventholder.eprofile')->with('status', 'profile-updated');
            default:
                return Redirect::route('profile.edit')->with('status', 'profile-updated');
        }
    }

    /**
     * Hapus akun pengguna.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}