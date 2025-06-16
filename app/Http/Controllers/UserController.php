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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'     => 'required|string|max:255',
            'nrp'      => 'string|max:20|unique:users,nrp',
            'angkatan' => 'required|string|max:4',
            'jurusan'  => 'required|string|max:50',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'jeniskelamin' => 'required|string|max:10',
            'no_hp'    => 'required|string|max:15',
            'id_line'  => 'nullable|string|max:50',
            'role'     => 'required|in:admin,peserta',
        ]);

        $validated['password'] = Hash::make('12345678');
        User::create($validated);

        return redirect()->route('admin.makun')->with('success', 'Akun berhasil ditambahkan!');
    }

    public function update(Request $request, User $akun)
    {
        $validated = $request->validate([
            'nama'     => 'required|string|max:255',
            'nrp'      => 'string|max:20',
            'angkatan' => 'required|string|max:4',
            'jurusan'  => 'required|string|max:50',
            'email'    => 'required|string|email|max:255|unique:users,email,'.$akun->id,
            'jeniskelamin' => 'required|string|max:10',
            'no_hp'    => 'required|string|max:15',
            'id_line'  => 'nullable|string|max:50',
            'role'     => 'required|in:admin,peserta',
        ]);

        $akun->update($validated);
        return redirect()->route('admin.makun')->with('success', 'Akun berhasil diperbarui!');
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

    // menampilkan daftar anggota di dashboard admin
    public function pesertaIndex(Request $request){
        $search = $request->input('search');
        
        $pesertas = User::where('role', 'peserta')
            ->when($search, function($query) use ($search) {
                return $query->where(function($q) use ($search) {
                    $q->where('nama', 'like', '%'.$search.'%')
                    ->orWhere('nrp', 'like', '%'.$search.'%')
                    ->orWhere('angkatan', 'like', '%'.$search.'%');
                });
            })
            ->latest()
            ->paginate(5); // Sesuaikan jumlah item per halaman
            
        return view('admin.adashboard', [
            'pesertas' => $pesertas,
            'search' => $search
        ]);
    }
}