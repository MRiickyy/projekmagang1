@extends('layouts.admin')

@section('title', 'List Author Information')

@section('content')

<div class="flex-1 flex flex-col">

    <main class="flex-1 px-6 py-10 space-y-10">

        <div class="bg-[#F2F6F9] shadow-md rounded-lg p-6 overflow-x-auto">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Author Information List</h2>

            <a href="{{ route('admin.forauthor.add_authorinformation_admin') }}"
                class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 mb-4 inline-block">Add</a>

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
                    @php $no = 1; @endphp
                    @foreach ($authorInfos as $info)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border">{{ $no++ }}</td>
                        <td class="px-4 py-2 border">{{ $info->section }}</td>
                        <td class="px-4 py-2 border">{{ $info->content }}</td>
                        <td class="px-4 py-2 border">{{ $info->created_at }}</td>
                        <td class="px-4 py-2 border">{{ $info->updated_at }}</td>

                        <td class="px-4 py-2 border">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.forauthor.edit_authorinformation_admin', $info->id) }}"
                                    class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>

                                <form action="{{ route('admin.forauthor.delete_authorinformation_admin', $info->id) }}"
                                    method="POST" class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                                </form>

                                <a href="{{ route('admin.forauthor.detail_authorinformation_admin', $info->id) }}"
                                    class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>

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
