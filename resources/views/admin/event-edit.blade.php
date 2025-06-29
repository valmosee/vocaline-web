@extends('layout.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Header dan Tombol Export -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">EDIT EVENT</h1>
            <div>
                {{-- <a href="#" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md inline-flex items-center">
                <i class="fas fa-file-pdf mr-2"></i> EXPORT PDF
            </a> --}}
            </div>
        </div>

        <!-- Form Tambah Event -->
        <div class="bg-white rounded-lg shadow p-6 mt-8">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">EDIT EVENT</h2>
            <form action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Event*</label>
                        <input type="text" id="name" name="name" required value = "{{ $event->name }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal*</label>
                        <input type="date" id="date" name="date" required value="{{ $event->date }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('date')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi*</label>
                        <input type="text" id="location" name="location" required value="{{ $event->location }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('location')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat*</label>
                        <input type="text" id="alamat" name="address" required value="{{ $event->address }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('address')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>
                    <div>
                        <label for="kota" class="block text-sm font-medium text-gray-700 mb-1">Kota</label>
                        <input type="text" id="kota" name="city" required value="{{ $event->city }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('city')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>
                    <div>
                        <label for="jam_mulai" class="block text-sm font-medium text-gray-700 mb-1">Jam Mulai</label>
                        <input type="time" id="jam_mulai" name="jam_mulai" required
                            value ="{{ substr($event->jam_mulai, 0, 5) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('jam_mulai')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>
                    <div>
                        <label for="jam_selesai" class="block text-sm font-medium text-gray-700 mb-1">Jam Selesai</label>
                        <input type="time" id="jam_selesai" name="jam_selesai" required
                            value="{{ substr($event->jam_mulai, 0, 5) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('jam_selesai')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>
                    <div>
                        <label for="contact_person" class="block text-sm font-medium text-gray-700 mb-1">Contact
                            Person</label>
                        <input type="text" id="cp" name="contact_person" required
                            value="{{ $event->contact_person }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('contact_person')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                        <img src="{{ asset('storage/' . $event->image) }}" style="width: 200px; height: 200px;">
                        <br />
                        <input type="file" id="image" name="image" accept="image/*"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>
                    <div>
                        <label for="total_penyanyi" class="block text-sm font-medium text-gray-700 mb-1">Total
                            Penyanyi</label>
                        <input type="integer" id="total_penyanyi" name="total_penyanyi" required
                            value="{{ $event->total_penyanyi }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('total_penyanyi')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>
                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                        <input type="text" id="keterangan" name="keterangan" required value="{{ $event->keterangan }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('keterangan')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status*</label>
                        
                        <select id="status" name="status" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="onproses" {{ $event->status == 'onproses' ? 'selected' : '' }}>On Proses</option>
                        <option value="selesai" {{ $event->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="dibatalkan" {{ $event->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                    </select>

                        @error('keterangan')
                            <div class="alert alert-danger">{{ $message }} </div>
                        @enderror
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-save mr-2"></i> Edit Event
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
