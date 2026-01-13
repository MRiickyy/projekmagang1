@extends('layouts.admin')

@section('title', 'List Footer')

@section('content')
<div class="flex-1 flex flex-col">
    <main class="flex-1 px-6 py-10 space-y-10">
        <div class="bg-[#F2F6F9] shadow-md rounded-lg p-6 overflow-x-auto">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">
                Footer List
            </h2>



            <!-- Table -->
            <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-slate-900">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Title</th>
                        <th class="px-4 py-2 border">Subtitle</th>
                        <th class="px-4 py-2 border">Items</th>
                        <th class="px-4 py-2 border">Image</th>
                        <th class="px-4 py-2 border">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-slate-800">
                    @forelse($sections as $index => $section)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $section->title ?? '-' }}</td>

                        {{-- Subtitle --}}
                        <td class="px-4 py-2 border">
                            @if(is_array($section->subtitle))
                            {{ implode(', ', $section->subtitle) }}
                            @else
                            {{ $section->subtitle ?? '-' }}
                            @endif
                        </td>

                        {{-- Items --}}
                        <td class="px-4 py-2 border">
                            @if(is_array($section->items) && count($section->items) > 0)
                            <ul class="list-disc list-inside">
                                @foreach($section->items as $item)
                                <li>
                                    @if(is_array($item))
                                    {{-- Jika ada img, tampilkan alt --}}
                                    @if(isset($item['img']))
                                    {{ $item['alt'] ?? '-' }}
                                    {{-- Jika ada visitor (country & count & flag) --}}
                                    @elseif(isset($item['country']) && isset($item['count']) && isset($item['flag']))
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset($item['flag']) }}" alt="{{ $item['country'] }}"
                                            class="w-6 h-4">
                                        <span>{{ $item['country'] }}: {{ $item['count'] }}</span>
                                    </div>
                                    @else
                                    {{ json_encode($item) }}
                                    @endif
                                    @else
                                    {{ $item }}
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                            @else
                            -
                            @endif
                        </td>

                        {{-- Image --}}
                        <td class="px-4 py-2 border">
                            @if(is_array($section->items))
                            @foreach($section->items as $item)
                            @if(is_array($item) && isset($item['img']) && is_string($item['img']))
                            <img src="{{ asset('images/' . $item['img']) }}" alt="{{ $item['alt'] ?? 'logo' }}"
                                class="w-16 h-16 object-cover rounded m-1 inline-block">
                            @endif
                            @endforeach
                            @else
                            -
                            @endif
                        </td>





                        {{-- Actions --}}
                        <td class="px-4 py-2 border">
                            <div class="flex justify-center gap-2">
                                @php
                                if ($section->title === 'Host and Partners') {
                                $editRoute = route('admin.footer.edit_hostAndPartners', $section->id);
                                } elseif ($section->title === 'Hosted') {
                                $editRoute = route('admin.footer.edit_hosted', $section->id);
                                } elseif ($section->title === 'Visitors') {
                                $editRoute = route('admin.footer.edit_visitors', $section->id);
                                } else {
                                $editRoute = '#'; // fallback aman
                                }
                                @endphp


                                <a href="{{ $editRoute }}"
                                    class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form action="{{ route('admin.footer.delete', $section->id) }}" method="POST"
                                    class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>

                                <a href="{{ route('admin.footer.detail', $section->id) }}"
                                    class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">
                                    Detail
                                </a>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-2 border text-center text-gray-500">
                            No footer sections available.
                        </td>
                    </tr>
                    @endforelse
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