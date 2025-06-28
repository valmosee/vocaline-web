@extends('layout.peserta')

@section('content')
<!-- Main Content -->
<main class="flex-1 p-10">
  <section class="bg-white rounded-3xl shadow-xl min-h-screen py-12 px-6 ring-1 ring-gray-200">
    <h2 class="text-center text-4xl font-extrabold text-indigo-700 mb-12 tracking-tight">🎉 Events</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 max-w-7xl mx-auto">
      @foreach ($events as $row)
      <div class="bg-[#1c1c3c] rounded-2xl overflow-hidden shadow-lg hover:scale-[1.02] transition-transform duration-300">
        <img src="{{ asset('storage/' . $row->image) }}" alt="{{ $row->name }}" class="w-full h-48 object-cover">

        <div class="p-5 space-y-3">
          <h3 class="text-yellow-400 text-xl font-bold">{{ $row->name }}</h3>
          <p class="text-white text-sm"><i class="fa-solid fa-location-dot mr-2 text-yellow-300"></i>{{ $row->location }}</p>
          
          <div class="pt-3">
            <a href="{{ route('peserta.detailevent', ['id' => $row->id]) }}"
              class="inline-block bg-yellow-400 text-black text-xs font-semibold px-4 py-2 rounded-full hover:bg-yellow-500 transition duration-200">
              Lihat Detail
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>
</main>
@endsection
