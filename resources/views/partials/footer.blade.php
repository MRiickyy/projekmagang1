@php
$sections = $sections ?? collect();
@endphp

<footer class="bg-gradient-to-br from-[#0f172a] to-[#1f2937] text-black">
    <div class="max-w-7xl mx-auto px-5 py-10 grid md:grid-cols-3 gap-6 items-start">

        @foreach ($sections as $section)
        <div class="rounded-xl bg-[#F2F6F9] ring-1 ring-white/10 p-6 text-center h-auto">

            {{-- TITLE --}}
            <div class="text-slate-700 font-extrabold mb-2">
                {{ $section->title }}
            </div>

            {{-- SUBTITLE --}}
            @if ($section->subtitle)
            <div class="text-slate-700 mb-3 text-sm">
                {{ is_array($section->subtitle) ? implode(', ', $section->subtitle) : $section->subtitle }}
            </div>
            @endif

            {{-- DECODE ITEMS --}}
            @php
            $items = is_array($section->items) ? $section->items : json_decode($section->items, true);
            @endphp

            {{-- VISITORS --}}
            @if(is_array($items) && isset($items[0]) && is_array($items[0]) && isset($items[0]['country']))
            <div class="mt-4 grid grid-cols-2 gap-2">
                @foreach($items as $v)
                @php
                $countryCode = strtoupper($v['country']);
                $flagPath = 'flags/' . $countryCode . '.png'; // otomatis ambil file sesuai country code
                @endphp
                <div class="flex items-center justify-between bg-white p-2 rounded-lg shadow">
                    <div class="flex items-center gap-2">
                        @if(file_exists(public_path($flagPath)))
                        <img src="{{ asset($flagPath) }}" class="h-5 object-cover rounded-sm" alt="{{ $countryCode }}">
                        @else
                        <span class="text-gray-400 text-sm">No flag</span>
                        @endif
                        <span>{{ $countryCode }}</span>
                    </div>
                    <span class="font-bold">{{ number_format($v['count'] ?? 0) }}</span>
                </div>
                @endforeach
            </div>
            @endif

            {{-- HOST / HOSTED IMAGES --}}
            @if(is_array($items) && isset($items[0]) && is_array($items[0]) && array_key_exists('img', $items[0]))
            <div class="grid grid-cols-3 gap-3 mt-4">
                @foreach($items as $img)
                <img src="{{ asset('images/' . $img['img']) }}" alt="{{ $img['alt'] ?? 'image' }}" class="h-10 mx-auto">
                @endforeach
            </div>
            @endif

            {{-- LIST TEXT --}}
            @if(is_array($items) && !empty($items) && is_string($items[0] ?? null))
            <ul class="text-slate-700 text-sm mt-3 space-y-1">
                @foreach ($items as $item)
                <li>{{ $item }}</li>
                @endforeach
            </ul>
            @endif

        </div>
        @endforeach

    </div>
</footer>