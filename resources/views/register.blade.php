<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-white">

  <div class="bg-gray-300 p-10 rounded-2xl w-full max-w-sm shadow-lg">
    <h2 class="text-center font-bold text-2xl mb-8">REGISTER</h2>

    <form action="{{ route('views.register.submit') }}" method="POST" class="space-y-5">
    @csrf
      <div>
        <label for="nrp" class="text-sm font-semibold block mb-1">NRP</label>
        <input type="text" id="nrp" name="nrp" required
               class="w-full px-4 py-3 rounded-md bg-gray-400 text-white text-base outline-none focus:ring-2 focus:ring-gray-600 placeholder-white"
               placeholder="Masukkan NRP">
      </div>

      <div>
        <label for="name" class="text-sm font-semibold block mb-1">Nama Lengkap</label>
        <input type="text" id="name" name="name" required
               class="w-full px-4 py-3 rounded-md bg-gray-400 text-white text-base outline-none focus:ring-2 focus:ring-gray-600 placeholder-white"
               placeholder="Masukkan nama">
      </div>

      <!-- <div>
        <label for="email" class="text-sm font-semibold block mb-1">Email</label>
        <input type="email" id="email" name="email" required
               class="w-full px-4 py-3 rounded-md bg-gray-400 text-white text-base outline-none focus:ring-2 focus:ring-gray-600 placeholder-white"
               placeholder="Masukkan email">
      </div> -->

      <div>
        <label for="password" class="text-sm font-semibold block mb-1">Password</label>
        <input type="password" id="password" name="password" required
               class="w-full px-4 py-3 rounded-md bg-gray-400 text-white text-base outline-none focus:ring-2 focus:ring-gray-600 placeholder-white"
               placeholder="Masukkan password">
      </div>

      <button type="submit"
              class="w-full py-3 bg-gray-600 text-white font-bold text-base rounded-md hover:bg-gray-700 transition">
        Masuk
      </button>
    </form>

    <p class="text-xs mt-4 text-left">
      Sudah punya akun? <a href="{{ route('views.login') }}" class="text-blue-600 hover:underline">masuk</a>
    </p>
  </div>

</body>
</html>
