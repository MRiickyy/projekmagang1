<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Home Selection</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A] text-slate-100">

    <!-- Sidebar -->
    <aside class="w-64 min-h-screen bg-[#1a1f27]/95 shadow-md">
        <div class="px-6 py-6 text-lg font-bold">Dashboard Admin</div>
        <nav class="px-4 space-y-3 text-sm">
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Dashboard</a>
            <a href="#" class="block px-3 py-2 rounded text-[#00e676] font-semibold">HomeSelection</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Call For Papers</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Speakers</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Committees</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">For Authors</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Events</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-[#1a1f27]/95 backdrop-blur shadow-md">
            <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
                <h1 class="text-xl font-bold">Home Selection</h1>
                <div class="space-x-6 text-sm">
                    <span>Selamat datang, <strong>admin123</strong></span>
                    <a href="#" class="hover:underline">Lihat website</a>
                    <a href="#" class="hover:underline">Logout</a>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 px-6 py-10 flex justify-center">
            <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
                <h2 class="text-lg font-semibold text-slate-900 mb-6">Informasi Konten</h2>

                <form action="#" method="POST" class="space-y-5">
                    @csrf

                    <!-- Dropdown Selection -->
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-2">Selection</label>
                        <select name="section" class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                            <option value="">-- Pilih Section --</option>
                            <option value="welcome_tracks_intro">welcome_tracks_intro</option>
                            <option value="welcome_tracks">welcome_tracks</option>
                            <option value="welcome_tracks_footer">welcome_tracks_footer</option>
                            <option value="welcome_prev_title">welcome_prev_title</option>
                            <option value="icoict_link_2013">icoict_link_2013</option>
                            <option value="icoict_link_2014">icoict_link_2014</option>
                            <option value="icoict_link_2015">icoict_link_2015</option>
                            <option value="icoict_link_2024">icoict_link_2024</option>
                            <option value="speakers_keynote_title">speakers_keynote_title</option>
                            <option value="speakers_keynote_text">speakers_keynote_text</option>
                            <option value="speakers_tutorial_title">speakers_tutorial_title</option>
                            <option value="speakers_tutorial_text">speakers_tutorial_text</option>
                        </select>
                    </div>

                    <!-- Content -->
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-1">Content</label>
                        <textarea name="content" rows="4" class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"></textarea>
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



