<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen flex items-center justify-center p-6">

    <a href="{{ route('admin.dashboard') }}" class="absolute top-6 left-6 bg-yellow-700 hover:bg-yellow-800 text-white py-2 px-4 font-bold rounded">
        ← Back
    </a>

    <div class="w-full max-w-md relative mt-12">
        <div class="bg-gray-800 rounded-lg p-6 space-y-6 shadow-xl">

            <!-- Header Profil -->
            <div class="flex items-center space-x-4">
                <img id="previewImage" src="{{ $user->foto ?? 'https://via.placeholder.com/60' }}?t={{ time() }}" 
                     alt="Foto Profil" 
                     class="w-16 h-16 rounded-full object-cover border-2 border-yellow-600">
                <div>
                    <p class="font-semibold text-lg">{{ $user->nama }}</p>
                    <p class="text-gray-400 text-sm">{{ $user->email }}</p>
                </div>
            </div>

            <!-- Form Edit Profil -->
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block mb-1 text-gray-300">Nama</label>
                    <input name="nama" type="text" value="{{ old('nama', $user->nama) }}"
                           class="w-full bg-gray-700 text-white px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400">
                </div>

                <div>
                    <label class="block mb-1 text-gray-300">Email</label>
                    <input name="email" type="email" value="{{ old('email', $user->email) }}"
                           class="w-full bg-gray-700 text-white px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400">
                </div>

                <div>
                    <label class="block mb-1 text-gray-300">Password (Opsional)</label>
                    <input name="password" type="password"
                           class="w-full bg-gray-700 text-white px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400">
                </div>

                <div>
                    <label class="block mb-1 text-gray-300">Foto Profil</label>
                    <input id="profile_photo" name="profile_photo" type="file" accept="image/*"
                           class="block w-full text-sm text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-yellow-700 file:text-white hover:file:bg-yellow-800">
                    <span class="text-gray-500 text-xs mt-1" id="fileInfo">No file chosen</span>
                </div>

                <div>
                    <button type="submit" class="bg-yellow-700 hover:bg-yellow-800 w-full py-2 rounded font-semibold transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

            @if (session('status'))
                <div class="text-green-500 text-sm mt-4">{{ session('status') }}</div>
            @endif

            @if (session('error'))
                <div class="text-red-500 text-sm mt-4">{{ session('error') }}</div>
            @endif

        </div>
    </div>

    <script>
        const input = document.getElementById('profile_photo');
        const preview = document.getElementById('previewImage');
        const fileInfo = document.getElementById('fileInfo');

        input.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    preview.src = event.target.result;
                }
                reader.readAsDataURL(file);
                fileInfo.textContent = file.name;
            } else {
                fileInfo.textContent = 'No file chosen';
            }
        });
    </script>

</body>
</html>