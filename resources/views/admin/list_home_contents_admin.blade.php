@extends('layouts.admin')

@section('title', 'List Home Contents')

@section('content')
<!-- Content -->
<main class="flex-1 px-6 py-10">
    <div class="w-full bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
        <h2 class="text-lg font-semibold text-slate-900 mb-6">List Home Contents</h2>

        <div class="flex justify-between mb-4">
            @if($homeContents->isEmpty())
            <a href="{{ route('admin.add_home_contents_admin') }}"
                class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600">
                Add
            </a>
            @endif
        </div>


        @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
        @endif

        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-slate-900">
                    <tr>
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Section</th>
                        <th class="px-4 py-2 border">Content</th>
                        <th class="px-4 py-2 border">Action</th>
                        <th class="px-4 py-2 border">Created At</th>
                        <th class="px-4 py-2 border">Updated At</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-slate-800">
                    @foreach ($homeContents as $homeContent)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border">{{ $homeContent->id }}</td>
                        <td class="px-4 py-2 border">{{ $homeContent-> section }}</td>
                        <td class="px-4 py-2 border">{{ $homeContent->content }}</td>
                        <td class="px-4 py-2 border">{{ $homeContent-> created_at }}</td>
                        <td class="px-4 py-2 border">{{ $homeContent-> updated_at }}</td>
                        <td class="px-4 py-2 border space-x-2">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.edit_home_contents_admin', $homeContent->id) }}"
                                    class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>

                                <form action="{{ route('admin.delete_home_contents_admin', $homeContent->id) }}"
                                    method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">
                                        Delete
                                    </button>

                                </form>

                                <a href="{{ route('admin.detail_home_contents_admin', $homeContent->id) }}"
                                    class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('form[method="POST"]').forEach(form => {
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