@extends('layouts.admin')

@section('title', 'Committee Detail')

@section('content')

<!-- Content -->
<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">Committee Detail Information</h2>

        <div class="space-y-5">

            <!-- Committee Image (optional) -->
            @if(!empty($committee->image))
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/committees/' . $committee->image) }}"
                    alt="{{ $committee->name }}"
                    class="w-40 h-40 object-cover rounded-lg shadow-md">
            </div>
            @endif

            <!-- Full Name -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Full Name</label>
                <input type="text" value="{{ $committee->name }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- Role -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Role</label>
                <input type="text" value="{{ $committee->role }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- University -->
            @if($committee->university)
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">University</label>
                <input type="text" value="{{ $committee->university }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>
            @endif

            <!-- Country -->
            @if($committee->country)
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Country</label>
                <input type="text" value="{{ $committee->country }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>
            @endif

            <!-- Type -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Committee Type</label>
                <input type="text" value="{{ ucfirst($committee->type) }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end pt-4">

                <!-- Back Button -->
                @php
                    $backRoute = match($committee->type) {
                        'steering' => 'admin.committees.steering',
                        'technical program' => 'admin.committees.technical_program',
                        'organizing' => 'admin.committees.organizing'
                    };
                @endphp

                <a href="{{ route($backRoute) }}"
                    class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Back
                </a>
            </div>

        </div>
    </div>
</main>

@endsection
