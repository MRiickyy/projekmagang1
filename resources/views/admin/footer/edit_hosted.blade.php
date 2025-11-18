@extends('layouts.admin')

@section('title', 'Edit Hosted Section')

@section('content')

<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">
            Edit Hosted Section ({{ $section->title }})
        </h2>

        <form action="{{ route('admin.footer.update', $section->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Title</label>
                <input type="text" name="title" value="{{ $section->title }}"
                    class="w-full border border-gray-400 rounded-md px-3 py-2 bg-gray-200 text-gray-700 cursor-not-allowed"
                    readonly>
                @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Subtitle -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Subtitle</label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $section->subtitle ?? '') }}"
                    class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none bg-white">
                @error('subtitle')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Items / Text List -->
            <div>
                <label class="block mb-2 font-bold text-slate-900">Items</label>
                <div id="items-container" class="flex flex-col gap-4">
                    @php
                    $items = is_array($section->items) ? $section->items : json_decode($section->items, true) ?? [];
                    @endphp

                    @foreach($items as $index => $item)
                    <div class="flex flex-col gap-2 item-row">
                        <textarea name="items[{{ $index }}]" rows="3"
                            class="border p-2 rounded w-full">{{ $item }}</textarea>
                        <button type="button" onclick="removeItem(this)"
                            class="px-2 py-1 bg-red-500 text-white rounded w-24">
                            Hapus
                        </button>
                    </div>
                    @endforeach
                </div>

                <button type="button" id="add-item-btn" class="mt-3 px-4 py-2 bg-green-500 text-white rounded">
                    + Tambah
                </button>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" onclick="window.history.back()"
                    class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Cancel
                </button>
                <button type="submit"
                    class="px-7 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md hover:opacity-90">
                    Save
                </button>
            </div>

        </form>
    </div>
</main>

<script>
// Hapus item
function removeItem(btn) {
    btn.closest('.item-row').remove();
}

// Tambah item baru
document.getElementById('add-item-btn').addEventListener('click', function() {
    const container = document.getElementById('items-container');
    const index = container.querySelectorAll('.item-row').length;
    const newItem = document.createElement('div');
    newItem.className = 'flex flex-col gap-2 item-row';
    newItem.innerHTML = `
        <textarea name="items[${index}]" rows="3" class="border p-2 rounded w-full"></textarea>
        <button type="button" onclick="removeItem(this)" class="px-2 py-1 bg-red-500 text-white rounded w-24">
            Hapus
        </button>
    `;
    container.appendChild(newItem);
});
</script>

@endsection