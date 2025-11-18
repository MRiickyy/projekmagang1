@extends('layouts.admin')
@section('title', 'Edit Visitors Section')
@section('content')

<div class="flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-5xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">
            Edit Visitors Section ({{ $section->title }})
        </h2>

        <form action="{{ route('admin.footer.update', $section->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $section->title) }}" required
                    class="w-full border border-gray-400 rounded-md px-3 py-2 bg-gray-200 text-gray-700 cursor-not-allowed"
                    readonly>
                @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Visitors List -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Visitors List</label>

                @php
                $items = is_array($section->items) ? $section->items : json_decode($section->items, true);
                $flags = [];
                foreach (glob(public_path('flags/*.png')) as $file) {
                $code = strtoupper(pathinfo($file, PATHINFO_FILENAME));
                $flags[$code] = 'flags/' . pathinfo($file, PATHINFO_BASENAME);
                }
                @endphp

                <div id="visitors-container" class="space-y-4">
                    @foreach($items as $index => $item)
                    <div class="flex flex-wrap items-center gap-4 border p-3 rounded bg-white visitor-item"
                        data-index="{{ $index }}">
                        <!-- Country -->
                        <div class="flex-1 min-w-[150px]">
                            <label class="block text-sm font-medium text-gray-700">Country</label>
                            <select name="items[{{ $index }}][country]"
                                class="w-full border border-gray-300 rounded px-2 py-1 country-select">
                                <option value="">-- Select Country --</option>
                                @foreach($flags as $code => $path)
                                <option value="{{ $code }}" @if($item['country']==$code) selected @endif>{{ $code }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Flag preview -->
                        <div class="flex-1 min-w-[100px]">
                            <label class="block text-sm font-medium text-gray-700">Flag Preview</label>
                            <div class="flag-preview mt-1">
                                @if(isset($item['country']) && isset($flags[$item['country']]))
                                <img src="{{ asset($flags[$item['country']]) }}" alt="{{ $item['country'] }}"
                                    class="w-16 h-12 object-contain">
                                @else
                                <span class="text-gray-400 text-sm">No flag</span>
                                @endif
                            </div>
                        </div>

                        <!-- Participants -->
                        <div class="flex-1 min-w-[150px]">
                            <label class="block text-sm font-medium text-gray-700">Participants</label>
                            <input type="number" name="items[{{ $index }}][count]" value="{{ $item['count'] ?? 0 }}"
                                class="w-full border border-gray-300 rounded px-2 py-1 participant-input">
                        </div>

                        <!-- Remove button -->
                        <div class="flex-none">
                            <button type="button"
                                class="px-3 py-1 bg-red-500 text-white rounded remove-item">Hapus</button>
                        </div>
                    </div>
                    @endforeach
                </div>

                <button type="button" id="add-country-btn" class="mt-3 px-4 py-2 bg-green-500 text-white rounded">
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
</div>

<script>
// Semua flag yang tersedia
const flagsData = @json($flags);

// Update preview flag
function updateFlagPreview(container) {
    const select = container.querySelector('.country-select');
    const preview = container.querySelector('.flag-preview');
    const country = select.value;

    if (country && flagsData[country]) {
        preview.innerHTML =
            `<img src="{{ asset('') }}${flagsData[country]}" alt="${country}" class="w-16 h-12 object-contain">`;
    } else {
        preview.innerHTML = '<span class="text-gray-400 text-sm">No flag</span>';
    }
}

// Event listener untuk perubahan country select
document.addEventListener('change', function(e) {
    if (e.target.classList.contains('country-select')) {
        const container = e.target.closest('.visitor-item');
        updateFlagPreview(container);
    }
});

// Tombol Tambah Negara
document.getElementById('add-country-btn').addEventListener('click', function() {
    const container = document.getElementById('visitors-container');
    const itemCount = container.querySelectorAll('.visitor-item').length;

    const newItem = document.createElement('div');
    newItem.className = 'flex flex-wrap items-center gap-4 border p-3 rounded bg-white visitor-item';
    newItem.innerHTML = `
        <div class="flex-1 min-w-[150px]">
            <label class="block text-sm font-medium text-gray-700">Country</label>
            <select name="items[${itemCount}][country]" class="w-full border border-gray-300 rounded px-2 py-1 country-select">
                <option value="">-- Select Country --</option>
                ${Object.keys(flagsData).map(code => `<option value="${code}">${code}</option>`).join('')}
            </select>
        </div>
        <div class="flex-1 min-w-[100px]">
            <label class="block text-sm font-medium text-gray-700">Flag Preview</label>
            <div class="flag-preview mt-1"><span class="text-gray-400 text-sm">No flag</span></div>
        </div>
        <div class="flex-1 min-w-[150px]">
            <label class="block text-sm font-medium text-gray-700">Participants</label>
            <input type="number" name="items[${itemCount}][count]" value="0" class="w-full border border-gray-300 rounded px-2 py-1 participant-input">
        </div>
        <div class="flex-none">
            <button type="button" class="px-3 py-1 bg-red-500 text-white rounded remove-item">Hapus</button>
        </div>
    `;

    container.appendChild(newItem);
});

// Event listener tombol Hapus
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-item')) {
        e.preventDefault();
        e.target.closest('.visitor-item').remove();
    }
});
</script>

@endsection