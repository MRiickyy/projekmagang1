@extends('layouts.admin')

@section('title', 'Committee Detail')

@section('content')
<div class="w-full max-w-3xl bg-[#F2F6F9] mx-auto rounded-lg shadow-xl p-6 text-slate-800">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-bold text-slate-900">Committee Detail</h2>
        <a href="{{ route('admin.committees') }}"
           class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
            Back to List
        </a>
    </div>

    <!-- Detail Content -->
    <div class="space-y-4 text-sm">
        <div>
            <p class="font-semibold text-slate-900">Full Name</p>
            <p class="bg-white border border-gray-200 rounded-md px-3 py-2">{{ $committee->name }}</p>
        </div>

        <div>
            <p class="font-semibold text-slate-900">Role</p>
            <p class="bg-white border border-gray-200 rounded-md px-3 py-2">{{ $committee->role }}</p>
        </div>

        <div>
            <p class="font-semibold text-slate-900">University</p>
            <p class="bg-white border border-gray-200 rounded-md px-3 py-2">{{ $committee->university }}</p>
        </div>

        <div>
            <p class="font-semibold text-slate-900">Country</p>
            <p class="bg-white border border-gray-200 rounded-md px-3 py-2">{{ $committee->country }}</p>
        </div>

        <div>
            <p class="font-semibold text-slate-900">Committee Type</p>
            <p class="bg-white border border-gray-200 rounded-md px-3 py-2 capitalize">{{ $committee->type }}</p>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-start gap-3 mt-6">
        <a href="{{ route('edit.committees', $committee->id) }}"
            class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>

        <form action="{{ route('delete.committees', $committee->id) }}" method="POST" class="inline delete-item">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
        </form>
    </div>
</div>
@endsection
