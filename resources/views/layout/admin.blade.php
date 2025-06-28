<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>

  <!-- TailwindCSS & Font Awesome -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- SweetAlert Logout -->
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
  <div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-[240px] bg-white border-r shadow-md flex flex-col justify-between px-6 py-8">
      <!-- Logo -->
      <a href="{{ route('admin.aprofile') }}" class="flex items-center mb-8">
        <div class="bg-orange-500 text-white text-lg font-bold w-10 h-10 rounded-full flex items-center justify-center mr-3 hover:opacity-90">
          VG
        </div>
        <span class="font-semibold text-gray-700">Admin</span>
      </a>

      <!-- Navigation -->
      <nav class="flex-1 space-y-2 text-sm">
        <a href="{{ route('admin.adashboard') }}" class="block px-4 py-2 rounded-md hover:bg-indigo-100 {{ request()->routeIs('admin.adashboard') ? 'bg-indigo-200 font-semibold' : '' }}">
          <i class="fa-solid fa-gauge-high mr-2"></i> Dashboard
        </a>
        <a href="{{ route('admin.makun') }}" class="block px-4 py-2 rounded-md hover:bg-indigo-100 {{ request()->routeIs('admin.makun') ? 'bg-indigo-200 font-semibold' : '' }}">
          <i class="fa-solid fa-users mr-2"></i> Manajemen Akun
        </a>
        <a href="{{ route('admin.event') }}" class="block px-4 py-2 rounded-md hover:bg-indigo-100 {{ request()->routeIs('admin.event') ? 'bg-indigo-200 font-semibold' : '' }}">
          <i class="fa-solid fa-calendar-check mr-2"></i> Event
        </a>
        <a href="{{ route('admin.event') }}" class="block px-4 py-2 rounded-md hover:bg-indigo-100">
          <i class="fa-solid fa-check-circle mr-2"></i> Approval Kandidat
        </a>
        {{-- <div class="block px-4 py-2 rounded-md hover:bg-indigo-100 cursor-pointer">
          <i class="fa-solid fa-ranking-star mr-2"></i> Peringkat
        </div> --}}
        <div class="block px-4 py-2 rounded-md hover:bg-indigo-100 cursor-pointer">
          <i class="fa-solid fa-file-lines mr-2"></i> Laporan
        </div>
      </nav>

      <!-- Logout -->
      <div class="pt-6">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <button type="button" class="w-full flex items-center justify-center bg-red-500 hover:bg-red-600 text-white font-medium px-4 py-2 rounded-md transition" onclick="confirmLogout()">
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
