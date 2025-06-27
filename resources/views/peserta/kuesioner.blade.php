@extends('layout.peserta')

@section('content')
    <div class="container mx-auto px-4 py-10">
        <div class="bg-white rounded-xl shadow-lg p-10">
            <h2 class="text-center text-yellow-400 text-4xl font-bold mb-8">Kuesioner untuk event {{ $id_event }}</h2>

            <form action="{{ route('peserta.kuesioner.store', ['id_event' => $id_event]) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                <input type="hidden" name="id_event" value="{{ $id_event }}">

                @forelse ($kuesioners as $row)
                    <div class="mb-4">
                        <p><strong>{{ $row->pertanyaan }}</strong></p>
                        @foreach (['choice_a', 'choice_b', 'choice_c', 'choice_d'] as $opt)
                            <div>
                                <input type="radio" name="jawaban[{{ $row->id }}]" value="{{ $row->$opt }}"
                                    required>
                                {{ $row->$opt }}
                            </div>
                        @endforeach
                    </div>
                @empty
                    <p class="text-red-500">Tidak ada kuesioner untuk event ini</p>
                @endforelse

                <div class="mt-6 text-center">
                    <button type="submit"
                        class="bg-yellow-400 hover:bg-yellow-500 text-black px-6 py-2 rounded-xl shadow transition-all">
                        Save
                    </button>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection
