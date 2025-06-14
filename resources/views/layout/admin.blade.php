<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
<body class="bg-[#F7F7F7] font-sans text-sm">
  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-[220px] bg-[#D9D9D9] p-5 flex flex-col items-start">
    <a href="{{ route('peserta.profile') }}" class="flex items-center mb-6">
      <div class="bg-[#F7931E] text-white font-bold w-10 h-10 rounded-full flex items-center justify-center mr-3 hover:opacity-80 transition">
        VG
      </div>
</a>

      <nav class="w-full space-y-2">

        {{-- <form action="{{ route('views.admin.dashboard') }}" method="POST" class="space-y-5">
          <div class="nav-item py-2 px-4 rounded hover:bg-[#BDBDBD] cursor-pointer" data-page="dashboard">Dashboard</div>
        </form>

        <form action="{{ route('views.admin.makun') }}" method="POST" class="space-y-5">
          @csrf
          <div class="nav-item py-2 px-4 rounded hover:bg-[#BDBDBD] cursor-pointer" data-page="manajemen-akun">Manajemen Akun</div>
        </form> --}}

      <a href="{{ route('admin.adashboard') }}" class="nav-item py-2 px-4 rounded hover:bg-[#BDBDBD] cursor-pointer block">Dashboard</a>
      <a href="{{ route('admin.makun') }}" class="nav-item py-2 px-4 rounded hover:bg-[#BDBDBD] cursor-pointer block">Manajemen Akun</a>
      <a href="{{ route('admin.event') }}" class="nav-item py-2 px-4 rounded hover:bg-[#BDBDBD] cursor-pointer block">Event</a>

        <div class="nav-item py-2 px-4 rounded hover:bg-[#BDBDBD] cursor-pointer" data-page="peringkat">Peringkat</div>
        <div class="nav-item py-2 px-4 rounded hover:bg-[#BDBDBD] cursor-pointer" data-page="laporan">Laporan</div>
        <div class="nav-item py-2 px-4 rounded hover:bg-[#BDBDBD] cursor-pointer" data-page="pengaturan">Pengaturan</div>
        <!-- Tombol logout -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        
        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="confirmLogout()">
          <i class="fa-solid fa-right-from-bracket mr-2"></i>Logout
        </button>

    </form>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-auto p-5">
      @yield('content')  <!-- Ini adalah bagian yang akan diisi oleh child views -->
    </main>

  </div>
</body>
</html>