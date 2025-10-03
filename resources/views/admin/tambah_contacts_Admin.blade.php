<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - Contacts</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function openTab(evt, tabName) {
      // Sembunyikan semua konten tab
      let tabcontent = document.getElementsByClassName("tabcontent");
      for (let i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      // Hapus style aktif
      let tablinks = document.getElementsByClassName("tablink");
      for (let i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("border-b-2","border-teal-400","text-teal-400");
      }
      // Tampilkan tab yang diklik
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.classList.add("border-b-2","border-teal-400","text-teal-400");
    }

    window.onload = function() {
      document.getElementById("defaultOpen").click(); // buka tab pertama otomatis
    }
  </script>
</head>
<body class="min-h-screen flex bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A] text-slate-100">

  <!-- Sidebar -->
  <aside class="w-64 min-h-screen bg-[#1a1f27]/95 shadow-md">
    <div class="px-6 py-6 text-lg font-bold">Dashboard Admin</div>
    <nav class="px-4 space-y-3 text-sm" x-data="{ openAuthors: true }">
      <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Dashboard</a>
      <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">HomeSelection</a>
      <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Call For Papers</a>
      <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Speakers</a>
      <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Committees</a>
      <!-- For Authors dengan submenu -->
      <div>
        <button @click="openAuthors = !openAuthors" class="flex items-center justify-between w-full px-3 py-2 rounded hover:bg-[#334155] focus:outline-none">
          <span>For Authors</span>
          <svg :class="{'rotate-90': openAuthors}" class="w-3 h-3 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
          </svg>
        </button>
        <div x-show="openAuthors" x-collapse class="ml-4 space-y-2 mt-2">
          <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Author Informations</a>
          <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Registration</a>
          <a href="#" class="block px-3 py-2 rounded text-[#00e676] font-semibold">Contacts</a>
        </div>
      </div>
      <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Events</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col">
    <!-- Header -->
    <header class="bg-[#1a1f27]/95 backdrop-blur shadow-md">
      <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
        <h1 class="text-xl font-bold">Contacts</h1>
        <div class="space-x-6 text-sm">
          <span>Selamat datang, <strong>admin123</strong></span>
          <a href="#" class="hover:underline">Lihat website</a>
          <a href="#" class="hover:underline">Logout</a>
        </div>
      </div>
    </header>

    <!-- Tabs Navigation -->
    <div class="bg-[#0F172A] px-6 py-4 flex gap-6 text-sm font-semibold border-b border-slate-700">
      <button id="defaultOpen" class="tablink text-slate-300 hover:text-white" onclick="openTab(event, 'Messages')">Messages</button>
      <button class="tablink text-slate-300 hover:text-white" onclick="openTab(event, 'Locations')">Map Locations</button>
      <button class="tablink text-slate-300 hover:text-white" onclick="openTab(event, 'Infos')">Contact Infos</button>
    </div>

    <!-- Content Tabs -->
    <main class="flex-1 px-6 py-10 space-y-10">


      <!-- Messages -->
      <div id="Messages" class="tabcontent hidden">
        <div class="bg-white shadow-md rounded-lg p-6">
          <h2 class="text-lg font-semibold text-gray-800 mb-4">Daftar Contact Messages</h2>
          <a href="{{ route('admin.contacts.tambah') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Tambah</a>
          <table class="w-full border-collapse">
            <thead class="bg-gray-200 text-gray-700">
              <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Message</th>
                <th class="px-4 py-2 border">Created At</th>
                <th class="px-4 py-2 border">Updated At</th>
                <th class="px-4 py-2 border">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr class="hover:bg-gray-100 text-gray-800">
                <td class="px-4 py-2 border">1</td>
                <td class="px-4 py-2 border">Budi</td>
                <td class="px-4 py-2 border">budi@example.com</td>
                <td class="px-4 py-2 border">Halo Admin</td>
                <td class="px-4 py-2 border">2025-10-03 09:00:00</td>
                <td class="px-4 py-2 border">2025-10-03 09:30:00</td>
                <td class="px-4 py-2 border space-x-2">
                  <button class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Edit</button>
                  <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                  <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Detail</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Map Locations -->
      <div id="Locations" class="tabcontent hidden">
        <div class="bg-white shadow-md rounded-lg p-6">
          <h2 class="text-lg font-semibold text-gray-800 mb-4">Daftar Map Locations</h2>
          <a href="{{ route('admin.contacts.tambah') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Tambah</a>
          <table class="w-full border-collapse">
            <thead class="bg-gray-200 text-gray-700">
              <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Title</th>
                <th class="px-4 py-2 border">Link</th>
                <th class="px-4 py-2 border">Created At</th>
                <th class="px-4 py-2 border">Updated At</th>
                <th class="px-4 py-2 border">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr class="hover:bg-gray-100 text-gray-800">
                <td class="px-4 py-2 border">1</td>
                <td class="px-4 py-2 border">Lokasi Kampus</td>
                <td class="px-4 py-2 border"><a href="http://maps.example.com" class="text-blue-600">http://maps.example.com</a></td>
                <td class="px-4 py-2 border">2025-10-02 08:00:00</td>
                <td class="px-4 py-2 border">2025-10-02 08:30:00</td>
                <td class="px-4 py-2 border space-x-2">
                  <button class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Edit</button>
                  <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                  <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Detail</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Contact Infos -->
      <div id="Infos" class="tabcontent hidden">
        <div class="bg-white shadow-md rounded-lg p-6">
          <h2 class="text-lg font-semibold text-gray-800 mb-4">Daftar Contact Infos</h2>
          <a href="{{ route('admin.contacts.tambah') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Tambah</a>
          <table class="w-full border-collapse">
            <thead class="bg-gray-200 text-gray-700">
              <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Type</th>
                <th class="px-4 py-2 border">Title</th>
                <th class="px-4 py-2 border">Value</th>
                <th class="px-4 py-2 border">Created At</th>
                <th class="px-4 py-2 border">Updated At</th>
                <th class="px-4 py-2 border">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr class="hover:bg-gray-100 text-gray-800">
                <td class="px-4 py-2 border">1</td>
                <td class="px-4 py-2 border">Email</td>
                <td class="px-4 py-2 border">Support</td>
                <td class="px-4 py-2 border">support@example.com</td>
                <td class="px-4 py-2 border">2025-10-01 14:00:00</td>
                <td class="px-4 py-2 border">2025-10-01 14:20:00</td>
                <td class="px-4 py-2 border space-x-2">
                  <button class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Edit</button>
                  <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                  <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Detail</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </main>
  </div>
</body>
</html>
