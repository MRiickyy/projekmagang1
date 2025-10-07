@extends('layouts.admin')

@section('title', 'List Call For Papers')

@section('content')

<!-- Main Content -->
<div class="flex-1 flex flex-col">
    @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
    @endif
    <!-- Content Section -->
    <div class="p-6">
        <div class="w-full bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
            <h2 class="text-lg font-semibold text-slate-900 mb-6">Call For Papers List</h2>
            <a href="{{ route('admin.add_callpaper_Admin') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add</a>

            <!-- Table -->
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="w-full border-collapse border border-gray-300 table-auto">
                    <thead class="bg-gray-200 text-slate-900">
                        <tr>
                            <th class="px-4 py-2 border border-gray-300">ID</th>
                            <th class="px-4 py-2 border border-gray-300">Section</th>
                            <th class="px-4 py-2 border border-gray-300">Title</th>
                            <th class="px-4 py-2 border border-gray-300">Content</th>
                            <th class="px-4 py-2 border border-gray-300 whitespace-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-slate-800">
                        @foreach($callPapers as $call)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border border-gray-300 text-center">{{ $call->id }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $call->section }}</td>
                            <td class="px-4 py-2 border border-gray-300 font-semibold">{{ $call->title }}</td>
                            <td class="px-4 py-2 border border-gray-300">
                                @if($call->content)
                                <ul class="list-disc list-inside">
                                    @foreach(explode("\n", $call->content) as $line)
                                    <li>{{ $line }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </td>
                            <td class="px-4 py-2 border border-gray-300 text-center space-x-2">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.edit_callpaper_Admin', $call->id) }}"
                                        class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>

                                    <form action="{{ route('admin.delete_callpaper_Admin', $call->id) }}" method="POST"
                                        class="inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">
                                            Delete
                                        </button>
                                    </form>


                                    <a href="{{ route('admin.show_callpaper_Admin', $call->id) }}"
                                        class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure you want to delete?',
            text: "This data will be permanently deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endsection