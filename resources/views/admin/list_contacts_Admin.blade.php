@extends('layouts.admin')

@section('title', 'List Contacts & Locations')

@section('content')

<!-- Main Content -->
<div class="flex-1 flex flex-col">

    <!-- Tabs Navigation -->
    <div class="px-6 py-3 flex gap-4 text-sm font-semibold border-b border-slate-700">
        <button id="defaultOpen"
            class="tablink px-4 py-2 rounded-t-md border-b-2 border-transparent text-slate-300 hover:text-white hover:border-teal-400 transition-all"
            onclick="openTab(event, 'Infos')">Contact Infos</button>
        <button
            class="tablink px-4 py-2 rounded-t-md border-b-2 border-transparent text-slate-300 hover:text-white hover:border-teal-400 transition-all"
            onclick="openTab(event, 'Messages')">Contact Messages</button>
        <button
            class="tablink px-4 py-2 rounded-t-md border-b-2 border-transparent text-slate-300 hover:text-white hover:border-teal-400 transition-all"
            onclick="openTab(event, 'Locations')">Map Locations</button>
    </div>

    <!-- Content Tabs -->
    <main class="flex-1 px-6 py-10 space-y-10">

        @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
        @endif

        <!-- Contact Infos -->
        <div id="Infos" class="tabcontent hidden">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Contact Infos List</h2>
                <a href="{{ route('admin.add_contacts_Admin') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add</a>
                <table class="w-full border-collapse">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Type</th>
                            <th class="px-4 py-2 border">Title</th>
                            <th class="px-4 py-2 border">Value</th>
                            <th class="px-4 py-2 border">Created At</th>
                            <th class="px-4 py-2 border">Updated At</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contactInfos as $contactInfo)
                        <tr class="hover:bg-gray-100 text-gray-800">
                            <td class="px-4 py-2 border">{{ $contactInfo->id }}</td>
                            <td class="px-4 py-2 border">{{ ucfirst($contactInfo->type) }}</td>
                            <td class="px-4 py-2 border">{{ $contactInfo->title }}</td>
                            <td class="px-4 py-2 border">{{ $contactInfo->value }}</td>
                            <td class="px-4 py-2 border">{{ $contactInfo->created_at }}</td>
                            <td class="px-4 py-2 border">{{ $contactInfo->updated_at }}</td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center gap-2">
                                    <a href="#"
                                        class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>
                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                                    </form>
                                    <a href="#"
                                        class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Contact Messages -->
        <div id="Messages" class="tabcontent hidden">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Contact Messages List</h2>
                <table class="w-full border-collapse">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Message</th>
                            <th class="px-4 py-2 border">Created At</th>
                            <th class="px-4 py-2 border">Updated At</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contactMessages as $message)
                        <tr class="hover:bg-gray-100 text-gray-800">
                            <td class="px-4 py-2 border">{{ $message->id }}</td>
                            <td class="px-4 py-2 border">{{ $message->name }}</td>
                            <td class="px-4 py-2 border">{{ $message->email }}</td>
                            <td class="px-4 py-2 border">{{ $message->message }}</td>
                            <td class="px-4 py-2 border">{{ $message->created_at }}</td>
                            <td class="px-4 py-2 border">{{ $message->updated_at }}</td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center gap-2">
                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                                    </form>
                                    <a href="#"
                                        class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-4 py-2 border text-center text-gray-500">
                                Tidak ada pesan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Map Locations -->
        <div id="Locations" class="tabcontent hidden">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Map Location</h2>
                <a href="{{ route('admin.add_contacts_Admin') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add</a>
                <table class="w-full border-collapse">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Title</th>
                            <th class="px-4 py-2 border">Link</th>
                            <th class="px-4 py-2 border">Created At</th>
                            <th class="px-4 py-2 border">Updated At</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mapLocations as $map)
                        <tr class="hover:bg-gray-100 text-gray-800">
                            <td class="px-4 py-2 border">{{ $map->id }}</td>
                            <td class="px-4 py-2 border">{{ $map->title }}</td>
                            <td class="px-4 py-2 border max-w-xs overflow-hidden text-ellipsis whitespace-nowrap">
                                <a href="{{ $map->link }}" class="text-blue-600 hover:underline">{{ $map->link }}</a>
                            </td>

                            <td class="px-4 py-2 border">{{ $map->created_at }}</td>
                            <td class="px-4 py-2 border">{{ $map->updated_at }}</td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center gap-2">
                                    <a href="#"
                                        class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>
                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                                    </form>
                                    <a href="#"
                                        class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</div>

@endsection