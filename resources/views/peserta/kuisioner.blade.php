@extends('layout.peserta')

@section('content')

<section>
    <main>
        <body class="bg-white font-sans p-10">
        <!-- Judul -->
        <h2 class="text-2xl font-bold mb-6">KUESIONER (PESERTA)</h2>

        <!-- Box Peringatan -->
        <div class="bg-gray-100 p-6 rounded-md mb-10 text-center text-sm">
            <p>
            Saat ini anda belum mengajukan permintaan untuk mengisi acara apapun. <br/>
            Apakah anda ingin mengajukan permintaan?
            </p>
        </div>

        <!-- Form Ajukan Diri -->
        <div class="max-w-2xl mx-auto bg-gray-100 p-6 rounded-xl shadow-sm">
            <h3 class="text-center font-semibold italic text-sm mb-4">Ajukan Diri</h3>
            <form class="grid grid-cols-2 gap-4 text-sm">
            <input type="text" placeholder="Nama Peserta" class="p-2 border rounded">
            <input type="text" placeholder="Jadwal Harian" class="p-2 border rounded">
            <input type="text" placeholder="Jurusan" class="p-2 border rounded">
            <input type="text" placeholder="No. HP" class="p-2 border rounded">
            <input type="text" placeholder="Angkatan" class="p-2 border rounded">
            <input type="text" placeholder="ID Line" class="p-2 border rounded">
            <input type="text" placeholder="Nama Acara" class="p-2 border rounded bg-gray-300 cursor-not-allowed" disabled>
            </form>

            <div class="mt-6 text-center">
            <button class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">Save</button>
            </div>
        </div>
        </body>
    </main>
</section>

@endsection


