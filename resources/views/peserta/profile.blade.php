<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex min-h-screen">

  <!-- Kiri -->
  <div class="w-1/2 bg-gray-300 flex flex-col items-center justify-center p-8">
    
  <!-- Tombol Back -->
  <a href="{{ route('peserta.dashboard') }}" class="absolute top-4 left-4 bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 font-bold rounded">
    ← Back
  </a>

    
    <div class="w-12 h-12 bg-orange-400 rounded-full flex items-center justify-center text-white font-bold mb-4">
      BS
    </div>
    <h2 class="text-lg font-semibold mb-8">Budi</h2>
    <form class="space-y-4 w-full max-w-xs">
      <input type="text" placeholder="NAME" class="w-full px-4 py-2 rounded bg-gray-400 placeholder-black text-black focus:outline-none">
      <input type="email" placeholder="EMAIL" class="w-full px-4 py-2 rounded bg-gray-400 placeholder-black text-black focus:outline-none">
      <button type="submit" class="w-full bg-gray-600 hover:bg-gray-700 text-white py-2 font-bold rounded">
        SIMPAN
      </button>
    </form>
  </div>

  <!-- Kanan -->
  <div class="w-1/2 bg-white flex flex-col items-center justify-center p-8">
    <h2 class="text-lg font-semibold mb-4">Budi</h2>
    <p class="mb-4 font-bold hover:underline cursor-pointer">Unggah Foto</p>

    <div class="w-40 h-40 border-2 border-dashed border-gray-400 rounded-xl flex items-center justify-center mb-4">
      <img src="https://via.placeholder.com/100" alt="Placeholder Image">
    </div>

    <button class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 font-bold rounded">
      SIMPAN PERUBAHAN
    </button>
  </div>

</body>
</html>
