@extends('layout.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">MANAJEMEN KUESIONER</h1>
        </div>

        <!-- TABEL KUESIONER -->
        <div class="bg-white rounded-lg shadow overflow-hidden mb-8">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pertanyaan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jawaban A</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jawaban B</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jawaban C</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jawaban D</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($kuesioner as $row)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $row->pertanyaan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $row->choice_a }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $row->choice_b }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $row->choice_c }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $row->choice_d }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('admin.kuesioner.destroy', $row->id) }}" method="POST"
                                    class="form-hapus">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada kuesioner untuk event
                                ini</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- FORM INPUT KUESIONER -->
        <div class="bg-white p-6 rounded shadow">
            <form action="{{ route('admin.kuesioner.store', $id_event) }}" method="POST">
                <input type="hidden" name="id_event" value="{{ $event->id }}">
                @csrf
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="pertanyaan" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                        <input type="text" name="pertanyaan"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-base focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="flex">
                        <label for="choice_a" class="text-sm mt-3 mr-3 font-medium text-gray-700">A.</label>
                        <input type="text" name="choice_a"
                            class="mt-1 border w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-base focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="flex">
                        <label for="choice_b" class="text-sm mt-3 mr-3 font-medium text-gray-700">B.</label>
                        <input type="text" name="choice_b"
                            class="mt-1 border w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-base focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="flex">
                        <label for="choice_c" class="text-sm mt-3 mr-3 font-medium text-gray-700">C.</label>
                        <input type="text" name="choice_c"
                            class="mt-1 border w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-base focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="flex">
                        <label for="choice_d" class="text-sm mt-3 mr-3 font-medium text-gray-700">D.</label>
                        <input type="text" name="choice_d"
                            class="mt-1 border w-full border-gray-300 rounded-md shadow-sm py-2 px-3 text-base focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                </div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                    Simpan Kuesioner
                </button>
        </div>
        </form>
    </div>
@endsection
