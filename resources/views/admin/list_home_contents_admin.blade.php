@extends('layouts.admin')

@section('title', 'List Home Contents & Timeline')

@section('content')

<div class="flex-1 flex flex-col">

    <!-- Tabs Navigation -->
    <div class="px-6 py-3 flex gap-4 text-sm font-semibold border-b border-slate-700">
        <button id="defaultOpen"
            class="tablink px-4 py-2 rounded-t-md border-b-2 border-transparent text-slate-300 hover:text-white hover:border-teal-400 transition-all"
            onclick="openTab(event, 'HomeContents')">Home Contents</button>
        <button
            class="tablink px-4 py-2 rounded-t-md border-b-2 border-transparent text-slate-300 hover:text-white hover:border-teal-400 transition-all"
            onclick="openTab(event, 'Timeline')">Timeline</button>
    </div>

    <!-- Content Tabs -->
    <main class="flex-1 px-6 py-10 space-y-10">

        @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
        @endif


        <!-- Home Contents -->
        <div id="HomeContents" class="tabcontent hidden">
            <div class="bg-[#F2F6F9] shadow-md rounded-lg p-6 overflow-x-auto">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Home Contents List</h2>
                <a href="{{ route('admin.add_home_contents_admin') }}"
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
                        @foreach ($homeContents as $homeContent)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border">{{ $homeContent->id }}</td>
                            <td class="px-4 py-2 border">{{ $homeContent->section }}</td>
                            <td class="px-4 py-2 border">{{ $homeContent->content }}</td>
                            <td class="px-4 py-2 border">{{ $homeContent->created_at }}</td>
                            <td class="px-4 py-2 border">{{ $homeContent->updated_at }}</td>
                            <td class="px-4 py-2 border space-x-2">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.edit_home_contents_admin', $homeContent->id) }}"
                                        class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>
                                    <form action="{{ route('admin.delete_home_contents_admin', $homeContent->id) }}"
                                        method="POST" class="delete-form inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
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


        <!-- Timeline -->
        <div id="Timeline" class="tabcontent hidden">
            <div class="bg-[#F2F6F9] shadow-md rounded-lg p-6 overflow-x-auto">

                {{-- Header Timeline --}}
                <div class="flex items-center justify-between mb-4">
                    <div class="flex flex-col gap-2">
                        <h2 class="text-lg font-semibold text-gray-800">Timeline List</h2>
                        <a href="{{ route('admin.add_timeline_home_admin') }}"
                            class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 w-max">Add</a>
                    </div>

                    <div class="flex items-center gap-2">
                        <label for="filterRound" class="font-semibold text-slate-700">Filter Round:</label>
                        <select id="filterRound" class="border px-2 py-1 rounded text-black">
                            @foreach($timelines as $round => $items)
                            <option value="round-{{ $round }}">Round {{ $round }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                    <tbody class="bg-white text-slate-800">
                        @foreach ($timelines as $round => $items)
                        <tr class="bg-gray-100 font-semibold round-header" data-round="round-{{ $round }}"
                            style="{{ $loop->first ? '' : 'display:none;' }}">
                            <td colspan="6" class="px-4 py-2 border">Round {{ $round }}</td>
                        </tr>

                        <tr class="bg-gray-200 text-slate-900 font-semibold round-header"
                            data-round="round-{{ $round }}" style="{{ $loop->first ? '' : 'display:none;' }}">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Title</th>
                            <th class="px-4 py-2 border">Date</th>
                            <th class="px-4 py-2 border">Created At</th>
                            <th class="px-4 py-2 border">Updated At</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>

                        @foreach ($items as $item)
                        <tr class="hover:bg-gray-50 round-item" data-round="round-{{ $round }}"
                            style="{{ $loop->parent->first ? '' : 'display:none;' }}">
                            <td class="px-4 py-2 border">{{ $item->id }}</td>
                            <td class="px-4 py-2 border">{{ $item->title }}</td>
                            <td class="px-4 py-2 border">{{ $item->date }}</td>
                            <td class="px-4 py-2 border">{{ $item->created_at }}</td>
                            <td class="px-4 py-2 border">{{ $item->updated_at }}</td>
                            <td class="px-4 py-2 border space-x-2">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.edit_timeline_home_admin', $item->id) }}"
                                        class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>

                                    <form action="{{ route('admin.delete_timeline_home_admin', $item->id) }}"
                                        method="POST" class="delete-form inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                                    </form>


                                    <a href="{{ route('admin.detail_timeline_home_admin', $item->id) }}"
                                        class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>



    </main>
</div>
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
// Filter Round Timeline
const filterRound = document.getElementById('filterRound');
filterRound.value = 'round-{{ $timelines->keys()->first() }}';

filterRound.addEventListener('change', function() {
    const value = this.value; // round-X
    document.querySelectorAll('.round-header, .round-item').forEach(el => {
        el.style.display = (el.dataset.round === value) ? '' : 'none';
    });
});

// Tab navigation
function openTab(evt, tabName) {
    // sembunyikan semua tabcontent
    document.querySelectorAll('.tabcontent').forEach(tc => tc.classList.add('hidden'));

    // hapus active class semua tablink
    document.querySelectorAll('.tablink').forEach(tb => {
        tb.classList.remove('text-white', 'border-teal-400');
        tb.classList.add('text-slate-300', 'border-transparent');
    });

    // tampilkan tab yang diklik
    document.getElementById(tabName).classList.remove('hidden');

    // beri style active
    evt.currentTarget.classList.add('text-white', 'border-teal-400');
    evt.currentTarget.classList.remove('text-slate-300', 'border-transparent');
}

// open default tab
document.getElementById("defaultOpen").click();
</script>
@endsection