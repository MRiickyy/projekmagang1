@extends('layouts.admin.master')

@section('title', 'List Home Contents')

@section('content')
<!-- Content -->
<main class="flex-1 px-6 py-10">
    <div class="w-full bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
        <h2 class="text-lg font-semibold text-slate-900 mb-6">Daftar Home Contents</h2>

        <!-- Tombol Tambah & Cetak -->
        <div class="flex justify-between mb-4">
            <a href="#" class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600">Tambah</a>

        </div>

        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-slate-900">
                    <tr>
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Section</th>
                        <th class="px-4 py-2 border">Content</th>
                        <th class="px-4 py-2 border">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-slate-800">
                    @foreach ($homeContents as $homeContent)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border">{{ $homeContent->id }}</td>
                        <td class="px-4 py-2 border">{{ $homeContent-> section }}</td>
                        <td class="px-4 py-2 border">{{ $homeContent->content }}</td>
                        <td class="px-4 py-2 border space-x-2">
                            <a href="#" class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>
                            <form action="#" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                            </form>
                            <a href="#" class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</main>
@endsection