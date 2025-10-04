@extends('layouts.admin')

@section('title', 'List Committees')

@section('content')
<!-- Content -->
<div class="w-full bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
    <h2 class="text-lg font-semibold text-slate-900 mb-6">List Committees</h2>

    <!-- Tombol Tambah & Cetak -->
    <div class="flex justify-between mb-4">
        <a href="{{ route('add.committees') }}" class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600">Tambah</a>
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
                @foreach ($committees as $committee)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $committee->id }}</td>
                    <td class="px-4 py-2 border">{{ $committee->name }}</td>
                    <td class="px-4 py-2 border">{{ $committee->role }}</td>
                    <td class="px-4 py-2 border">{{ $committee->university }}</td>
                    <td class="px-4 py-2 border">{{ $committee->country }}</td>
                    <td class="px-4 py-2 border">{{ $committee->type }}</td>
                    <td class="px-4 py-2 border">{{ $committee->created_at }}</td>
                    <td class="px-4 py-2 border">{{ $committee->updated_at }}</td>
                    <td class="px-4 py-2 border">
                        <div class="flex justify-center gap-2">
                            <a href="#"
                                class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>
                            <form action="#" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                            </form>
                            <a href="#"
                                class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection