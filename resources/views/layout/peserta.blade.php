@php
    use Illuminate\Support\Facades\Auth;
@endphp

{{-- Cek apakah user sudah login dan role-nya peserta --}}
@auth
    @if (Auth::user()->role !== 'peserta')
        <script>
            window.location.href = "{{ route('home') }}";
        </script>
    @endif
@else
    <script>
        window.location.href = "{{ route('login') }}";
    </script>
@endauth

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Peserta</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    function confirmLogout() {
        Swal.fire({
            title: 'Yakin mau logout?',
            text: "Kamu akan keluar dari sistem.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
  </script>

</head>
<body class="bg-gray-100 font-sans text-sm text-gray-800">

  <div class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-[250px] bg-white shadow-md p-6 flex flex-col justify-between">
      <div>
        <!-- Logo -->
        <a href="{{ route('peserta.profile') }}" class="flex items-center mb-10">
          <div class="bg-orange-500 text-white font-bold w-10 h-10 rounded-full flex items-center justify-center mr-3 text-lg hover:opacity-90 transition-all duration-200">
            VG
          </div>
          <span class="font-semibold text-lg text-gray-700">Peserta</span>
        </a>

        <!-- Navigasi -->
        <nav class="space-y-2 w-full">
          <a href="{{ route('peserta.dashboard') }}" class="block px-4 py-2 rounded-md hover:bg-orange-100 transition font-medium {{ request()->routeIs('peserta.dashboard') ? 'bg-orange-200 text-orange-800' : '' }}">
            <i class="fa-solid fa-gauge-high mr-2"></i>Dashboard
          </a>
          <a href="{{ route('peserta.event') }}" class="block px-4 py-2 rounded-md hover:bg-orange-100 transition font-medium {{ request()->routeIs('peserta.event') ? 'bg-orange-200 text-orange-800' : '' }}">
            <i class="fa-solid fa-calendar-days mr-2"></i>Event
          </a>
        </nav>
      </div>

      <!-- Tombol Logout -->
      <div class="mt-8 w-full">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <button type="button" class="w-full flex items-center justify-center bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-md transition" onclick="confirmLogout()">
          <i class="fa-solid fa-right-from-bracket mr-2"></i>Logout
        </button>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
      @yield('content')
    </main>

  </div>

</body>
</html>
