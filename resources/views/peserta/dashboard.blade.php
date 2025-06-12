@extends('layout.peserta')

@section('content')

<section>   
    <!-- Main Content -->
    <main class="flex-1 p-8">
      <h1 class="text-2xl font-bold mb-6">DASHBOARD PESERTA</h1>

      <div class="grid grid-cols-2 gap-6">
        <!-- Announcement -->
        <div class="bg-gray-200 p-4 rounded">
          <h2 class="font-semibold mb-2">Announcement</h2>
          <div class="bg-white p-4 rounded shadow text-sm leading-relaxed">
            <p>Halo, VG-ers!</p>
            <p>Kami dengan bangga mengumumkan bahwa Graduation Concert (GradCon) akan diselenggarakan pada:</p>
            <ul class="mt-2">
              <li>📅 <b>31 Mei 2025</b></li>
              <li>📍 Q10.02</li>
              <li>🕒 14.50 – selesai</li>
            </ul>
          </div>
        </div>

        <!-- Notifikasi Seleksi -->
        <div class="bg-gray-200 p-4 rounded">
          <h2 class="font-semibold mb-2">Notifikasi seleksi</h2>
          <table class="w-full text-sm">
            <thead>
              <tr>
                <th class="text-left">Nama</th>
                <th class="text-left">Acara</th>
                <th class="text-left">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr><td>Lana Del Rey</td><td>Dies Natalis</td><td><button class="bg-gray-300 px-2 rounded text-black">Accept</button></td></tr>
              <tr><td>Sabrina C</td><td>Dies Natalis</td><td><button class="bg-gray-300 px-2 rounded text-black">Reject</button></td></tr>
              <tr><td>Olivia Rodrigo</td><td>Phygital</td><td><button class="bg-gray-300 px-2 rounded text-black">Accept</button></td></tr>
            </tbody>
          </table>
        </div>

        <!-- Status Partisipasi -->
        <div class="bg-gray-200 p-4 rounded">
          <h2 class="font-semibold mb-2">Status Partisipasi</h2>
          <table class="w-full text-sm">
            <thead>
              <tr>
                <th class="text-left">Nama</th>
                <th class="text-left">Tanggal</th>
                <th class="text-left">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Dies Natalis</td>
                <td>28-05-2025</td>
                <td><button class="bg-gray-300 px-2 rounded text-black">Accept</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
</section>

@endsection
