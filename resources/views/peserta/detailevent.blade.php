@extends('layout.peserta')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="rounded-xl shadow-xl ring-1 ring-black overflow-hidden flex flex-col md:flex-row p-10">
        <!-- Gambar Event -->
        <div class="md:w-1/5">
            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}"
                class="w-full h-full object-cover">
        </div>

        <!-- Detail Event -->
        <div class="md:w-2/3 p-6 flex flex-col justify-between">
            <div>
                <h2 class="text-3xl text-transform: uppercase font-bold text-gray-900 mb-2">{{ $event->name }}</h2>
                <p class="text-sm text-gray-500 mb-4">{{ $event->date }}</p>

                <div class="space-y-2">
                    <p class="text-gray-700"><strong>Lokasi:</strong> {{ $event->location }}</p>
                    <p class="text-gray-700"><strong>Alamat:</strong> {{ $event->address }}, {{ $event->city }}</p>
                    <p class="text-gray-700"><strong>Waktu:</strong> {{ $event->jam_mulai }} - {{ $event->jam_selesai }}</p>
                    <p class="text-gray-700"><strong>Keterangan:</strong> {{ $event->keterangan }}</p>
                </div>
            </div>

             <!-- Tombol Ajukan diri -->
             <div class="mt-6">
                <a href="{{ route('peserta.kuesioner', ['id_event' => $event->id]) }}"
                class="inline-block bg-yellow-400 hover:bg-yellow-500 text-black text-sm font-semibold px-4 py-2 rounded shadow transition">
                    Ajukan Diri
                </a>
            </div>

            {{-- <a href="{{ route('peserta.kuesioner', $event->id) }}" class="btn btn-primary">
                Isi Kuesioner
                </a> --}}

        </div>
    </div>
</div>
@endsection
