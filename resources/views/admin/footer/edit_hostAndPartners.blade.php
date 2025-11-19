@extends('layouts.admin')

@section('title', 'Edit Host & Partners')

@section('content')

<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">
            Edit Host & Partners ({{ $section->title }})
        </h2>

        <form action="{{ route('admin.footer.update', $section->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title', $section->title) }}"
                    class="w-full border border-gray-400 rounded-md px-3 py-2 bg-gray-200 text-gray-700 cursor-not-allowed"
                    readonly>
                @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Logos -->
            <div>
                <label class="block mb-2 font-bold text-slate-900">Logos</label>
                <div id="logos-container" class="flex flex-col gap-4">
                    @php
                    $items = is_array($section->items) ? $section->items : json_decode($section->items, true) ?? [];
                    @endphp

                    @foreach($items as $index => $item)
                    @if(isset($item['img']))
                    <div class="flex items-center gap-3 logo-item">
                        <!-- Preview Gambar -->
                        <img src="{{ asset('images/' . $item['img']) }}"
                            class="w-16 h-16 object-cover rounded preview-image">

                        <!-- Ganti File Gambar -->
                        <input type="file" name="items[{{ $index }}][img]" class="border p-1 rounded"
                            onchange="previewLogo(this)">

                        <!-- Alt Text -->
                        <input type="text" name="items[{{ $index }}][alt]" value="{{ $item['alt'] ?? '' }}"
                            placeholder="Alt text" class="border p-1 rounded w-full">

                        <!-- Tombol Hapus -->
                        <button type="button" onclick="removeLogo(this)"
                            class="px-2 py-1 bg-red-500 text-white rounded">Delete</button>
                    </div>
                    @endif
                    @endforeach
                </div>

                <!-- Tombol Tambah Logo Baru -->
                <button type="button" onclick="addLogo()" class="mt-3 px-4 py-2 bg-green-500 text-white rounded">
                    + Add
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
// Hapus logo dari form
function removeLogo(btn) {
    btn.closest('.logo-item').remove();
}

// Preview gambar setelah dipilih
function previewLogo(input) {
    const file = input.files[0];
    const img = input.closest('.logo-item').querySelector('.preview-image');
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            img.style.display = 'block'; // tampilkan preview
        };
        reader.readAsDataURL(file);
    } else {
        img.src = '';
        img.style.display = 'none';
    }
}

// Tambah logo baru
function addLogo() {
    const container = document.getElementById('logos-container');
    const index = container.children.length;

    const div = document.createElement('div');
    div.className = 'flex items-center gap-3 logo-item';
    div.innerHTML = `
        <img src="" class="w-16 h-16 object-cover rounded preview-image" style="display:none;">
        <input type="file" name="items[${index}][img]" class="border p-1 rounded" onchange="previewLogo(this)" required>
        <input type="text" name="items[${index}][alt]" placeholder="Alt text" class="border p-1 rounded w-full" required>
        <button type="button" onclick="removeLogo(this)" class="px-2 py-1 bg-red-500 text-white rounded">×</button>
    `;
    container.appendChild(div);

    // Otomatis trigger preview jika user sudah memilih file
    const fileInput = div.querySelector('input[type="file"]');
    fileInput.addEventListener('change', () => previewLogo(fileInput));
}


// Validasi form sebelum submit
document.querySelector('form').addEventListener('submit', function(e) {
    let valid = true;
    document.querySelectorAll('#logos-container input[name$="[alt]"]').forEach(input => {
        if (!input.value.trim()) valid = false;
    });
    if (!valid) {
        e.preventDefault();
        alert('Semua Alt Text harus diisi!');
    }
});
</script>

@endsection