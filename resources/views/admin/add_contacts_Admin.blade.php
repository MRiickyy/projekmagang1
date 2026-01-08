@extends('layouts.admin')

@section('title', 'Add Contact')

@section('content')
<div class="flex-1 flex flex-col">
    <main class="flex-1 px-6 py-10 flex justify-center">
        <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800" x-data="{ section: '' }">
            <h2 class="text-lg font-semibold text-slate-900 mb-6">Contact Information</h2>

            <form action="{{ route('admin.store_contacts_Admin') }}" method="POST">
                @csrf

                <!-- Section -->
                <div class="mb-4">
                    <label class="block font-bold mb-2">Section</label>
                    <select name="section" x-model="section" required class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih Section --</option>
                        <option value="create_contact_infos">Contact Infos</option>
                        <option value="create_map_locations_table">Map Locations</option>
                    </select>
                </div>

                <!-- create_contact_infos -->
                <template x-if="section === 'create_contact_infos'">
                    <div class="space-y-3 mb-4">
                        <div>
                            <label class="block font-bold mb-1">Type</label>
                            <input type="text" name="type" class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block font-bold mb-1">Title</label>
                            <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block font-bold mb-1">Value</label>
                            <input type="text" name="value" class="w-full border rounded px-3 py-2" required>
                        </div>
                    </div>
                </template>

                <!-- create_map_locations_table -->
                <template x-if="section === 'create_map_locations_table'">
                    <div class="space-y-3 mb-4">
                        <div>
                            <label class="block font-bold mb-1">Title</label>
                            <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block font-bold mb-1">Link</label>
                            <input type="text" name="link" class="w-full border rounded px-3 py-2" required>
                        </div>
                    </div>
                </template>

                <!-- Buttons -->
                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.list_contacts_Admin') }}"
                        class="px-6 py-2 rounded bg-gray-600 text-white hover:bg-gray-700">Cancel</a>
                    <button type="submit"
                        class="px-6 py-2 rounded bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] font-semibold text-black">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection