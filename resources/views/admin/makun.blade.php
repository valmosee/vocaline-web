@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">MANAJEMEN AKUN</h1>
        <div class="flex space-x-4">
            <a href="{{ route('admin.makun.store') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md flex items-center">
                <i class="fas fa-plus mr-2"></i> ADD AKUN
            </a>
            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md flex items-center">
                <i class="fas fa-file-pdf mr-2"></i> EXPORT PDF
            </button>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden mb-1">
        <div class="overflow-x-auto">
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
                    @foreach($akuns as $akun_item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $akun_item->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $akun_item->nrp }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $akun_item->angkatan }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $akun_item->jurusan }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $akun_item->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $akun_item->jeniskelamin }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $akun_item->no_hp }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $akun_item->id_line }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $akun_item->role }}</td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('admin.makun.edit', $akun_item->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                            <form action="{{ route('admin.makun.destroy', $akun_item->id) }}" method="POST" class="inline">
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
    </div>

    <div class="mt-4 flex justify-between items-center mb-8">
        <div class="text-sm text-gray-700">
            Showing {{ $akuns->firstItem() }} to {{ $akuns->lastItem() }} of {{ $akuns->total() }} entries
        </div>
        <div>
            {{ $akuns->links('vendor.pagination.custom-tailwind') }}
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        @if($modul == "update")
            <h2 class="text-xl font-semibold mb-4">Edit Akun</h2>
            <form action="{{ route('admin.makun.update', $akun->id) }}" method="POST">
                @csrf
                @method('PUT')
        @else
            <h2 class="text-xl font-semibold mb-4">Tambah Akun</h2>
            <form action="{{ route('admin.makun.store') }}" method="POST">
                @csrf
        @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @if($modul == "update")
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="id">ID</label>
                    <input type="text" id="id_display" name="id_display" value="{{ $akun->id }}" disabled
                        class="w-full px-3 py-2 border border-gray-300 bg-gray-100 rounded-md shadow-sm cursor-not-allowed">
                </div>
                @endif

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $modul == 'update' ? $akun->nama : '') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    @error('nama')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="nrp">NRP</label>
                    <input type="text" id="nrp" name="nrp" value="{{ old('nrp', $modul == 'update' ? $akun->nrp : '') }}"  
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    @error('nrp')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="angkatan">Angkatan</label>
                    <input type="text" id="angkatan" name="angkatan" value="{{ old('angkatan', $modul == 'update' ? $akun->angkatan : '') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    @error('angkatan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="jurusan">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan', $modul == 'update' ? $akun->jurusan : '') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    @error('jurusan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email</label>
                    <input type="text" id="email" name="email" value="{{ old('email', $modul == 'update' ? $akun->email : '') }}" required 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="jeniskelamin">Jenis Kelamin</label>
                    <select name="jeniskelamin" id="jeniskelamin" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                        <option value="Laki-laki" {{ (old('jeniskelamin', $modul == 'update' ? $akun->jeniskelamin : '') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ (old('jeniskelamin', $modul == 'update' ? $akun->jeniskelamin : '') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jeniskelamin')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="no_hp">No. HP</label>
                    <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $modul == 'update' ? $akun->no_hp : '') }}" required 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    @error('no_hp')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="id_line">ID Line</label>
                    <input type="text" id="id_line" name="id_line" value="{{ old('id_line', $modul == 'update' ? $akun->id_line : '') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    @error('id_line')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="role">Role</label>
                    <select name="role" id="role" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                        <option value="admin" {{ (old('role', $modul == 'update' ? $akun->role : '') == 'admin') ? 'selected' : '' }}>Admin</option>
                        <option value="peserta" {{ (old('role', $modul == 'update' ? $akun->role : '') == 'peserta') ? 'selected' : '' }}>Peserta</option>
                    </select>
                    @error('role')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-end">
                    @if($modul == "update")
                        <input type="submit" name="btnupdate" value="Update"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    @else 
                        <input type="submit" name="btninsert" value="Save"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"> 
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection