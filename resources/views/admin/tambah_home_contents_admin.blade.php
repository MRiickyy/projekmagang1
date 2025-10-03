@extends('layouts.admin.master')

@section('title', 'List Home Contents')

@section('content')
<!-- Content -->
<main class="flex-1 px-6 py-10">
    <div class="w-full bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
        <h2 class="text-lg font-semibold text-slate-900 mb-6">Daftar Home Contents</h2>

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
                        <th class="px-4 py-2 border">Section</th>
                        <th class="px-4 py-2 border">Content</th>
                        <th class="px-4 py-2 border">Created At</th>
                        <th class="px-4 py-2 border">Updated At</th>
                        <th class="px-4 py-2 border">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-slate-800">
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border">1</td>
                        <td class="px-4 py-2 border">Hero</td>
                        <td class="px-4 py-2 border">Selamat datang di konferensi kami</td>
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
                        <td class="px-4 py-2 border">About</td>
                        <td class="px-4 py-2 border">Tentang acara ini...</td>
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
@endsection