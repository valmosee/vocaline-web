@extends('layout.admin')


<script>
  function confirmDelete(formId) {
    Swal.fire({
      title: 'Yakin ingin menghapus?',
      text: "File yang dihapus tidak bisa dikembalikan.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#e3342f',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById(formId).submit();
      }
    });
  }
</script>

@section('content')
<div class="p-6 space-y-6">

    <!-- Header -->
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800">📅 Manajemen Event</h1>
        <div class="flex gap-3">
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white shadow-lg rounded-xl overflow-x-auto border">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                <tr>
                    <th class="px-6 py-3">Nama Event</th>
                    <th class="px-6 py-3">Tanggal</th>
                    <th class="px-6 py-3">Lokasi</th>
                    <th class="px-6 py-3">Jam Mulai</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach($events as $event)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium">{{ $event->name }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</td>
                    <td class="px-6 py-4">{{ $event->location }}</td>
                    <td class="px-6 py-4">{{ $event->jam_mulai }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full
                            @if($event->status == 'onproses') bg-yellow-100 text-yellow-800
                            @elseif($event->status == 'selesai') bg-green-100 text-green-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($event->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex flex-wrap gap-2">
                            @if($event->status !== 'dibatalkan')
                            <a href="{{ route('admin.event.edit', $event->id) }}" 
                               class="text-blue-600 hover:underline inline-flex items-center">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>

                            <button onclick="confirmDelete('delete-form-{{ $event->id }}')" 
                                    class="text-red-600 hover:underline inline-flex items-center">
                                    <i class="fas fa-trash mr-1"></i> Hapus
                            </button>
                         
                            <a href="{{ route('admin.approval', $event->id) }}" 
                               class="text-green-600 hover:underline inline-flex items-center">
                                <i class="fas fa-user-check mr-1"></i> Kandidat
                            </a>
                            <a href="{{ route('admin.kuesioner', $event->id) }}" 
                               class="text-yellow-600 hover:underline inline-flex items-center">
                                <i class="fas fa-question mr-1"></i> Kuesioner
                            </a>
                            @else
                            <span class="text-gray-400 italic">Tidak tersedia</span>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center text-sm text-gray-600">
        <div>
            Menampilkan {{ $events->firstItem() }} – {{ $events->lastItem() }} dari {{ $events->total() }} event
        </div>
        <div>
            {{ $events->links('vendor.pagination.custom-tailwind') }}
        </div>
    </div>

    <!-- Form Tambah/Edit Event -->
    <div class="bg-white p-6 shadow-md rounded-lg">
        <h2 class="text-xl font-semibold mb-4">➕ Tambah Event Baru</h2>
        
        <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            
            <!-- Field Input -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Event*</label>
                <input type="text" id="name" name="name" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Event*</label>
                <input type="date" id="date" name="date" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('date')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi*</label>
                <input type="text" id="location" name="location" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('location')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat*</label>
                <input type="text" id="address" name="address" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('address')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
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
            
            <!-- Submit -->
            <div class="col-span-full flex justify-end">
                <button type="submit"
                    class="px-5 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
                    Simpan Event
                </button>
            </div>
        </form>
    </div>

</div>
@endsection