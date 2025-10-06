@extends('layouts.admin')

@section('title', 'List Author Information')

@section('content')

<!-- Main Content -->
<div class="flex-1 flex flex-col">

    <!-- Content -->
    <main class="flex-1 px-6 py-10">
        <div class="w-full bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
            <h2 class="text-lg font-semibold text-slate-900 mb-6">Author Information List</h2>

            <!-- Tabel -->
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="w-full border-collapse">
                    <thead class="bg-gray-200 text-slate-900">
                        <tr>
                            <th class="px-3 py-2 border border-gray-300 whitespace-nowrap">ID</th>
                            <th class="px-3 py-2 border border-gray-300">Title</th>
                            <th class="px-3 py-2 border border-gray-300">CTA Text</th>
                            <th class="px-3 py-2 border border-gray-300">CTA Button</th>
                            <th class="px-3 py-2 border border-gray-300">CTA Link</th>
                            <th class="px-3 py-2 border border-gray-300">Intro Paragraph</th>
                            <th class="px-3 py-2 border border-gray-300">Submission Link</th>
                            <th class="px-3 py-2 border border-gray-300">Selection Process</th>
                            <th class="px-3 py-2 border border-gray-300">Preparation</th>
                            <th class="px-3 py-2 border border-gray-300">Non Presented Policy</th>
                            <th class="px-3 py-2 border border-gray-300 whitespace-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-slate-800">
                        @forelse($authorInfos as $author)
                        <tr class="hover:bg-gray-100">
                            <td class="px-3 py-2 border border-gray-300 text-center">{{ $author->id }}</td>
                            <td class="px-3 py-2 border border-gray-300 max-w-[100px] truncate"
                                title="{{ $author->title }}">{{ $author->title }}</td>
                            <td class="px-3 py-2 border border-gray-300 max-w-[100px] truncate"
                                title="{{ $author->cta_text }}">{{ $author->cta_text }}</td>
                            <td class="px-3 py-2 border border-gray-300 max-w-[80px] truncate"
                                title="{{ $author->cta_button }}">{{ $author->cta_button }}</td>
                            <td class="px-3 py-2 border border-gray-300 max-w-[120px] truncate"
                                title="{{ $author->cta_link }}">{{ $author->cta_link }}</td>
                            <td class="px-3 py-2 border border-gray-300 max-w-[160px] truncate break-words"
                                title="{{ $author->intro_paragraph }}">{{ $author->intro_paragraph }}</td>
                            <td class="px-3 py-2 border border-gray-300 max-w-[100px] truncate"
                                title="{{ $author->submission_link }}">{{ $author->submission_link }}</td>
                            <td class="px-3 py-2 border border-gray-300 max-w-[160px] truncate break-words"
                                title="{{ $author->selection_process }}">{{ $author->selection_process }}</td>
                            <td class="px-3 py-2 border border-gray-300 max-w-[160px] truncate break-words"
                                title="{{ $author->preparation_of_contributions }}">
                                {{ $author->preparation_of_contributions }}</td>
                            <td class="px-3 py-2 border border-gray-300 max-w-[160px] truncate break-words"
                                title="{{ $author->non_presented_policy }}">{{ $author->non_presented_policy }}</td>
                            <td class="px-3 py-2 border border-gray-300 text-center whitespace-nowrap">
                                <a href="{{ route('admin.forauthor.edit_authorinformationAdmin') }}"
                                    class="inline-block px-3 py-1.5 rounded bg-yellow-500 text-white text-sm font-medium hover:bg-yellow-600">
                                    Edit
                                </a>
                                <a href="{{ route('admin.forauthor.detail_authorinformationAdmin') }}"
                                    class="inline-block px-3 py-1.5 rounded bg-blue-500 text-white text-sm font-medium hover:bg-blue-600">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center px-4 py-6 border border-gray-300 text-gray-500">
                                Author information is empty
                            </td>
                            <td class="px-3 py-2 border border-gray-300 text-center">
                                <a href="{{ route('admin.forauthor.edit_authorinformationAdmin') }}"
                                    class="inline-block px-3 py-1.5 rounded bg-blue-500 text-white text-sm font-medium hover:bg-blue-600">Add</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </main>
</div>
@endsection