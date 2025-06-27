@extends('layout.peserta')

@section('content')
    <!-- Main Content -->
    <main class="flex-1 p-10">
        <!-- Card Event -->
        <div class="bg-gray-200 rounded-xl shadow-xl ring-1 ring-black roun  min-h-screen py-12 px-6">
            <h2 class="text-center text-yellow-400 text-4xl font-bold mb-10">Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach ($events as $row)
                    <div class="bg-[#1c1c3c] rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ asset('storage/' . $row->image) }}" alt="{{ $row->name }}"
                            class="w-full h-48 object-cover">

                        <div class="p-4">
                            <h3 class="text-yellow-400 text-xl font-bold mb-1">{{ $row->name }}</h3>
                            <div class="flex justify-between items-center">
                            <p class="text-white text-sm">{{ $row->location }}</p>
                            <a href="{{ route('peserta.detailevent', ['id' => $row->id]) }}"
                            class="bg-yellow-400 text-black text-xs font-semibold px-3 py-1 rounded hover:bg-yellow-500 transition">
                                Lihat Detail
                            </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    </section>
@endsection
