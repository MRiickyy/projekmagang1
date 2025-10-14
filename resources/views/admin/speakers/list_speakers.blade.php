@extends('layouts.admin')

@section('title', $pageTitle ?? 'Speakers List')

@section('content')
<div class="w-full bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
    <h2 class="text-lg font-semibold text-slate-900 mb-6">
        {{ $pageTitle ?? 'Speakers List' }}
    </h2>

    <div class="flex justify-between mb-4 items-center">
        <a href="{{ route('add.speakers') }}"
            class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600">
            Add
        </a>

        <form method="GET" action="{{ url()->current() }}" class="flex gap-3 items-center">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Search by name or university..."
                class="border rounded px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-400">

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Search
            </button>
        </form>
    </div>

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
            <tbody>
                @foreach ($speakers as $speaker)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">{{ $speaker->name }}</td>
                    <td class="px-4 py-2 border">{{ $speaker->university }}</td>
                    <td class="px-4 py-2 border">{{ ucfirst($speaker->speaker_type) }}</td>
                    <td class="px-4 py-2 border">{{ Str::limit($speaker->biodata, 80) }}</td>
                    <td class="px-4 py-2 border">{{ $speaker->created_at }}</td>
                    <td class="px-4 py-2 border">{{ $speaker->updated_at }}</td>
                    <td class="px-4 py-2 border">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('edit.speakers', $speaker->slug) }}"
                                class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('delete.speakers', $speaker->slug) }}" method="POST" class="inline delete-item">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                            </form>
                            <a href="{{ route('admin.speakers.detail', $speaker->slug) }}"
                                class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">
                                Detail
                            </a>
                        </div>    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $speakers->links() }}
        </div>
    </div>
</div>
@endsection
