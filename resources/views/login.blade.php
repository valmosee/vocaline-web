<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

  <div class="bg-gray-300 p-10 rounded-2xl w-full max-w-sm shadow-lg">
    <h2 class="text-center font-bold text-2xl mb-8">LOGIN</h2>

    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-6">
      @csrf

      <!-- Username + Domain -->
      <div>
        <label for="username" class="text-sm font-semibold block mb-1">Email</label>
        <div class="flex">
          <input type="text" id="username" name="username" required
                class="w-2/3 px-4 py-3 rounded-l-md bg-gray-400 text-white text-base outline-none focus:ring-2 focus:ring-gray-600 placeholder-white"
                placeholder="Masukkan Email">
          <select name="domain" required
                  class="w-1/3 px-2 py-3 rounded-r-md bg-white text-black text-base outline-none focus:ring-2 focus:ring-gray-600">
            <option value="">-</option>
            <option value="@staff.vg.ac.id">@staff.vg.ac.id</option>
            <option value="@member.vg.ac.id">@member.vg.ac.id</option>
            <option value="@event.vg.ac.id">@event.vg.ac.id</option>
          </select>
        </div>
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="text-sm font-semibold block mb-1">Password</label>
        <input type="password" id="password" name="password" required
              class="w-full px-4 py-3 rounded-md bg-gray-400 text-white text-base outline-none focus:ring-2 focus:ring-gray-600 placeholder-white"
              placeholder="Masukkan password">
      </div>

      <!-- Submit -->
      <button type="submit"
              class="w-full py-3 bg-gray-600 text-white font-bold text-base rounded-md hover:bg-gray-700 transition">
        Masuk
      </button>
    </form>

    <!-- Keterangan + Register -->
    <p class="text-xs mt-4 text-left">
      Belum punya akun?
      <a href="{{ route('register') }}" class="text-blue-600 hover:underline">daftar</a>
    </p>

    <p class="text-xs mt-2 text-gray-700">
      <strong>Keterangan pengisian username:</strong><br>
      - Fungsionaris: gunakan email @staff.vg.ac.id<br>
      - Peserta: gunakan email @member.vg.ac.id<br>
      - Eventholder: gunakan email @event.vg.ac.id
    </p>
  </div>
</body>
</html>
