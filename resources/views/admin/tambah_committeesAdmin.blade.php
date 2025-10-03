<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Committees</title>
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
            <a href="#" class="block px-3 py-2 rounded text-[#00e676] font-semibold">Committees</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">For Authors</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Events</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-[#1a1f27]/95 backdrop-blur shadow-md">
            <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
                <h1 class="text-xl font-bold">Committees</h1>
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
                <h2 class="text-lg font-semibold text-slate-900 mb-6">Daftar Committees</h2>

                <!-- Tombol Tambah & Cetak -->
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
                                <th class="px-4 py-2 border">Name</th>
                                <th class="px-4 py-2 border">Role</th>
                                <th class="px-4 py-2 border">University</th>
                                <th class="px-4 py-2 border">Country</th>
                                <th class="px-4 py-2 border">Type</th>
                                <th class="px-4 py-2 border">Created At</th>
                                <th class="px-4 py-2 border">Updated At</th>
                                <th class="px-4 py-2 border">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white text-slate-800">
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border">1</td>
                                <td class="px-4 py-2 border">Prof. John Doe</td>
                                <td class="px-4 py-2 border">Chair</td>
                                <td class="px-4 py-2 border">MIT</td>
                                <td class="px-4 py-2 border">USA</td>
                                <td class="px-4 py-2 border">International</td>
                                <td class="px-4 py-2 border">2025-09-25 10:00:00</td>
                                <td class="px-4 py-2 border">2025-09-27 09:12:00</td>
                                <td class="px-4 py-2 border space-x-2">
                                    <a href="#" class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>
                                    <a href="#" class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</a>
                                    <a href="#" class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border">2</td>
                                <td class="px-4 py-2 border">Dr. Jane Smith</td>
                                <td class="px-4 py-2 border">Member</td>
                                <td class="px-4 py-2 border">UAD</td>
                                <td class="px-4 py-2 border">Indonesia</td>
                                <td class="px-4 py-2 border">Local</td>
                                <td class="px-4 py-2 border">2025-09-26 11:30:00</td>
                                <td class="px-4 py-2 border">2025-09-27 09:30:00</td>
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
