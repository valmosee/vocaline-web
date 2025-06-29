@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Laporan Event</h1>

    <!-- Form Filter -->
    <form method="GET" action="{{ route('admin.event.report') }}" class="bg-white p-4 rounded shadow mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Cari Nama Event / Lokasi / CP"
                   class="w-full px-3 py-2 border rounded-md" />

            <select name="status" class="w-full px-3 py-2 border rounded-md">
                <option value="">-- Semua Status --</option>
                <option value="onproses" {{ request('status') == 'onproses' ? 'selected' : '' }}>On Proses</option>
                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="dibatalkan" {{ request('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
            </select>

            <input type="text" name="city" value="{{ request('city') }}" placeholder="Kota"
                   class="w-full px-3 py-2 border rounded-md" />

            <input type="date" name="date_start" value="{{ request('date_start') }}"
                   class="w-full px-3 py-2 border rounded-md" />

            <input type="date" name="date_end" value="{{ request('date_end') }}"
                   class="w-full px-3 py-2 border rounded-md" />

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filter</button>
                <a href="{{ route('admin.event.report') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Reset</a>
            </div>
        </div>
    </form>

    <!-- Tabel Hasil -->
    <div class="bg-white p-4 rounded shadow">
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Nama Event</th>
                    <th class="border px-4 py-2">Tanggal</th>
                    <th class="border px-4 py-2">Lokasi</th>
                    <th class="border px-4 py-2">Kota</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Total Penyanyi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($events as $event)
                    <tr>
                        <td class="border px-4 py-2">{{ $event->name }}</td>
                        <td class="border px-4 py-2">{{ $event->date }}</td>
                        <td class="border px-4 py-2">{{ $event->location }}</td>
                        <td class="border px-4 py-2">{{ $event->city }}</td>
                        <td class="border px-4 py-2">{{ ucfirst($event->status) }}</td>
                        <td class="border px-4 py-2">{{ $event->total_penyanyi }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Tidak ada data ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
