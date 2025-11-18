@extends('layouts.admin')

@section('title', 'Detail Footer Section')

@section('content')
<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-5xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">
            Detail Footer Section ({{ $section->title }})
        </h2>

        {{-- Title --}}
        <div class="mb-4">
            <label class="block text-sm font-bold text-slate-900 mb-1">Title</label>
            <input type="text" value="{{ $section->title }}"
                class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                readonly>
        </div>

        {{-- Subtitle --}}
        @if($section->subtitle)
        <div class="mb-4">
            <label class="block text-sm font-bold text-slate-900 mb-1">Subtitle</label>
            <input type="text" value="{{ $section->subtitle }}"
                class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                readonly>
        </div>
        @endif

        @php
        $items = is_array($section->items) ? $section->items : json_decode($section->items, true) ?? [];
        $flags = [];
        foreach (glob(public_path('flags/*.png')) as $file) {
        $code = strtoupper(pathinfo($file, PATHINFO_FILENAME));
        $flags[$code] = 'flags/' . pathinfo($file, PATHINFO_BASENAME);
        }
        @endphp

        {{-- Hosted / Text Items --}}
        @if(!empty($items) && !isset($items[0]['img']) && !isset($items[0]['country']))
        <div class="mb-4">
            <label class="block text-sm font-bold text-slate-900 mb-2">Items</label>
            <div class="flex flex-col gap-3">
                @foreach($items as $item)
                <textarea class="border p-2 rounded w-full bg-gray-200 text-gray-700 cursor-not-allowed"
                    readonly>{{ $item }}</textarea>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Host & Partners / Logos --}}
        @if(!empty($items) && isset($items[0]['img']))
        <div class="mb-4">
            <label class="block text-sm font-bold text-slate-900 mb-2">Host & Partners Logos</label>
            <div class="grid grid-cols-4 gap-3 mt-2">
                <!-- bisa 4 kolom agar compact -->
                @foreach($items as $img)
                <div class="relative flex justify-center items-center">
                    <img src="{{ asset('images/' . $img['img']) }}" alt="{{ $img['alt'] ?? 'image' }}"
                        class="h-12 w-auto object-cover rounded cursor-not-allowed"> <!-- ukuran dikurangi -->
                    <div
                        class="absolute bottom-0 left-1/2 transform -translate-x-1/2 bg-gray-200 px-1 rounded text-xs text-gray-700">
                        {{ $img['alt'] ?? '' }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif


        {{-- Visitors --}}
        @if(!empty($items) && isset($items[0]['country']) && isset($items[0]['count']))
        <div class="mb-4">
            <label class="block text-sm font-bold text-slate-900 mb-2">Visitors</label>
            <div class="space-y-2">
                @foreach($items as $v)
                @php
                $flagPath = $v['flag'] ?? ($v['country'] ? 'flags/' . $v['country'] . '.png' : null);
                @endphp
                <div class="flex items-center justify-between bg-white p-2 rounded-lg shadow cursor-not-allowed">
                    <div class="flex items-center gap-2">
                        @if($flagPath && file_exists(public_path($flagPath)))
                        <img src="{{ asset($flagPath) }}" class="h-5 object-cover rounded-sm" alt="{{ $v['country'] }}">
                        @else
                        <span class="text-gray-400 text-sm">No flag</span>
                        @endif
                        <span>{{ $v['country'] }}</span>
                    </div>
                    <span class="font-bold">{{ number_format($v['count'] ?? 0) }}</span>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Back Button --}}
        <div class="flex justify-end pt-4">
            <a href="{{ route('admin.footer.list') }}"
                class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                Back
            </a>
        </div>

    </div>
</main>
@endsection