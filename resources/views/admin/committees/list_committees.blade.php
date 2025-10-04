@extends('layouts.admin')

@section('title', 'List Committees')

@section('content')
<!-- Content -->
<div class="w-full bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
    <h2 class="text-lg font-semibold text-slate-900 mb-6">List Committees</h2>

    <!-- Tombol Tambah & Cetak -->
    <div class="flex justify-between mb-4 items-center">
        <!-- Tombol Tambah -->
        <a href="{{ route('add.committees') }}"
            class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600">
            Add Committee
        </a>

        <!-- Form Filter -->
        <form method="GET" action="{{ route('admin.committees') }}" class="flex gap-3 items-center">
            <div class="relative w-64">
                <!-- Icon Search -->
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                    </svg>
                </span>

                <!-- Input -->
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search by name or university..."
                    class="border rounded px-10 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Dropdown -->
            <select name="type" class="border rounded px-3 py-2">
                <option value="">-- All Types --</option>
                <option value="steering" {{ request()->get('type') == 'steering' ? 'selected' : '' }}>Steering</option>
                <option value="technical program" {{ request()->get('type') == 'technical program' ? 'selected' : '' }}>Technical Program</option>
                <option value="organizing" {{ request()->get('type') == 'organizing' ? 'selected' : '' }}>Organizing</option>
            </select>

            <!-- Button -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Filter
            </button>
        </form>
    </div>

    <!-- Tabel -->
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-gray-200 text-slate-900">
                <tr>
                    <th class="px-4 py-2 border">#</th>
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
                @foreach ($committees as $index => $committee)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $loop->iteration + ($committees->currentPage() - 1) * $committees->perPage() }}</td>
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

        <!-- Pagination -->
        <div class="mt-4">
            {{ $committees->links() }}
        </div>
    </div>
</div>
@endsection