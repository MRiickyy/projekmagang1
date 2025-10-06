@extends('layouts.admin')

@section('title', 'Speaker Detail')

@section('content')
<div class="max-w-4xl mx-auto bg-[#F2F6F9] rounded-lg shadow-xl p-6 mt-8 text-slate-800">

    <!-- Title + Back Button -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-bold text-slate-900">Speaker Detail</h2>
        <a href="{{ route('admin.speakers') }}"
            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
            Back to List
        </a>
    </div>

    <!-- Image dan Info Speaker -->
    <div class="flex flex-col md:flex-row items-center md:items-start gap-6 mb-6">
        <img src="{{ asset('images/speakers/' . $speaker->image) }}"
            alt="{{ $speaker->name }}"
            class="w-40 h-40 object-cover rounded-lg shadow-md">
        <div class="flex-1">
            <h1 class="text-xl font-bold text-slate-900">{{ $speaker->name }}</h1>
            @if($speaker->university)
            <p class="text-sm text-gray-600 mt-1">University: {{ $speaker->university }}</p>
            @endif
            <p class="text-sm text-gray-600 mt-1">Type: {{ ucfirst($speaker->speaker_type) }} Speaker</p>
            @if($speaker->biodata)
            <p class="mt-3 text-gray-800">{{ $speaker->biodata }}</p>
            @endif
        </div>
    </div>

    <!-- Descriptions -->
    <div class="space-y-4">
        <h2 class="text-lg font-semibold mb-2">Descriptions</h2>
        @if($speaker->descriptions->count() > 0)
        @foreach($speaker->descriptions as $desc)
        <div>
            <h3 class="font-semibold text-gray-800">{{ $desc->title }}</h3>
            <p class="w-full border border-gray-300 bg-white rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                {{ $desc->content }}
            </p>
        </div>
        @endforeach
        @else
        <p class="text-gray-500">No descriptions available.</p>
        @endif
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-start gap-3 mt-6">
        <a href="{{ route('edit.form.speakers', $speaker->slug) }}"
            class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>

        <form action="{{ route('delete.speakers', $speaker->slug) }}" method="POST" class="inline delete-item">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
        </form>
    </div>
</div>
@endsection