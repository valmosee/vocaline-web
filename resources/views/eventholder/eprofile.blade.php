<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profil</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen flex items-center justify-center p-6">

  <div class="w-full max-w-2xl bg-[#1c1c1c] rounded-2xl p-8 space-y-6 shadow-xl">

    <!-- Header -->
    <div class="flex items-center justify-between">
      <div class="flex items-center space-x-4">
        <img src="https://via.placeholder.com/60" alt="Foto Profil" class="w-14 h-14 rounded-full object-cover">
        <div>
            <!-- Tombol Back -->
            <a href="{{ route('eventholder.homepage') }}" class="absolute top-4 left-4 bg-yellow-700 hover:bg-yellow-800 text-white py-2 px-4 font-bold rounded">
                ← Back
            </a>
          <p class="font-semibold text-lg">namapengguna</p>
          <p class="text-gray-400 text-sm">Nama Lengkap</p>
        </div>
      </div>
      <button class="bg-yellow-700 hover:bg-yellow-800 text-white px-4 py-2 rounded font-semibold transition">
        Ubah Foto
      </button>
    </div>

    <!-- Form -->
    <form class="space-y-5">

      <div>
        <label class="block mb-1 text-gray-300">Nama</label>
        <input type="text" placeholder="Nama Lengkap" class="w-full bg-[#2a2a2a] text-white px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400">
      </div>

      <div>
        <label class="block mb-1 text-gray-300">Email</label>
        <input type="email" placeholder="Email" class="w-full bg-[#2a2a2a] text-white px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400">
      </div>

    <div>
        <label class="block mb-1 text-gray-300">Password</label>
        <input type="password" placeholder="Password" class="w-full bg-[#2a2a2a] text-white px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400">
      </div>


      <div>
        <label class="block mb-1 text-gray-300">Foto Profil</label>
        <input type="file" class="block w-full text-sm text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-yellow-700 file:text-white hover:file:bg-yellow-800">
      </div>

      <div class="pt-4">
        <button type="submit" class="bg-yellow-700 hover:bg-yellow-800 w-full py-2 rounded font-semibold transition">
          Simpan Perubahan
        </button>
      </div>

    </form>

  </div>

</body>
</html>
