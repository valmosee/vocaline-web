@extends('layout.peserta')

@section('content')
<div class="container mx-auto px-4 py-10">
    <h2 class="text-2xl font-bold text-center mb-6">Riwayat Event Saya</h2>

    @if($joinedEvents->isEmpty())
        <p class="text-center text-gray-500">Kamu belum pernah mengikuti event di Vocal Group</p>
    @else
        <div class="bg-white rounded shadow p-6">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-4 py-2">Nama Event</th>
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($joinedEvents as $join)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $join->event->name }}</td>
                            <td class="px-4 py-2">{{ $join->event->date }}</td>
                            <td class="px-4 py-2">{{ $join->event->location }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
