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

  <!-- Google Fonts - Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Custom Styles -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      letter-spacing: 0.025em;
    }
    
    .sidebar-item {
      transition: all 0.3s ease;
    }
    
    .sidebar-item:hover {
      transform: translateX(4px);
    }
    
    .logo-bg {
      background: linear-gradient(135deg, #f97316 0%, #f59e0b 100%);
    }
    
    .active-menu {
      background: linear-gradient(90deg, rgba(254, 215, 170, 0.5) 0%, rgba(255, 255, 255, 0.5) 100%);
      border-left: 4px solid #f97316;
    }
  </style>

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
            cancelButtonText: 'Batal',
            customClass: {
              title: 'font-semibold',
              confirmButton: 'px-4 py-2 rounded-lg',
              cancelButton: 'px-4 py-2 rounded-lg'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
  </script>

</head>
<body class="bg-gray-50 text-gray-700 antialiased">

  <div class="flex h-screen overflow-hidden">

    <!-- Sidebar - Desain lebih modern -->
    <aside class="w-[260px] bg-white border-r border-gray-200 shadow-sm flex flex-col justify-between px-6 py-8 transition-all duration-300">
      <div>
        <!-- Logo dengan efek lebih menarik -->
        <a href="{{ route('peserta.profile') }}" class="flex items-center mb-10 group">
          <div class="logo-bg text-white font-bold w-12 h-12 rounded-xl flex items-center justify-center mr-3 transition-all duration-300 group-hover:shadow-lg group-hover:scale-105 text-xl">
            VG
          </div>
          <span class="font-semibold text-gray-800 text-lg tracking-tight">Peserta</span>
        </a>

        <!-- Navigasi - Lebih elegan -->
        <nav class="space-y-1.5 w-full">
          <a href="{{ route('peserta.dashboard') }}" class="sidebar-item flex items-center px-4 py-3 rounded-xl hover:bg-orange-50/80 transition font-medium {{ request()->routeIs('peserta.dashboard') ? 'active-menu text-orange-700' : '' }}">
            <i class="fa-solid fa-gauge-high w-5 mr-3 text-orange-500"></i>
            <span>Dashboard</span>
          </a>
          
          <a href="{{ route('peserta.event') }}" class="sidebar-item flex items-center px-4 py-3 rounded-xl hover:bg-orange-50/80 transition font-medium {{ request()->routeIs('peserta.event') ? 'active-menu text-orange-700' : '' }}">
            <i class="fa-solid fa-calendar-days w-5 mr-3 text-amber-500"></i>
            <span>Event</span>
          </a>
        </nav>
      </div>

      <!-- Tombol Logout - Lebih menarik -->
      <div class="mt-8 w-full border-t border-gray-100 pt-6">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <button type="button" class="w-full flex items-center justify-center bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-medium px-5 py-2.5 rounded-xl transition-all duration-300 shadow-sm hover:shadow-md" onclick="confirmLogout()">
          <i class="fa-solid fa-right-from-bracket mr-2.5"></i>
          <span>Logout</span>
        </button>
      </div>
    </aside>

    <!-- Main Content - Lebih bersih dengan gradien subtle -->
    <main class="flex-1 overflow-y-auto p-8 bg-gradient-to-br from-gray-50 to-gray-100/50">
      @yield('content')
    </main>

  </div>

</body>
</html>