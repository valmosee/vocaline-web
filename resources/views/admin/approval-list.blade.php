@extends('layout.admin')

@section('content')

<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Daftar Peserta Mengajukan Diri — Event ID {{ $id_event }}</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-5 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-6">
        @forelse($peserta as $row)
            <div class="border rounded-xl p-4 bg-white shadow">
                <div class="flex justify-between items-center">
                    <div>
                        <div class="text-lg font-semibold text-gray-800">{{ $row->user->name }}</div>
                        <div class="text-sm text-gray-600">
                            Status: <span class="font-medium">{{ ucfirst($row->status ?? 'pending') }}</span>
                            &bull; Kuesioner: {{ $row->sudahIsi ? '✅ Ya' : '❌ Belum' }}
                        </div>
                    </div>
                    <div class="flex gap-2">
                        @if($row->status !== 'approved')
                        <form action="{{ route('admin.approval.approve', $row->id) }}" method="POST">
                            @csrf
                            <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-1 rounded text-sm">Approve</button>
                        </form>
                        @endif
                        @if($row->status !== 'rejected')
                        <form action="{{ route('admin.approval.reject', $row->id) }}" method="POST">
                            @csrf
                            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded text-sm">Reject</button>
                        </form>
                        @endif
                    </div>
                </div>

                {{-- Jawaban kuesioner --}}
                @if($row->sudahIsi)
                <div class="mt-4 bg-gray-50 rounded-md p-4">
                    <h4 class="font-semibold text-sm text-gray-700 mb-2">Jawaban Kuesioner:</h4>
                    <ul class="list-disc pl-5 text-sm text-gray-700 space-y-1">
                        @foreach($row->jawaban as $jawaban)
                            <li>
                                <strong>{{ $jawaban->kuesioner->pertanyaan ?? 'Pertanyaan tidak ditemukan' }}:</strong>
                                {{ $jawaban->jawaban }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        @empty
            <div class="text-center text-gray-500 text-sm">Belum ada peserta yang mengajukan diri untuk event ini.</div>
        @endforelse
    </div>
</div>

@endsection
