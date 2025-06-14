<?php
// CONTROLLER UNTUK MENGELOLA AKUN PENGGUNA DI ADMIN
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    public function index(Request $request){
        $akuns = User::latest()->paginate(5);
        $param['modul'] = "insert";
        $param['akuns'] = $akuns; 
        return view('admin.makun', $param);
    }

    public function store(Request $request){
        if ($request->btninsert) {
            $validated = $request->validate([
                'nama'     => 'required|string|max:255',
                'nrp'      => 'required|string|max:20|unique:users,nrp',
                'angkatan' => 'required|string|max:4',
                'jurusan'  => 'required|string|max:50',
                'email'    => 'required|string|email|max:255',
                'jeniskelamin' => 'required|string|max:10',
                'no_hp'    => 'required|string|max:15',
                'id_line'  => 'nullable|string|max:50',
                'role'     => 'required',
            ]);

            $validated['password'] = Hash::make('12345678');
            User::create($validated);

            return redirect()->route('admin.makun')
                ->with('success', 'Akun berhasil ditambahkan!');
        } else {
            $validated = $request->validate([
                'id'     => 'required',
                'nama'     => 'required|string|max:255',
                'nrp'      => 'required|string|max:20',
                'angkatan' => 'required|string|max:4',
                'jurusan'  => 'required|string|max:50',
                'email'    => 'required|string|email|max:255|unique:users,email,'.$request->id,
                'jeniskelamin' => 'required|string|max:10',
                'no_hp'    => 'required|string|max:15',
                'id_line'  => 'nullable|string|max:50',
                'role'     => 'required|in:admin,peserta',
            ]);

            $baru = User::findOrFail($request->id);
            $baru->update($validated); // tidak ubah password
            return redirect()->route('admin.makun')->with('success', 'Akun berhasil Diupdate!');
        }
    }

    public function edit(User $akun){
        $akuns = User::latest()->paginate(10);
        $param['modul'] = "update";
        $param['akuns'] = $akuns; 
        $param['akun'] = $akun; 
        return view('admin.makun', $param);
    }
    
    public function destroy(User $akun){
        $akun->delete();

        return redirect()->route('admin.makun')
                        ->with('success', 'Akun berhasil dihapus!');
    }
}
