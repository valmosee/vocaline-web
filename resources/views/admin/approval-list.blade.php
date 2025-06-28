@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">Daftar Peserta Event ID {{ $id_event }}</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse border">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">Sudah Isi Kuesioner</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peserta as $row)
                <tr>
                    <td class="p-2 border">{{ $row->user->name }}</td>
                    <td class="p-2 border">{{ $row->sudahIsi ? '✅ Ya' : '❌ Belum' }}</td>
                    <td class="p-2 border">{{ ucfirst($row->status ?? 'pending') }}</td>
                    <td class="p-2 border">
                        @if($row->status !== 'approved')
                        <form action="{{ route('admin.approval.approve', $row->id) }}" method="POST" class="inline">
                            @csrf
                            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">Approve</button>
                        </form>
                        @endif
                        @if($row->status !== 'rejected')
                        <form action="{{ route('admin.approval.reject', $row->id) }}" method="POST" class="inline">
                            @csrf
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Reject</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
