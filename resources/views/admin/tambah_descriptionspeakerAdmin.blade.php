@extends('layouts.admin')

@section('title', 'List Description Speakers')

@section('content')

<!-- Main Content -->
<div class="flex-1 flex flex-col">
    
    <!-- Content Section -->
    <div class="p-6">
        <div class="w-full bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
            <h2 class="text-lg font-semibold text-slate-900 mb-6">Description Speakers List</h2>

            <!-- Table -->
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="w-full border-collapse border border-gray-300 table-auto">
                    <thead class="bg-gray-200 text-slate-900">
                        <tr>
                            <th class="px-4 py-2 border border-gray-300">ID</th>
                            <th class="px-4 py-2 border border-gray-300">Speaker ID</th>
                            <th class="px-4 py-2 border border-gray-300">Type</th>
                            <th class="px-4 py-2 border border-gray-300">Content</th>
                            <th class="px-4 py-2 border border-gray-300 whitespace-nowrap">Action</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white text-slate-800">
                        <!-- Row 1 -->
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border border-gray-300 text-center">1</td>
                            <td class="px-4 py-2 border border-gray-300 text-center">1</td>
                            <td class="px-4 py-2 border border-gray-300 font-semibold capitalize">abstract</td>
                            <td class="px-4 py-2 border border-gray-300">
                                Future Directions of AI in Societal Impact Projects: 
                                Ethics, Sustainability, and Human-Centered Design.
                            </td>
                            <td class="px-4 py-2 border border-gray-300">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-yellow-500 text-white font-semibold hover:bg-yellow-600">Edit</a>
                                    <button class="inline-flex items-center justify-center w-20 h-10 rounded bg-red-500 text-white font-semibold hover:bg-red-600">Delete</button>
                                    <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-blue-500 text-white font-semibold hover:bg-blue-600">Detail</a>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border border-gray-300 text-center">2</td>
                            <td class="px-4 py-2 border border-gray-300 text-center">1</td>
                            <td class="px-4 py-2 border border-gray-300 font-semibold capitalize">research_focus</td>
                            <td class="px-4 py-2 border border-gray-300">
                                <ul class="list-disc list-inside">
                                    <li>Human Computer Interaction (HCI)</li>
                                    <li>AI for Education</li>
                                    <li>Machine Learning Applications</li>
                                </ul>
                            </td>
                            <td class="px-4 py-2 border border-gray-300">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-yellow-500 text-white font-semibold hover:bg-yellow-600">Edit</a>
                                    <button class="inline-flex items-center justify-center w-20 h-10 rounded bg-red-500 text-white font-semibold hover:bg-red-600">Delete</button>
                                    <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-blue-500 text-white font-semibold hover:bg-blue-600">Detail</a>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 3 -->
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border border-gray-300 text-center">3</td>
                            <td class="px-4 py-2 border border-gray-300 text-center">1</td>
                            <td class="px-4 py-2 border border-gray-300 font-semibold capitalize">professional_event</td>
                            <td class="px-4 py-2 border border-gray-300">
                                Invited speaker at The 5th Annual Global Congress 
                                on Artificial Intelligence and Data Science.
                            </td>
                            <td class="px-4 py-2 border border-gray-300">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-yellow-500 text-white font-semibold hover:bg-yellow-600">Edit</a>
                                    <button class="inline-flex items-center justify-center w-20 h-10 rounded bg-red-500 text-white font-semibold hover:bg-red-600">Delete</button>
                                    <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-blue-500 text-white font-semibold hover:bg-blue-600">Detail</a>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 4 -->
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border border-gray-300 text-center">4</td>
                            <td class="px-4 py-2 border border-gray-300 text-center">1</td>
                            <td class="px-4 py-2 border border-gray-300 font-semibold capitalize">training_workshop</td>
                            <td class="px-4 py-2 border border-gray-300">
                                Delivered training programs for various organizations 
                                focusing on AI ethics, sustainable development, and 
                                research data management.
                            </td>
                            <td class="px-4 py-2 border border-gray-300">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-yellow-500 text-white font-semibold hover:bg-yellow-600">Edit</a>
                                    <button class="inline-flex items-center justify-center w-20 h-10 rounded bg-red-500 text-white font-semibold hover:bg-red-600">Delete</button>
                                    <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-blue-500 text-white font-semibold hover:bg-blue-600">Detail</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
