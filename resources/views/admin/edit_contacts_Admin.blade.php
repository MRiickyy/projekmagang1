@extends('layouts.admin')

@section('title', ($isDetail ?? false) ? 'Detail Contact' : 'Edit Contact')

@section('content')
<div class="flex-1 flex flex-col">
    <main class="flex-1 px-6 py-10 flex justify-center">
        <div class="w-full max-w-4xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
            <h2 class="text-lg font-semibold text-slate-900 mb-6">
                {{ $isDetail ?? false ? 'Detail' : 'Edit' }}
                @if($section === 'create_contact_infos')
                Contact Info
                @elseif($section === 'create_map_locations_table')
                Map Location
                @elseif($section === 'create_contact_messages')
                Contact Message
                @endif
            </h2>

            {{-- Form --}}
            <form action="{{ (!$isDetail ?? true) 
                             ? ($section === 'create_contact_infos' 
                                ? route('admin.update_contact_info', $data->id)
                                : ($section === 'create_map_locations_table'
                                   ? route('admin.update_map_location', $data->id)
                                   : '#'))
                             : '#' }}" method="{{ (!$isDetail ?? true) ? 'POST' : 'GET' }}">
                @csrf
                @if(!$isDetail ?? true)
                @method('PUT')
                @endif

                {{-- Contact Info --}}
                @if($section === 'create_contact_infos')
                <div class="space-y-3 mb-4">
                    <div>
                        <label class="block font-bold mb-1">Type</label>
                        <input type="text" name="type" class="w-full border rounded px-3 py-2"
                            value="{{ old('type', $data->type) }}" {{ ($isDetail ?? false) ? 'readonly' : '' }}>
                    </div>
                    <div>
                        <label class="block font-bold mb-1">Title</label>
                        <input type="text" name="title" class="w-full border rounded px-3 py-2"
                            value="{{ old('title', $data->title) }}" {{ ($isDetail ?? false) ? 'readonly' : '' }}>
                    </div>
                    <div>
                        <label class="block font-bold mb-1">Value</label>
                        <input type="text" name="value" class="w-full border rounded px-3 py-2"
                            value="{{ old('value', $data->value) }}" {{ ($isDetail ?? false) ? 'readonly' : '' }}>
                    </div>
                </div>
                @elseif($section === 'create_map_locations_table')
                <div class="space-y-3 mb-4">
                    <div>
                        <label class="block font-bold mb-1">Title</label>
                        <input type="text" name="title" class="w-full border rounded px-3 py-2"
                            value="{{ old('title', $data->title) }}" {{ ($isDetail ?? false) ? 'readonly' : '' }}>
                    </div>
                    <div>
                        <label class="block font-bold mb-1">Link</label>
                        <input type="text" name="link" class="w-full border rounded px-3 py-2"
                            value="{{ old('link', $data->link) }}" {{ ($isDetail ?? false) ? 'readonly' : '' }}>
                    </div>
                </div>
                @elseif($section === 'create_contact_messages')
                <div class="space-y-3 mb-4">
                    <div>
                        <label class="block font-bold mb-1">Name</label>
                        <input type="text" name="name" class="w-full border rounded px-3 py-2"
                            value="{{ old('name', $data->name) }}" readonly>
                    </div>
                    <div>
                        <label class="block font-bold mb-1">Email</label>
                        <input type="text" name="email" class="w-full border rounded px-3 py-2"
                            value="{{ old('email', $data->email) }}" readonly>
                    </div>
                    <div>
                        <label class="block font-bold mb-1">Message</label>
                        <textarea name="message" rows="5" class="w-full border rounded px-3 py-2 resize-none"
                            readonly>{{ old('message', $data->message) }}</textarea>
                    </div>
                </div>
                @endif

                {{-- Buttons --}}
                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.list_contacts_Admin') }}"
                        class="px-6 py-2 rounded bg-gray-600 text-white hover:bg-gray-700">
                        {{ ($isDetail ?? false) ? 'Back' : 'Cancel' }}
                    </a>

                    @if(!($isDetail ?? false))
                    <button type="submit"
                        class="px-6 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md hover:scale-[1.02] transition-transform">
                        Update
                    </button>
                    @endif
                </div>
            </form>
        </div>
    </main>
</div>
@endsection