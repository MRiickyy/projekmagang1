@extends('layouts.admin')

@section('title', 'List Timelines')

@section('content')

<!-- Main Content -->
<div class="flex-1 flex flex-col">

    <!-- Content Section -->
    <div class="p-6">
        <div class="w-full bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
            <h2 class="text-lg font-semibold text-slate-900 mb-6">Timelines List</h2>

            <!-- Table -->
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="w-full border-collapse border border-gray-300 table-auto">
                    <thead class="bg-gray-200 text-slate-900">
                        <tr>
                            <th class="px-4 py-2 border border-gray-300 text-center">ID</th>
                            <th class="px-4 py-2 border border-gray-300 text-center">Round Number</th>
                            <th class="px-4 py-2 border border-gray-300 text-center">Date</th>
                            <th class="px-4 py-2 border border-gray-300 text-center">Title</th>
                            <th class="px-4 py-2 border border-gray-300 text-center whitespace-nowrap">Action</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white text-slate-800">

                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border border-gray-300 text-center">1</td>
                            <td class="px-4 py-2 border border-gray-300 text-center">1</td>
                            <td class="px-4 py-2 border border-gray-300 text-center">2025-12-15</td>
                            <td class="px-4 py-2 border border-gray-300">
                                Paper Submission Deadline
                            </td>
                            <td class="px-4 py-2 border border-gray-300 text-center space-x-2">
                                <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-yellow-500 text-white font-semibold hover:bg-yellow-600">
                                    Edit
                                </a>
                                <button class="inline-flex items-center justify-center w-20 h-10 rounded bg-red-500 text-white font-semibold hover:bg-red-600">
                                    Delete
                                </button>
                                <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-blue-500 text-white font-semibold hover:bg-blue-600">
                                    Detail
                                </a>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border border-gray-300 text-center">2</td>
                            <td class="px-4 py-2 border border-gray-300 text-center">1</td>
                            <td class="px-4 py-2 border border-gray-300 text-center">2025-01-31</td>
                            <td class="px-4 py-2 border border-gray-300">
                                Notification of Papers Acceptance
                            </td>
                            <td class="px-4 py-2 border border-gray-300 text-center space-x-2">
                                <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-yellow-500 text-white font-semibold hover:bg-yellow-600">
                                    Edit
                                </a>
                                <button class="inline-flex items-center justify-center w-20 h-10 rounded bg-red-500 text-white font-semibold hover:bg-red-600">
                                    Delete
                                </button>
                                <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-blue-500 text-white font-semibold hover:bg-blue-600">
                                    Detail
                                </a>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border border-gray-300 text-center">3</td>
                            <td class="px-4 py-2 border border-gray-300 text-center">1</td>
                            <td class="px-4 py-2 border border-gray-300 text-center">2025-02-28</td>
                            <td class="px-4 py-2 border border-gray-300">
                                Registration Deadline
                            </td>
                            <td class="px-4 py-2 border border-gray-300 text-center space-x-2">
                                <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-yellow-500 text-white font-semibold hover:bg-yellow-600">
                                    Edit
                                </a>
                                <button class="inline-flex items-center justify-center w-20 h-10 rounded bg-red-500 text-white font-semibold hover:bg-red-600">
                                    Delete
                                </button>
                                <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-blue-500 text-white font-semibold hover:bg-blue-600">
                                    Detail
                                </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
