@extends('layout.admin')


@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold mb-6">MANAJEMEN AKUN</h1>
        <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md flex items-center">
            <i class="fas fa-file-pdf mr-2"></i> EXPORT PDF
        </button>
    </div>

    <!-- Tabel Akun -->
    <div class="bg-white rounded-lg shadow overflow-hidden mb-1">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NRP</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Angkatan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jurusan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kelamin</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. HP</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Line</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($akuns as $akun)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $akun->nama }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $akun->nrp }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $akun->angkatan }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $akun->jurusan }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $akun->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $akun->jeniskelamin }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $akun->no_hp }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $akun->id_line }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $akun->role }}</td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('admin.makun.edit', $akun->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                        <form action="{{ route('admin.makun.destroy', $akun->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 flex justify-between items-center mb-8">
        <div class="text-sm text-gray-700">
            Showing <span class="font-medium">1</span> to <span class="font-medium">3</span> of <span class="font-medium">10</span> entries
        </div>
        <div class="flex space-x-2">
            <button class="px-3 py-1 border rounded-md bg-gray-100 text-gray-700">Previous</button>
            <button class="px-3 py-1 border rounded-md bg-blue-500 text-white">1</button>
            <button class="px-3 py-1 border rounded-md bg-gray-100 text-gray-700">2</button>
            <button class="px-3 py-1 border rounded-md bg-gray-100 text-gray-700">Next</button>
        </div>
    </div>

    <!-- Form Tambah/Edit Akun -->
    <div class="bg-white rounded-lg shadow p-6">
        @if($modul == "update")
            <h2 class="text-xl font-semibold mb-4">Edit Akun</h2>
        @else
            <h2 class="text-xl font-semibold mb-4">Tambah Akun</h2>
        @endif
        <form action="{{ route('admin.makun.store') }}" method="POST">
            @csrf
            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        @if($modul == "update")
                            <input type="hidden" id="id" name="id" value="{{ $akun->id }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @endif

                        @if($modul == "update")
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" value="{{ $akun->nama }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('nama')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @else 
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('nama')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @endif
                    </div>

                    <div>
                        @if($modul == "update")
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="nrp">NRP</label>
                            <input type="text" id="nrp" name="nrp" value="{{ $akun->nrp }}" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('nrp')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @else 
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="nrp">NRP</label>
                            <input type="text" id="nrp" name="nrp" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('nrp')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @endif
                    </div>

                    <div>
                        @if($modul == "update")
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="angkatan">Angkatan</label>
                            <input type="text" id="angkatan" name="angkatan" value="{{ $akun->angkatan }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('angkatan')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @else
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="angkatan">Angkatan</label>
                            <input type="text" id="angkatan" name="angkatan" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('angkatan')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @endif
                    </div>

                    <div>
                        @if($modul == "update")
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="jurusan">Jurusan</label>
                            <input type="text" id="jurusan" name="jurusan" value="{{ $akun->jurusan }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('jurusan')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @else
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="jurusan">Jurusan</label>
                            <input type="text" id="jurusan" name="jurusan" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('jurusan')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @endif
                    </div>

                    <div>
                        @if($modul == "update")
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email</label>
                            <input type="text" id="email" name="email" value="{{ $akun->email }}" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @else 
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email</label>
                            <input type="text" id="email" name="email" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @endif
                    </div>

                    <div>
                        @if($modul == "update")
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="jeniskelamin">Jenis Kelamin</label>
                            <select name="jeniskelamin" id="jeniskelamin" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                                <option value="Laki-laki" {{ (old('jeniskelamin', $akun->jeniskelamin ?? '') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ (old('jeniskelamin', $akun->jeniskelamin ?? '') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jeniskelamin')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @else 
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="jeniskelamin">Jenis Kelamin</label>
                            <select name="jeniskelamin" id="jeniskelamin" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                                <option value="Laki-laki" {{ (old('jeniskelamin', $akun->jeniskelamin ?? '') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ (old('jeniskelamin', $akun->jeniskelamin ?? '') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jeniskelamin')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @endif
                    </div>

                    <div>
                        @if($modul == "update")
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="no_hp">No. HP</label>
                            <input type="text" id="no_hp" name="no_hp" value="{{ $akun->no_hp }}" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('no_hp')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @else
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="no_hp">No. HP</label>
                            <input type="text" id="no_hp" name="no_hp" required 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('no_hp')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @endif
                    </div>

                    <div>
                        @if($modul == "update")
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="id_line">ID Line</label>
                            <input type="text" id="id_line" name="id_line" value="{{ $akun->id_line }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('id_line')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @else
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="id_line">ID Line</label>
                            <input type="text" id="id_line" name="id_line" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('id_line')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @endif
                    </div>

                    <div>
                        @if($modul == "update")
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="role">Role</label>
                            <select name="role" id="role" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                                <option value="admin" {{ (old('role', $akun->role ?? '') == 'admin') ? 'selected' : '' }}>Admin</option>
                                <option value="peserta" {{ (old('role', $akun->role ?? '') == 'peserta') ? 'selected' : '' }}>Peserta</option>
                            </select>
                            @error('role')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @else
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="role">Role</label>
                            <select name="role" id="role" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                                <option value="admin" {{ (old('role', $akun->role ?? '') == 'admin') ? 'selected' : '' }}>Admin</option>
                                <option value="peserta" {{ (old('role', $akun->role ?? '') == 'peserta') ? 'selected' : '' }}>Peserta</option>
                            </select>
                            @error('role')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        @endif
                        </div>

                    <div class="flex items-end">
                        @if($modul == "update")
                            <input type="submit" name="btnupdate" value="Update"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            </input>
                        @else 
                            <input type="submit" name="btninsert" value="Save"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"> 
                            </input>
                        @endif
                    </div>
                </div>
            </form>
        </form>
    </div>
</div>
@endsection