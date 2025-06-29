@extends('layout.peserta')

@section('content')

<section class="bg-gray-50 min-h-screen py-10 px-6">
  <main class="max-w-6xl mx-auto">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-10 text-center">🎓 Dashboard Peserta</h1>

    <!-- Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

      <!-- Announcement -->
      <div class="bg-white border border-gray-200 rounded-2xl shadow-lg p-6 transition duration-300 hover:shadow-xl">
        <h2 class="text-lg font-bold text-indigo-600 mb-4 flex items-center gap-2">
          📢 Announcement
        </h2>
        <div class="text-gray-700 space-y-2 text-sm leading-relaxed">
          <p>Halo, VG-ers!</p>
          <p>Kami dengan bangga mengumumkan bahwa Graduation Concert (GradCon) akan diselenggarakan pada:</p>
          <ul class="list-disc list-inside mt-2 space-y-1">
            <li><b>📅 31 Mei 2025</b></li>
            <li><b>📍 Q10.02</b></li>
            <li><b>🕒 14.50 – selesai</b></li>
          </ul>
        </div>
      </div>

      <!-- Notifikasi Seleksi -->
      <div class="bg-white border border-gray-200 rounded-2xl shadow-lg p-6 transition duration-300 hover:shadow-xl">
        <h2 class="text-lg font-bold text-indigo-600 mb-4 flex items-center gap-2">
          🔔 Notifikasi Seleksi
        </h2>
        <table class="w-full text-sm text-gray-700">
          <thead class="text-left bg-gray-100 rounded">
            <tr>
              <th class="py-2 px-2">Nama</th>
              <th class="py-2 px-2">Acara</th>
              <th class="py-2 px-2">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b">
              <td class="py-2 px-2">Lana Del Rey</td>
              <td class="py-2 px-2">Dies Natalis</td>
              <td class="py-2 px-2">
                <button class="bg-green-200 hover:bg-green-300 text-green-800 font-medium px-3 py-1 rounded-full">Accept</button>
              </td>
            </tr>
            <tr class="border-b">
              <td class="py-2 px-2">Sabrina C</td>
              <td class="py-2 px-2">Dies Natalis</td>
              <td class="py-2 px-2">
                <button class="bg-red-200 hover:bg-red-300 text-red-800 font-medium px-3 py-1 rounded-full">Reject</button>
              </td>
            </tr>
            <tr>
              <td class="py-2 px-2">Olivia Rodrigo</td>
              <td class="py-2 px-2">Phygital</td>
              <td class="py-2 px-2">
                <button class="bg-green-200 hover:bg-green-300 text-green-800 font-medium px-3 py-1 rounded-full">Accept</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Status Partisipasi -->
      <div class="bg-white border border-gray-200 rounded-2xl shadow-lg p-6 transition duration-300 hover:shadow-xl">
        <h2 class="text-lg font-bold text-indigo-600 mb-4 flex items-center gap-2">
          📆 Status Partisipasi
        </h2>
        <table class="w-full text-sm text-gray-700">
          <thead class="text-left bg-gray-100 rounded">
            <tr>
              <th class="py-2 px-2">Nama</th>
              <th class="py-2 px-2">Tanggal</th>
              <th class="py-2 px-2">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="py-2 px-2">Dies Natalis</td>
              <td class="py-2 px-2">28-05-2025</td>
              <td class="py-2 px-2">
                <button class="bg-green-200 hover:bg-green-300 text-green-800 font-medium px-3 py-1 rounded-full">Accept</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Success Message -->
      @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-800 px-6 py-4 rounded-lg shadow transition-all duration-300">
        <strong class="block font-semibold mb-1">✅ Sukses!</strong>
        <span>{{ session('success') }}</span>
        <p>Silahkan ditunggu untuk hasil keputusan penerimaan sebagai pengisi acara. 
      </div>
      @endif

    </div>
  </main>
</section>

@endsection
