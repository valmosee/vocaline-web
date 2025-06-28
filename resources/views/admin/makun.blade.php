@extends('layout.admin') 

@section('content')
<div class="p-6 space-y-6">

    <!-- Header -->
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800">👥 Manajemen Akun</h1>
        <div class="flex gap-3">
            <button class="inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow transition">
                <i class="fas fa-file-pdf"></i> Export PDF
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white shadow-lg rounded-xl overflow-x-auto border">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                <tr>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">NRP</th>
                    <th class="px-6 py-3">Angkatan</th>
                    <th class="px-6 py-3">Jurusan</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Jenis Kelamin</th>
                    <th class="px-6 py-3">No. HP</th>
                    <th class="px-6 py-3">ID Line</th>
                    <th class="px-6 py-3">Role</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach($akuns as $akun_item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $akun_item->nama }}</td>
                    <td class="px-6 py-4">{{ $akun_item->nrp }}</td>
                    <td class="px-6 py-4">{{ $akun_item->angkatan }}</td>
                    <td class="px-6 py-4">{{ $akun_item->jurusan }}</td>
                    <td class="px-6 py-4">{{ $akun_item->email }}</td>
                    <td class="px-6 py-4">{{ $akun_item->jeniskelamin }}</td>
                    <td class="px-6 py-4">{{ $akun_item->no_hp }}</td>
                    <td class="px-6 py-4">{{ $akun_item->id_line }}</td>
                    <td class="px-6 py-4">{{ $akun_item->role }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.makun.edit', $akun_item->id) }}"
                           class="text-blue-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.makun.destroy', $akun_item->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit"
                                class="text-red-600 hover:underline"
                                onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center text-sm text-gray-600">
        <div>
            Menampilkan {{ $akuns->firstItem() }} – {{ $akuns->lastItem() }} dari {{ $akuns->total() }} akun
        </div>
        <div>
            {{ $akuns->links('vendor.pagination.custom-tailwind') }}
        </div>
    </div>

    <!-- Form Tambah/Edit -->
    <div class="bg-white p-6 shadow-md rounded-lg">
        <h2 class="text-xl font-semibold mb-4">{{ $modul == 'update' ? '✏️ Edit Akun' : '➕ Tambah Akun' }}</h2>

        <form action="{{ $modul == 'update' ? route('admin.makun.update', $akun->id) : route('admin.makun.store') }}"
              method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            @if($modul == "update") @method('PUT') @endif

            @if($modul == "update")
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1" for="id">ID</label>
                <input type="text" id="id_display" name="id_display" value="{{ $akun->id }}" disabled
                    class="w-full px-3 py-2 border border-gray-300 bg-gray-100 rounded-md shadow-sm cursor-not-allowed">
            </div>
            @endif

            <!-- Field Input -->
            @foreach([
                'nama' => 'Nama',
                'nrp' => 'NRP',
                'angkatan' => 'Angkatan',
                'jurusan' => 'Jurusan',
                'email' => 'Email',
                'no_hp' => 'No. HP',
                'id_line' => 'ID Line'
            ] as $name => $label)
            <div>
                <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>
                <input type="text" id="{{ $name }}" name="{{ $name }}"
                    value="{{ old($name, $modul == 'update' ? $akun->$name : '') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error($name)
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            @endforeach

            <!-- Selects -->
            <div>
                <label for="jeniskelamin" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                <select name="jeniskelamin" id="jeniskelamin"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                    <option value="Laki-laki" {{ old('jeniskelamin', $modul == 'update' ? $akun->jeniskelamin : '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jeniskelamin', $modul == 'update' ? $akun->jeniskelamin : '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jeniskelamin')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <select name="role" id="role"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                    <option value="admin" {{ old('role', $modul == 'update' ? $akun->role : '') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="peserta" {{ old('role', $modul == 'update' ? $akun->role : '') == 'peserta' ? 'selected' : '' }}>Peserta</option>
                </select>
                @error('role')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit -->
            <div class="col-span-full flex justify-end">
                <button type="submit"
                    class="px-5 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
                    {{ $modul == 'update' ? 'Update' : 'Save' }}
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
