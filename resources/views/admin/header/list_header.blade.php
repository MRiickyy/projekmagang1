@extends('layouts.admin')

@section('title', 'List Header')

@section('content')
<div class="flex-1 flex flex-col">

    <main class="flex-1 px-6 py-10 space-y-10">

        <div class="bg-[#F2F6F9] shadow-md rounded-lg p-6 overflow-x-auto">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">
                Header List ({{ $event->year }})
            </h2>

            <!-- Tombol Add -->
            <a href="{{ route('admin.header.add_header') }}"
                class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 mb-4 inline-block">
                Add
            </a>

            <!-- Table -->
            <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-slate-900">
                    <tr>
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">Event Name</th>
                        <th class="px-4 py-2 border">Year</th>
                        <th class="px-4 py-2 border">Main Title</th>
                        <th class="px-4 py-2 border">Subtitle</th>
                        <th class="px-4 py-2 border">Location</th>
                        <th class="px-4 py-2 border">Date Range</th>
                        <th class="px-4 py-2 border">Register Link</th>
                        <th class="px-4 py-2 border">Submit Link</th>
                        <th class="px-4 py-2 border">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-slate-800">
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border">1</td>
                        <td class="px-4 py-2 border">{{ $event->name }}</td>
                        <td class="px-4 py-2 border">{{ $event->year }}</td>
                        <td class="px-4 py-2 border">{{ $event->main_title }}</td>
                        <td class="px-4 py-2 border">{{ $event->subtitle }}</td>
                        <td class="px-4 py-2 border">{{ $event->location }}</td>
                        <td class="px-4 py-2 border">{{ $event->date_range }}</td>
                        <td class="px-4 py-2 border">{{ $event->register_link }}</td>
                        <td class="px-4 py-2 border">{{ $event->submit_link }}</td>

                        <td class="px-4 py-2 border">
                            <div class="flex justify-center gap-2">
                                <!-- Edit -->
                                <a href="{{ route('admin.header.edit_header', $event->id) }}"
                                    class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">
                                    Edit
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('admin.header.delete_header', $event->id) }}" method="POST"
                                    class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>

                                <!-- Detail -->
                                <a href="{{ route('admin.header.detail_header', $event->id) }}"
                                    class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">
                                    Detail
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</div>

<!-- Konfirmasi Delete -->
<script>
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "This data will be permanently deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete!',
            cancelButtonText: 'Cancel'
        }).then(result => {
            if (result.isConfirmed) form.submit();
        });
    });
});
</script>
@endsection
