<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>

  <!-- Google Fonts - Poppins (lebih modern) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- TailwindCSS & Font Awesome -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
  </style>

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
  <div class="flex h-screen">

   
    <aside class="w-[260px] bg-white border-r border-gray-200 shadow-sm flex flex-col justify-between px-6 py-8 transition-all duration-300">
     
      <a href="{{ route('admin.aprofile') }}" class="flex items-center mb-10 group">
        <div class="logo-bg text-white text-xl font-bold w-12 h-12 rounded-xl flex items-center justify-center mr-3 transition-all duration-300 group-hover:shadow-lg group-hover:scale-105">
          VG
        </div>
        <span class="font-semibold text-gray-800 text-lg tracking-tight">Admin Panel</span>
      </a>

      <!-- Navigation-->
      <nav class="flex-1 space-y-1.5">
        <a href="{{ route('admin.adashboard') }}" class="sidebar-item flex items-center px-4 py-3 rounded-xl hover:bg-indigo-50/80 {{ request()->routeIs('admin.adashboard') ? 'bg-indigo-100 font-medium text-indigo-700' : '' }}">
          <i class="fa-solid fa-gauge-high w-5 mr-3 text-indigo-500"></i>
          <span>Dashboard</span>
        </a>
        
        <a href="{{ route('admin.makun') }}" class="sidebar-item flex items-center px-4 py-3 rounded-xl hover:bg-indigo-50/80 {{ request()->routeIs('admin.makun') ? 'bg-indigo-100 font-medium text-indigo-700' : '' }}">
          <i class="fa-solid fa-users w-5 mr-3 text-blue-500"></i>
          <span>Manajemen Akun</span>
        </a>
        
        <a href="{{ route('admin.event') }}" class="sidebar-item flex items-center px-4 py-3 rounded-xl hover:bg-indigo-50/80 {{ request()->routeIs('admin.event') ? 'bg-indigo-100 font-medium text-indigo-700' : '' }}">
          <i class="fa-solid fa-calendar-check w-5 mr-3 text-emerald-500"></i>
          <span>Event</span>
        </a>
        

         <a href="{{ route('admin.event.report') }} "class="sidebar-item flex items-center px-4 py-3 rounded-xl hover:bg-indigo-50/80 cursor-pointer">
          <i class="fa-solid fa-file-lines w-5 mr-3 text-amber-500"></i>
          <span>Laporan Event</span>
         </a>
      </nav>

      <!-- Logout Button-->
      <div class="pt-6 border-t border-gray-100">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <button type="button" onclick="confirmLogout()" class="w-full flex items-center justify-center bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-medium px-5 py-2.5 rounded-xl transition-all duration-300 shadow-sm hover:shadow-md">
          <i class="fa-solid fa-right-from-bracket mr-2.5"></i>
          <span>Logout</span>
        </button>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-8 bg-gradient-to-br from-gray-50 to-gray-100/50">
      @yield('content')
    </main>

  </div>
</body>
</html>