@extends('layout.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">DATA ANGGOTA (ADMIN)</h1>
        <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md flex items-center">
            <i class="fas fa-file-pdf mr-2"></i> EXPORT PDF
        </button>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skill Grup</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skill Pribadi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengalaman</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jadwal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Contoh Data 1 -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                    <td class="px-6 py-4 whitespace-nowrap">Web Development</td>
                    <td class="px-6 py-4 whitespace-nowrap">JavaScript, PHP</td>
                    <td class="px-6 py-4 whitespace-nowrap">2 Tahun</td>
                    <td class="px-6 py-4 whitespace-nowrap">Senin-Jumat, 09:00-17:00</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                        <button class="text-red-600 hover:text-red-900">Hapus</button>
                    </td>
                </tr>
                
                <!-- Contoh Data 2 -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Jane Smith</td>
                    <td class="px-6 py-4 whitespace-nowrap">Design</td>
                    <td class="px-6 py-4 whitespace-nowrap">UI/UX, Figma</td>
                    <td class="px-6 py-4 whitespace-nowrap">1 Tahun</td>
                    <td class="px-6 py-4 whitespace-nowrap">Selasa-Kamis, 10:00-16:00</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                        <button class="text-red-600 hover:text-red-900">Hapus</button>
                    </td>
                </tr>
                
                <!-- Contoh Data 3 -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Michael Johnson</td>
                    <td class="px-6 py-4 whitespace-nowrap">Marketing</td>
                    <td class="px-6 py-4 whitespace-nowrap">SEO, Content Writing</td>
                    <td class="px-6 py-4 whitespace-nowrap">3 Tahun</td>
                    <td class="px-6 py-4 whitespace-nowrap">Senin-Jumat, 08:00-18:00</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                        <button class="text-red-600 hover:text-red-900">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 flex justify-between items-center">
        <div class="text-sm text-gray-700">
            Showing <span class="font-medium">1</span> to <span class="font-medium">3</span> of <span class="font-medium">10</span> entries
        </div>
        <div class="flex space-x-2">
            <button class="px-3 py-1 border rounded-md bg-gray-100 text-gray-700">Previous</button>
            <button class="px-3 py-1 border rounded-md bg-blue-500 text-white">1</button>
            <button class="px-3 py-1 border rounded-md bg-gray-100 text-gray-700">2</button>
            <button class="px-3 py-1 border rounded-md bg-gray-100 text-gray-700">Next</button>
        </div>
    </div>
</div>
@endsection