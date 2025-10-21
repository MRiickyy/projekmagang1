@extends('layouts.admin')

@section('title', ucfirst($type ?? 'All') . ' Speakers')

@section('content')
<div class="w-full bg-[#F2F6F9] shadow-md rounded-lg p-6 overflow-x-auto">
    <h2 class="text-lg font-semibold text-slate-900 mb-6">
        {{ ucfirst($type ?? 'All') }} Speakers
    </h2>

    <!-- Tombol Tambah & Search -->
    <div class="flex justify-between mb-4 items-center">
        <!-- Tombol Tambah -->
        <a href="{{ route('add.speakers') }}"
            class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600">
            Add
        </a>

        <!-- Form Search -->
        <form method="GET" action="{{ url()->current() }}" class="flex gap-3 items-center">
            <div class="relative w-64">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                    </svg>
                </span>

                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search by name or university..."
                    class="border rounded px-10 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Search
            </button>
        </form>
    </div>

    <!-- Tabel -->
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-gray-200 text-slate-900">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">University</th>
                    <th class="px-4 py-2 border">Type</th>
                    <th class="px-4 py-2 border">Biodata</th>
                    <th class="px-4 py-2 border">Created At</th>
                    <th class="px-4 py-2 border">Updated At</th>
                    <th class="px-4 py-2 border">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white text-slate-800">
                @forelse ($speakers as $speaker)
                <tr class="hover:bg-gray-100 transition">
                    <td class="px-4 py-2 border text-center">
                        {{ $loop->iteration + ($speakers->currentPage() - 1) * $speakers->perPage() }}
                    </td>
                    <td class="px-4 py-2 border">{{ $speaker->name }}</td>
                    <td class="px-4 py-2 border">{{ $speaker->university }}</td>
                    <td class="px-4 py-2 border capitalize">{{ $speaker->speaker_type }}</td>
                    <td class="px-4 py-2 border">{{ Str::limit($speaker->biodata, 80) }}</td>
                    <td class="px-4 py-2 border">{{ $speaker->created_at->format('Y-m-d') }}</td>
                    <td class="px-4 py-2 border">{{ $speaker->updated_at->format('Y-m-d') }}</td>
                    <td class="px-4 py-2 border">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('edit.speakers', $speaker->slug) }}"
                                class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600 transition">
                                Edit
                            </a>

                            <form action="{{ route('delete.speakers', $speaker->slug) }}"
                                method="POST" class="inline delete-item">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </form>

                            <a href="{{ route('admin.speakers.detail', $speaker->slug) }}"
                                class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600 transition">
                                Detail
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4 text-gray-500">
                        No speakers found for {{ ucfirst($type ?? 'All') }}.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $speakers->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection