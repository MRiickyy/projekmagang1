<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Author Informations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A] text-slate-100">

    <!-- Sidebar -->
    <aside class="w-64 min-h-screen bg-[#1a1f27]/95 shadow-md">
        <div class="px-6 py-6 text-lg font-bold">Dashboard Admin</div>
        <nav class="px-4 space-y-3 text-sm">

            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Dashboard</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">HomeSelection</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Call For Papers</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Speakers</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Committees</a>

            <!-- For Authors with submenu -->
            <div x-data="{ open: true }" class="space-y-1">
                <button @click="open = !open" 
                    class="w-full flex justify-between items-center px-3 py-2 rounded hover:bg-[#334155]">
                    <span>For Authors</span>
                    <svg :class="{'rotate-180': open}" class="w-4 h-4 transform transition-transform" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="ml-4 space-y-1">
                    <a href="/author-informations" class="block px-3 py-2 rounded text-[#00e676] font-semibold">Author Informations</a>
                    <a href="/registrations" class="block px-3 py-2 rounded hover:bg-[#334155]">Registrations</a>
                    <a href="/contacts" class="block px-3 py-2 rounded hover:bg-[#334155]">Contacts</a>
                </div>
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
                <h1 class="text-xl font-bold">Author Informations</h1>
                <div class="space-x-6 text-sm">
                    <span>Selamat datang, <strong>admin123</strong></span>
                    <a href="#" class="hover:underline">Lihat website</a>
                    <a href="#" class="hover:underline">Logout</a>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 px-6 py-10">
            <div class="w-full bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
                <h2 class="text-lg font-semibold text-slate-900 mb-6">Daftar Author Informations</h2>

                <!-- Tombol Tambah -->
                <div class="flex justify-between mb-4">
                    <a href="#" 
                       class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600">Tambah</a>
                </div>

                <!-- Tabel -->
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                        <thead class="bg-gray-200 text-slate-900">
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Title</th>
                                <th class="px-4 py-2 border">CTA Text</th>
                                <th class="px-4 py-2 border">CTA Button</th>
                                <th class="px-4 py-2 border">CTA Link</th>
                                <th class="px-4 py-2 border">Intro Paragraph</th>
                                <th class="px-4 py-2 border">Submission Link</th>
                                <th class="px-4 py-2 border">Selection Process</th>
                                <th class="px-4 py-2 border">Preparation</th>
                                <th class="px-4 py-2 border">Non Presented Policy</th>
                                <th class="px-4 py-2 border">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white text-slate-800">
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border">1</td>
                                <td class="px-4 py-2 border">AUTHOR INFORMATION</td>
                                <td class="px-4 py-2 border">Authors are requested...</td>
                                <td class="px-4 py-2 border">Download Slide Format</td>
                                <td class="px-4 py-2 border">http://example.com/slide</td>
                                <td class="px-4 py-2 border">Intro paragraph content</td>
                                <td class="px-4 py-2 border">http://submission-link.com</td>
                                <td class="px-4 py-2 border">Process content</td>
                                <td class="px-4 py-2 border">Preparation content</td>
                                <td class="px-4 py-2 border">Policy content</td>
                                <td class="px-4 py-2 border space-x-2">
                                    <a href="#" class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>
                                    <a href="#" class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</a>
                                    <a href="#" class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
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
