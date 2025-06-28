@extends('layout.admin')

@section('content')
<section>
    <main class="flex-1 p-8 space-y-8 bg-gray-50 overflow-y-auto">

      <!-- Dashboard Page -->
      <div id="dashboard" class="page-content">
        <h1 class="text-3xl font-bold mb-4 text-gray-800 flex items-center gap-2">
          <i class="fa-solid fa-gauge-high text-blue-600"></i> Dashboard Admin
        </h1>

        <!-- Summary Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
          <div class="bg-blue-100 p-4 rounded-xl shadow hover:shadow-md transition flex flex-col items-center">
            <i class="fa-solid fa-users text-blue-600 text-2xl mb-1"></i>
            <div class="text-lg font-semibold text-blue-900">{{ $anggotaCount ?? 34 }}</div>
            <div class="text-sm text-blue-800">Anggota</div>
          </div>
          <div class="bg-green-100 p-4 rounded-xl shadow hover:shadow-md transition flex flex-col items-center">
            <i class="fa-solid fa-calendar-check text-green-600 text-2xl mb-1"></i>
            <div class="text-lg font-semibold text-green-900">{{ $eventCount ?? 12 }}</div>
            <div class="text-sm text-green-800">Event Terlaksana</div>
          </div>
        </div>

        <!-- Grid Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

          <!-- Data Anggota Terbaru -->
          <div class="bg-white rounded-xl shadow border overflow-hidden">
            <div class="px-5 py-3 font-semibold border-b flex justify-between items-center">
              <span class="text-gray-700 text-sm">Data Anggota Terbaru</span>
              <a href="{{ route('admin.makun') }}" class="text-blue-500 text-xs hover:underline">Lihat Semua</a>
            </div>
            <table class="w-full text-sm text-gray-700">
              <thead class="bg-gray-100">
                <tr>
                  <th class="px-4 py-2 text-left">Nama</th>
                  <th class="px-4 py-2 text-left">NRP</th>
                  <th class="px-4 py-2 text-left">Angkatan</th>
                </tr>
              </thead>
              <tbody>
                @isset($pesertas)
                @forelse($pesertas as $peserta)
                <tr class="hover:bg-gray-50">
                  <td class="px-4 py-2">{{ $peserta->nama }}</td>
                  <td class="px-4 py-2">{{ $peserta->nrp }}</td>
                  <td class="px-4 py-2">{{ $peserta->angkatan }}</td>
                </tr>
                @empty
                <tr>
                  <td colspan="3" class="px-4 py-2 text-center text-gray-500">Tidak ada data</td>
                </tr>
                @endforelse
                @endisset
              </tbody>
            </table>
          </div>

          <!-- Pengumuman Terbaru -->
          <div class="bg-white rounded-xl shadow border p-5 min-h-[200px]">
            <div class="font-semibold text-gray-700 text-sm mb-2">Pengumuman Terbaru</div>
            <p class="text-sm text-gray-600 mb-2">Halo, VG-ers!<br>GradCon akan diselenggarakan pada:</p>
            <ul class="text-sm space-y-1 text-gray-600">
              <li><i class="fa-regular fa-calendar mr-2"></i>31 Mei 2025</li>
              <li><i class="fa-solid fa-door-open mr-2"></i>Q10.02</li>
              <li><i class="fa-regular fa-clock mr-2"></i>14.50 - selesai</li>
            </ul>
          </div>

          <!-- Daftar Event -->
          <div class="col-span-2 bg-white rounded-xl shadow border overflow-hidden">
            <div class="px-5 py-3 font-semibold border-b text-gray-700 text-sm">Daftar Event</div>
            <table class="w-full text-sm text-gray-700">
              <thead class="bg-gray-100">
                <tr>
                  <th class="px-4 py-2 text-left">Nama</th>
                  <th class="px-4 py-2 text-left">Tanggal</th>
                  <th class="px-4 py-2 text-left">Singer</th>
                </tr>
              </thead>
              <tbody>
                <tr class="hover:bg-gray-50">
                  <td class="px-4 py-2">Dies Natalis...</td>
                  <td class="px-4 py-2">28-05-2025</td>
                  <td class="px-4 py-2">5</td>
                </tr>
                <tr class="hover:bg-gray-50">
                  <td class="px-4 py-2">Phygital</td>
                  <td class="px-4 py-2">16-05-2025</td>
                  <td class="px-4 py-2">1</td>
                </tr>
                <tr class="hover:bg-gray-50">
                  <td class="px-4 py-2">Epiclar: The...</td>
                  <td class="px-4 py-2">25-04-2025</td>
                  <td class="px-4 py-2">3</td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>

    </main>
</section>
@endsection
