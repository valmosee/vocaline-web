@extends('layout.admin')

@section('content')
<section>
    <!-- Main Content -->
    <main class="flex-1 p-8 space-y-6 bg-gray-100 overflow-y-auto">

      <!-- Dashboard Page -->
      <div id="dashboard" class="page-content">
        <h1 class="text-2xl font-bold">DASHBOARD ADMIN</h1>

        <!-- Summary Cards -->
        <div class="flex gap-6">
            <div class="bg-white w-[130px] h-[90px] rounded-lg border border-gray-300 shadow flex flex-col items-center justify-center">
            <div class="text-2xl font-bold">34</div>
            <div class="text-xs text-gray-500">Anggota</div>
            </div>
            <div class="bg-white w-[130px] h-[90px] rounded-lg border border-gray-300 shadow flex flex-col items-center justify-center">
            <div class="text-2xl font-bold">12</div>
            <div class="text-xs text-gray-500">Event Terlaksana</div>
            </div>
        </div>
            <div class="bg-white rounded-lg border border-gray-300 shadow p-4 min-h-[200px]">

        <!-- Grid Section -->
        <div class="grid grid-cols-2 gap-6">
            <!-- Data Anggota -->
            <div class="bg-white rounded-lg border border-gray-300 shadow overflow-hidden">
            <div class="px-4 py-3 font-semibold border-b border-gray-200 text-sm">Data Anggota</div>
            <table class="w-full text-xs border-collapse">
                <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-3 py-2">Nama</th>
                    <th class="px-3 py-2">Angkatan</th>
                    <th class="px-3 py-2">NRP</th>
                </tr>
                </thead>
                <tbody>
                <tr><td class="px-3 py-2">Lana Del Rey</td><td>2023</td><td>B11230123</td></tr>
                <tr><td class="px-3 py-2">Sabrina C</td><td>2022</td><td>D11220024</td></tr>
                <tr><td class="px-3 py-2">Olivia Rodrigo</td><td>2022</td><td>D11220011</td></tr>
                </tbody>
            </table>
            </div>

            <!-- Grafik Peringkatan -->
            <div class="bg-white rounded-lg border border-gray-300 shadow p-4 min-h-[200px]">
              <div class="font-semibold text-sm mb-2">Grafik Peringkatan</div>
              <div class="space-y-2 text-xs">
                  <div><b>Safari</b><br>Halo, keren banget. Bener-bener mengisi acara ini. Semangat terus ya!</div>
                  <div><b>JawaPos Healthy Lifestyle</b><br>Thankyou sudah mengisi acara kami! Sukses terus VG🥰</div>
                  <div><b>SPARK</b><br>Aransemen yang asik!!</div>
              </div>
            </div>

            <!-- Pengumuman -->
            <div class="bg-white rounded-lg border border-gray-300 shadow p-4 min-h-[200px]">
              <div class="font-semibold text-sm mb-2">Pengumuman Terbaru</div>
              <p class="text-xs mb-2">Halo, VG-ers!<br>GradCon akan diselenggarakan pada:</p>
              <ul class="text-xs space-y-1">
                  <li><i class="fa-regular fa-calendar mr-2"></i>31 Mei 2025</li>
                  <li><i class="fa-solid fa-door-open mr-2"></i>Q10.02</li>
                  <li><i class="fa-regular fa-clock mr-2"></i>14.50 - selesai</li>
              </ul>
            </div>

            <!-- Daftar Event -->
            <div class="bg-white rounded-lg border border-gray-300 shadow overflow-hidden">
              <div class="px-4 py-3 font-semibold border-b border-gray-200 text-sm">Daftar Event</div>
              <table class="w-full text-xs border-collapse">
                  <thead>
                  <tr class="bg-gray-200 text-left">
                      <th class="px-3 py-2">Nama</th>
                      <th class="px-3 py-2">Tanggal</th>
                      <th class="px-3 py-2">Singer</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr><td class="px-3 py-2">Dies Natalis...</td><td>28-05-2025</td><td>5</td></tr>
                  <tr><td class="px-3 py-2">Phygital</td><td>16-05-2025</td><td>1</td></tr>
                  <tr><td class="px-3 py-2">Epiclar: The...</td><td>25-04-2025</td><td>3</td></tr>
                  </tbody>
              </table>
            </div>
        </div>
      </div>

      <!-- Manajemen Akun Page -->
      <div id="manajemen-akun" class="page-content hidden">
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-2xl font-bold">MANAJEMEN AKUN</h1>
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="openModal('tambah-akun')">
            <i class="fa-solid fa-plus mr-2"></i>Tambah Akun
          </button>
        </div>

        <div class="bg-white rounded-lg border border-gray-300 shadow overflow-hidden">
          <table class="w-full text-sm">
            <thead>
              <tr class="bg-gray-200 text-left">
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Username</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Role</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b">
                <td class="px-4 py-3">001</td>
                <td class="px-4 py-3">admin_vg</td>
                <td class="px-4 py-3">admin@vg.com</td>
                <td class="px-4 py-3"><span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Admin</span></td>
                <td class="px-4 py-3"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Aktif</span></td>
                <td class="px-4 py-3">
                  <button class="text-blue-500 hover:text-blue-700 mr-2" onclick="editAccount(001)">
                    <i class="fa-solid fa-edit"></i>
                  </button>
                  <button class="text-red-500 hover:text-red-700" onclick="deleteAccount(001)">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-3">002</td>
                <td class="px-4 py-3">user_vg</td>
                <td class="px-4 py-3">user@vg.com</td>
                <td class="px-4 py-3"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">User</span></td>
                <td class="px-4 py-3"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Aktif</span></td>
                <td class="px-4 py-3">
                  <button class="text-blue-500 hover:text-blue-700 mr-2" onclick="editAccount(002)">
                    <i class="fa-solid fa-edit"></i>
                  </button>
                  <button class="text-red-500 hover:text-red-700" onclick="deleteAccount(002)">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Data Anggota Page -->
      <div id="data-anggota" class="page-content hidden">
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-2xl font-bold">DATA ANGGOTA</h1>
          <div class="flex gap-2">
            <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
              <i class="fa-solid fa-download mr-2"></i>Export
            </button>
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="openModal('tambah-anggota')">
              <i class="fa-solid fa-plus mr-2"></i>Tambah Anggota
            </button>
          </div>
        </div>

        <div class="bg-white rounded-lg border border-gray-300 shadow overflow-hidden">
          <div class="p-4 border-b">
            <input type="text" placeholder="Cari anggota..." class="w-full px-3 py-2 border rounded">
          </div>
          <table class="w-full text-sm">
            <thead>
              <tr class="bg-gray-200 text-left">
                <th class="px-4 py-3">NRP</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Angkatan</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b">
                <td class="px-4 py-3">B11230123</td>
                <td class="px-4 py-3">Lana Del Rey</td>
                <td class="px-4 py-3">2023</td>
                <td class="px-4 py-3">lana@student.its.ac.id</td>
                <td class="px-4 py-3"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Aktif</span></td>
                <td class="px-4 py-3">
                  <button class="text-blue-500 hover:text-blue-700 mr-2" onclick="editMember('B11230123')">
                    <i class="fa-solid fa-edit"></i>
                  </button>
                  <button class="text-red-500 hover:text-red-700" onclick="deleteMember('B11230123')">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-3">D11220024</td>
                <td class="px-4 py-3">Sabrina C</td>
                <td class="px-4 py-3">2022</td>
                <td class="px-4 py-3">sabrina@student.its.ac.id</td>
                <td class="px-4 py-3"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Aktif</span></td>
                <td class="px-4 py-3">
                  <button class="text-blue-500 hover:text-blue-700 mr-2" onclick="editMember('D11220024')">
                    <i class="fa-solid fa-edit"></i>
                  </button>
                  <button class="text-red-500 hover:text-red-700" onclick="deleteMember('D11220024')">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Event Page -->
      <div id="event" class="page-content hidden">
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-2xl font-bold">MANAJEMEN EVENT</h1>
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="openModal('tambah-event')">
            <i class="fa-solid fa-plus mr-2"></i>Tambah Event
          </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Event Card 1 -->
          <div class="bg-white rounded-lg border border-gray-300 shadow p-4">
            <div class="flex justify-between items-start mb-3">
              <h3 class="font-semibold">Dies Natalis ITS</h3>
              <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Selesai</span>
            </div>
            <p class="text-xs text-gray-600 mb-2">28 Mei 2025</p>
            <p class="text-xs mb-3">Event perayaan ulang tahun ITS dengan berbagai pertunjukan musik.</p>
            <div class="text-xs text-gray-500 mb-3">
              <i class="fa-solid fa-users mr-1"></i>5 Singer
            </div>
            <div class="flex gap-2">
              <button class="bg-blue-500 text-white px-3 py-1 rounded text-xs hover:bg-blue-600" onclick="viewEvent('dies-natalis')">
                <i class="fa-solid fa-eye mr-1"></i>Detail
              </button>
              <button class="bg-yellow-500 text-white px-3 py-1 rounded text-xs hover:bg-yellow-600" onclick="editEvent('dies-natalis')">
                <i class="fa-solid fa-edit mr-1"></i>Edit
              </button>
            </div>
          </div>

          <!-- Event Card 2 -->
          <div class="bg-white rounded-lg border border-gray-300 shadow p-4">
            <div class="flex justify-between items-start mb-3">
              <h3 class="font-semibold">Phygital</h3>
              <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Berlangsung</span>
            </div>
            <p class="text-xs text-gray-600 mb-2">16 Mei 2025</p>
            <p class="text-xs mb-3">Event hybrid dengan tema digital transformation.</p>
            <div class="text-xs text-gray-500 mb-3">
              <i class="fa-solid fa-users mr-1"></i>1 Singer
            </div>
            <div class="flex gap-2">
              <button class="bg-blue-500 text-white px-3 py-1 rounded text-xs hover:bg-blue-600" onclick="viewEvent('phygital')">
                <i class="fa-solid fa-eye mr-1"></i>Detail
              </button>
              <button class="bg-yellow-500 text-white px-3 py-1 rounded text-xs hover:bg-yellow-600" onclick="editEvent('phygital')">
                <i class="fa-solid fa-edit mr-1"></i>Edit
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Kuesioner Page -->
      <div id="kuesioner" class="page-content hidden">
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-2xl font-bold">KUESIONER</h1>
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="openModal('buat-kuesioner')">
            <i class="fa-solid fa-plus mr-2"></i>Buat Kuesioner
          </button>
        </div>

        <div class="bg-white rounded-lg border border-gray-300 shadow overflow-hidden">
          <table class="w-full text-sm">
            <thead>
              <tr class="bg-gray-200 text-left">
                <th class="px-4 py-3">Judul</th>
                <th class="px-4 py-3">Event</th>
                <th class="px-4 py-3">Tanggal Dibuat</th>
                <th class="px-4 py-3">Responden</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b">
                <td class="px-4 py-3">Evaluasi Dies Natalis</td>
                <td class="px-4 py-3">Dies Natalis ITS</td>
                <td class="px-4 py-3">29-05-2025</td>
                <td class="px-4 py-3">15/25</td>
                <td class="px-4 py-3"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Aktif</span></td>
                <td class="px-4 py-3">
                  <button class="text-blue-500 hover:text-blue-700 mr-2" onclick="viewResponses('eval-dies')">
                    <i class="fa-solid fa-chart-bar"></i>
                  </button>
                  <button class="text-green-500 hover:text-green-700 mr-2" onclick="exportResults('eval-dies')">
                    <i class="fa-solid fa-download"></i>
                  </button>
                  <button class="text-red-500 hover:text-red-700" onclick="deleteQuestionnaire('eval-dies')">
                    <i class="fa-solid fa-trash"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Peringkat Page -->
      <div id="peringkat" class="page-content hidden">
        <h1 class="text-2xl font-bold mb-6">PERINGKAT ANGGOTA</h1>
        
        <div class="bg-white rounded-lg border border-gray-300 shadow overflow-hidden">
          <div class="p-4 border-b">
            <div class="flex gap-4">
              <select class="px-3 py-2 border rounded">
                <option>Semua Angkatan</option>
                <option>2023</option>
                <option>2022</option>
                <option>2021</option>
              </select>
              <select class="px-3 py-2 border rounded">
                <option>Berdasarkan Poin</option>
                <option>Berdasarkan Event</option>
                <option>Berdasarkan Kinerja</option>
              </select>
            </div>
          </div>
          
          <table class="w-full text-sm">
            <thead>
              <tr class="bg-gray-200 text-left">
                <th class="px-4 py-3">Rank</th>
                <th class="px-4 py-3">NRP</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Angkatan</th>
                <th class="px-4 py-3">Total Poin</th>
                <th class="px-4 py-3">Event Diikuti</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b">
                <td class="px-4 py-3">
                  <span class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs">1</span>
                </td>
                <td class="px-4 py-3">B11230123</td>
                <td class="px-4 py-3">Lana Del Rey</td>
                <td class="px-4 py-3">2023</td>
                <td class="px-4 py-3 font-bold">95</td>
                <td class="px-4 py-3">8</td>
              </tr>
              <tr class="border-b">
                <td class="px-4 py-3">
                  <span class="bg-gray-400 text-white px-2 py-1 rounded-full text-xs">2</span>
                </td>
                <td class="px-4 py-3">D11220024</td>
                <td class="px-4 py-3">Sabrina C</td>
                <td class="px-4 py-3">2022</td>
                <td class="px-4 py-3 font-bold">87</td>
                <td class="px-4 py-3">7</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Bobot Page -->
      <div id="bobot" class="page-content hidden">
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-2xl font-bold">PENGATURAN BOBOT</h1>
          <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" onclick="saveWeights()">
            <i class="fa-solid fa-save mr-2"></i>Simpan Perubahan
          </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div class="bg-white rounded-lg border border-gray-300 shadow p-6">
            <h3 class="font-semibold mb-4">Bobot Kriteria Penilaian</h3>
            <div class="space-y-4">
              <div>
                <label class="block text-sm font-medium mb-2">Kehadiran Event</label>
                <input type="range" min="0" max="100" value="30" class="w-full" onchange="updateWeight(this, 'attendance')">
                <div class="text-xs text-gray-500 mt-1">Bobot: <span id="attendance-weight">30</span>%</div>
              </div>
              <div>
                <label class="block text-sm font-medium mb-2">Kualitas Suara</label>
                <input type="range" min="0" max="100" value="25" class="w-full" onchange="updateWeight(this, 'voice')">
                <div class="text-xs text-gray-500 mt-1">Bobot: <span id="voice-weight">25</span>%</div>
              </div>
              <div>
                <label class="block text-sm font-medium mb-2">Kerjasama Tim</label>
                <input type="range" min="0" max="100" value="25" class="w-full" onchange="updateWeight(this, 'teamwork')">
                <div class="text-xs text-gray-500 mt-1">Bobot: <span id="teamwork-weight">25</span>%</div>
              </div>
              <div>
                <label class="block text-sm font-medium mb-2">Dedikasi</label>
                <input type="range" min="0" max="100" value="20" class="w-full" onchange="updateWeight(this, 'dedication')">
                <div class="text-xs text-gray-500 mt-1">Bobot: <span id="dedication-weight">20</span>%</div>
              </div>
            </div>
          </div>

          <div class="bg-white rounded-lg border border-gray-300 shadow p-6">
            <h3 class="font-semibold mb-4">Total Bobot</h3>
            <div class="text-3xl font-bold text-center" id="total-weight">100%</div>
            <div class="text-center text-sm text-gray-500 mt-2">
              <span id="weight-status" class="text-green-600">Bobot Seimbang</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Laporan Page -->
      <div id="laporan" class="page-content hidden">
        <h1 class="text-2xl font-bold mb-6">LAPORAN</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
          <div class="bg-white rounded-lg border border-gray-300 shadow p-6 text-center">
            <i class="fa-solid fa-chart-line text-3xl text-blue-500 mb-3"></i>
            <h3 class="font-semibold mb-2">Laporan Kinerja</h3>
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="generateReport('performance')">
              Generate
            </button>
          </div>
          
          <div class="bg-white rounded-lg border border-gray-300 shadow p-6 text-center">
            <i class="fa-solid fa-calendar-check text-3xl text-green-500 mb-3"></i>
            <h3 class="font-semibold mb-2">Laporan Kehadiran</h3>
            <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" onclick="generateReport('attendance')">
              Generate
            </button>
          </div>
          
          <div class="bg-white rounded-lg border border-gray-300 shadow p-6 text-center">
            <i class="fa-solid fa-trophy text-3xl text-yellow-500 mb-3"></i>
            <h3 class="font-semibold mb-2">Laporan Ranking</h3>
            <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600" onclick="generateReport('ranking')">
              Generate
            </button>
          </div>
        </div>

        <div class="bg-white rounded-lg border border-gray-300 shadow p-6">
          <h3 class="font-semibold mb-4">Riwayat Laporan</h3>
          <table class="w-full text-sm">
            <thead>
              <tr class="bg-gray-200 text-left">
                <th class="px-4

  </section>
  @endsection