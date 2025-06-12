@extends('layout.peserta')

@section('content')

  <!-- Main Content -->
  <main class="flex-1 p-10">
    <h2 class="text-2xl font-bold mb-6">DAFTAR EVENT (PESERTA)</h2>

    <!-- Tabel Event -->
    <div class="bg-gray-100 p-4 rounded-md mb-10">
      <table class="w-full text-sm">
        <thead>
          <tr class="text-gray-700">
            <th class="text-left py-2 px-3">Nama Event</th>
            <th class="text-left py-2 px-3">Tanggal</th>
            <th class="text-left py-2 px-3">Lokasi</th>
            <th class="text-left py-2 px-3">Benefit</th>
          </tr>
        </thead>
        <tbody>
          <!-- Kosong, belum ada event -->
          <tr>
            <td class="py-4 px-3 text-gray-400" colspan="4">Tidak ada event tersedia.</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Form Pengajuan -->
    <div class="max-w-md mx-auto bg-gray-100 p-6 rounded-md shadow-md">
      <h3 class="text-center italic text-sm mb-4 font-semibold">Pengajuan Partisipasi</h3>
      <div class="grid grid-cols-3 gap-2 text-xs mb-2 font-bold">
        <span>Nama</span>
        <span>NRP</span>
        <span>Acara</span>
      </div>
      <div class="grid grid-cols-3 gap-2 mb-4">
        <input type="text" placeholder="Type your name..." class="p-2 border rounded text-sm">
        <input type="text" placeholder="Type your NRP..." class="p-2 border rounded text-sm">
        <input type="text" value="Phygital" readonly class="p-2 border rounded bg-gray-200 text-sm">
      </div>
      <button class="w-full bg-gray-600 text-white py-2 rounded hover:bg-gray-700 transition">Ajukan Partisipasi</button>
    </div>
  </main>

</section>
@endsection