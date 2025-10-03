<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - Contacts</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
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
        <button @click="openAuthors = !openAuthors" 
                class="flex items-center justify-between w-full px-3 py-2 rounded hover:bg-[#334155] focus:outline-none">
          <span>For Authors</span>
          <svg :class="{'rotate-90': openAuthors}" 
               class="w-3 h-3 transition-transform" fill="none" 
               stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
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

    <!-- Content -->
    <main class="flex-1 px-6 py-10 flex justify-center">
      <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800" 
           x-data="{ section: '' }">
        <h2 class="text-lg font-semibold text-slate-900 mb-6">Tambah Kontak</h2>

        <form action="{{ url('/admin/contacts/store') }}" method="POST" class="space-y-5">
          @csrf

          <!-- Pilih Section -->
          <div>
            <label class="block text-sm font-bold text-slate-900 mb-2">Section</label>
            <select name="section" x-model="section"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" required>
              <option value="">-- Pilih Section --</option>
              <option value="create_contact_messages">create_contact_messages</option>
              <option value="create_contact_infos">create_contact_infos</option>
              <option value="create_map_locations_table">create_map_locations</option>
            </select>
          </div>

          <!-- create_contact_messages -->
          <div x-show="section === 'create_contact_messages'" x-cloak>
            <div>
              <label class="block text-sm font-bold text-slate-900 mb-2">Name</label>
              <input type="text" name="name" class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
            </div>
            <div>
              <label class="block text-sm font-bold text-slate-900 mb-2">Email</label>
              <input type="email" name="email" class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
            </div>
            <div>
              <label class="block text-sm font-bold text-slate-900 mb-2">Message</label>
              <textarea name="message" class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"></textarea>
            </div>
          </div>

          <!-- create_contact_infos -->
          <div x-show="section === 'create_contact_infos'" x-cloak>
            <div>
              <label class="block text-sm font-bold text-slate-900 mb-2">Type</label>
              <input type="text" name="type" class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
            </div>
            <div>
              <label class="block text-sm font-bold text-slate-900 mb-2">Title</label>
              <input type="text" name="title" class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
            </div>
            <div>
              <label class="block text-sm font-bold text-slate-900 mb-2">Value</label>
              <input type="text" name="value" class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
            </div>
          </div>

          <!-- create_map_locations_table -->
          <div x-show="section === 'create_map_locations_table'" x-cloak>
            <div>
              <label class="block text-sm font-bold text-slate-900 mb-2">Title</label>
              <input type="text" name="title" class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
            </div>
            <div>
              <label class="block text-sm font-bold text-slate-900 mb-2">Link</label>
              <input type="text" name="link" class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
            </div>
          </div>

          <!-- Buttons -->
          <div class="flex justify-end gap-3 pt-4">
            <button type="reset" 
                    class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
              Batal
            </button>
            <button type="submit" 
                    class="px-6 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md">
              Simpan
            </button>
          </div>
        </form>
      </div>
    </main>
  </div>
</body>
</html>
