@extends('layouts.admin')

@section('title', 'List Call For Papers')

@section('content')

<!-- Main Content -->
<div class="flex-1 flex flex-col">
    
    <!-- Content Section -->
    <div class="p-6">
        <div class="w-full bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
            <h2 class="text-lg font-semibold text-slate-900 mb-6">Call For Papers List</h2>

            <!-- Table -->
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="w-full border-collapse border border-gray-300 table-auto">
                    <thead class="bg-gray-200 text-slate-900">
                        <tr>
                            <th class="px-4 py-2 border border-gray-300">ID</th>
                            <th class="px-4 py-2 border border-gray-300">Section</th>
                            <th class="px-4 py-2 border border-gray-300">Title</th>
                            <th class="px-4 py-2 border border-gray-300">Content</th>
                            <th class="px-4 py-2 border border-gray-300 whitespace-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-slate-800">

                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border border-gray-300 text-center">1</td>
                            <td class="px-4 py-2 border border-gray-300">call_for_papers</td>
                            <td class="px-4 py-2 border border-gray-300 font-semibold">
                                Artificial Intelligence &amp; Machine Learning
                            </td>
                            <td class="px-4 py-2 border border-gray-300">
                                <ul class="list-disc list-inside">
                                    <li>Learning Algorithms & Methods</li>
                                    <li>Explainable AI</li>
                                    <li>Neural Networks</li>
                                </ul>
                            </td>
                            <td class="px-4 py-2 border border-gray-300 text-center space-x-2">
                                <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-yellow-500 text-white font-semibold hover:bg-yellow-600">Edit</a>
                                <button class="inline-flex items-center justify-center w-20 h-10 rounded bg-red-500 text-white font-semibold hover:bg-red-600">Delete</button>
                                <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-blue-500 text-white font-semibold hover:bg-blue-600">Detail</a>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border border-gray-300 text-center">2</td>
                            <td class="px-4 py-2 border border-gray-300">call_for_papers</td>
                            <td class="px-4 py-2 border border-gray-300 font-semibold">
                                Data Science and Its Implementation
                            </td>
                            <td class="px-4 py-2 border border-gray-300">
                                <ul class="list-disc list-inside">
                                    <li>Big Data Analytics</li>
                                    <li>Statistical Methods</li>
                                    <li>Text Mining</li>
                                </ul>
                            </td>
                            <td class="px-4 py-2 border border-gray-300 text-center space-x-2">
                                <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-yellow-500 text-white font-semibold hover:bg-yellow-600">Edit</a>
                                <button class="inline-flex items-center justify-center w-20 h-10 rounded bg-red-500 text-white font-semibold hover:bg-red-600">Delete</button>
                                <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-blue-500 text-white font-semibold hover:bg-blue-600">Detail</a>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border border-gray-300 text-center">3</td>
                            <td class="px-4 py-2 border border-gray-300">call_for_papers</td>
                            <td class="px-4 py-2 border border-gray-300 font-semibold">
                                IoT System and Infrastructure
                            </td>
                            <td class="px-4 py-2 border border-gray-300">
                                <ul class="list-disc list-inside">
                                    <li>IoT Architectures</li>
                                    <li>IoT Security</li>
                                    <li>IoT Scalability</li>
                                </ul>
                            </td>
                            <td class="px-4 py-2 border border-gray-300 text-center space-x-2">
                                <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-yellow-500 text-white font-semibold hover:bg-yellow-600">Edit</a>
                                <button class="inline-flex items-center justify-center w-20 h-10 rounded bg-red-500 text-white font-semibold hover:bg-red-600">Delete</button>
                                <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-blue-500 text-white font-semibold hover:bg-blue-600">Detail</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
