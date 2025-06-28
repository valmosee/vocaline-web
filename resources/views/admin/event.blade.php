@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header dan Tombol Export -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">MANAJEMEN EVENT</h1>
        <div>
            {{-- <a href="#" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md inline-flex items-center">
                <i class="fas fa-file-pdf mr-2"></i> EXPORT PDF
            </a> --}}
        </div>
    </div>

    <!-- Tabel Daftar Event -->
    <div class="bg-white rounded-lg shadow overflow-hidden mb-8">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Event</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jam Mulai</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>


                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($events as $event)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->location }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->address }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $event->jam_mulai }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 text-xs rounded-full
                            @if($event->status == 'onproses') bg-yellow-100 text-yellow-800
                            @elseif($event->status == 'selesai') bg-green-100 text-green-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($event->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($event->status !== 'dibatalkan')
                        <a href="{{ route('admin.event.edit', $event->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                            <a href="{{ route('admin.approval', $event->id) }}" class="text-green-600 hover:text-green-900 mr-3">
                                <i class="fas fa-user-check"></i> Kandidat
                            </a>
                            
                        </form>
                        <a> </a>
                        <a href="{{ route('admin.kuesioner', $event->id) }}" class="text-yellow-600 hover:text-yellow-900 mr-3">
                            <i class="fas fa-question"></i> Kuesioner
                        </a>
                        @else
                        <span class="text-gray-400 italic">Tidak tersedia</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada data event</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($events->hasPages())
    <div class="mt-4">
        {{ $events->links() }}
    </div>
    @endif

    <!-- Form Tambah Event -->
    <div class="bg-white rounded-lg shadow p-6 mt-8">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">TAMBAH EVENT BARU</h2>
        <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Event*</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                </div>
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Event*</label>
                    <input type="date" id="date" name="date" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('date')
                        <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                </div>
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi*</label>
                    <input type="text" id="location" name="location" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('location')
                        <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                </div>
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat*</label>
                    <input type="text" id="alamat" name="address" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('address')
                        <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                </div>
                <div>
                    <label for="kota" class="block text-sm font-medium text-gray-700 mb-1">Kota</label>
                    <input type="text" id="kota" name="city" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('city')
                        <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                </div>
                <div>
                    <label for="jam_mulai" class="block text-sm font-medium text-gray-700 mb-1">Jam Mulai</label>
                    <input type="time" id="jam_mulai" name="jam_mulai" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('jam_mulai')
                        <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                </div>
                <div>
                    <label for="jam_selesai" class="block text-sm font-medium text-gray-700 mb-1">Jam Selesai</label>
                    <input type="time" id="jam_selesai" name="jam_selesai" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('jam_selesai')
                        <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                </div>
                <div>
                    <label for="contact_person" class="block text-sm font-medium text-gray-700 mb-1">Contact Person</label>
                    <input type="text" id="cp" name="contact_person" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('contact_person')
                        <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                    <input type="file" id="image" name="image" accept="image/*" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('image')
                        <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                </div>
                <div>
                    <label for="total_penyanyi" class="block text-sm font-medium text-gray-700 mb-1">Total Penyanyi</label>
                    <input type="integer" id="total_penyanyi" name="total_penyanyi" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('total_penyanyi')
                        <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                </div>
                <div>
                    <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                    <input type="text" id="keterangan" name="keterangan" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('keterangan')
                        <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status*</label>
                    <select id="status" name="status" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="onproses">On Proses</option>
                        <option value="selesai">Selesai</option>
                        <option value="dibatalkan">Dibatalkan</option>
                    </select>
                    @error('keterangan')
                        <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                </div>
            </div>
            <div class="mt-6">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <i class="fas fa-save mr-2"></i> Simpan Event
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
