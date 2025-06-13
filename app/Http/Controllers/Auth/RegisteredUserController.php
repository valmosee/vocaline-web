<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'nrp'      => 'required|string|max:20|unique:users,nrp',
            'angkatan' => 'required|string|max:4',
            'jurusan'  => 'required|string|max:50',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'jeniskelamin' => 'required|string|max:10',
            'no_hp'    => 'required|string|max:15',
            'id_line'  => 'nullable|string|max:50',
            'role'     => 'required',
            // 'foto'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional photo validation
        ]);

        $item = explode(' ', $request->nama);
        if ($item[1] == "staff.vg.ac.id") {
            $role = "admin";
        } else if ($item[1] == "member.vg.ac.id"){
            $role = "peserta";
        }
        else {
            $role = "eventholder";
        }

        $user = User::create([
            'nama' => $request->nama,
            'nrp' => $request->nrp,
            'angkatan' => $request->angkatan,
            'jurusan' => $request->jurusan,
            'email' => $item->email,
            'password' => Hash::make($request->password),
            'jeniskelamin' => $request->jeniskelamin,
            'no_hp' => $request->no_hp,
            'id_line' => $request->id_line,
            'role' => $request->role,
            // 'foto' => 'default.png'
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('views.dashboard', absolute: false));
    }
}
