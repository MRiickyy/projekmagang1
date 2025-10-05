<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Author Informations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A] text-slate-100">

    <!-- Sidebar -->
    <aside class="w-64 min-h-screen bg-[#1a1f27]/95 shadow-md">
        <div class="px-6 py-6 text-lg font-bold">Dashboard Admin</div>
        <nav class="px-4 space-y-3 text-sm">
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Dashboard</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">HomeSelection</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Call For Papers</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Speakers</a>
            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Committees</a>

            <!-- For Authors submenu -->
            <div x-data="{ open: true }" class="space-y-1">
                <button @click="open = !open" 
                    class="w-full flex justify-between items-center px-3 py-2 rounded hover:bg-[#334155]">
                    <span>For Authors</span>
                    <svg :class="{'rotate-180': open}" class="w-4 h-4 transform transition-transform" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="ml-4 space-y-1">
                    <a href="/admin/mainAuthorInformation" class="block px-3 py-2 rounded text-[#00e676] font-semibold">Author Informations</a>
                    <a href="/registrations" class="block px-3 py-2 rounded hover:bg-[#334155]">Registrations</a>
                    <a href="/contacts" class="block px-3 py-2 rounded hover:bg-[#334155]">Contacts</a>
                </div>
            </div>

            <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Events</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-[#1a1f27]/95 backdrop-blur shadow-md">
            <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
                <h1 class="text-xl font-bold">Author Informations</h1>
                <div class="space-x-6 text-sm">
                    <span>Selamat datang, <strong>admin123</strong></span>
                    <a href="#" class="hover:underline">Lihat website</a>
                    <a href="#" class="hover:underline">Logout</a>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 px-6 py-10">
            <div class="w-full bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
                <h2 class="text-lg font-semibold text-slate-900 mb-6">Author Information List</h2>

                <!-- Tabel -->
                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="w-full border-collapse border border-gray-300 table-auto">
                        <thead class="bg-gray-200 text-slate-900">
                            <tr>
                                <th class="px-4 py-2 border border-gray-300 whitespace-nowrap">ID</th>
                                <th class="px-4 py-2 border border-gray-300">Title</th>
                                <th class="px-4 py-2 border border-gray-300">CTA Text</th>
                                <th class="px-4 py-2 border border-gray-300">CTA Button</th>
                                <th class="px-4 py-2 border border-gray-300">CTA Link</th>
                                <th class="px-4 py-2 border border-gray-300">Intro Paragraph</th>
                                <th class="px-4 py-2 border border-gray-300">Submission Link</th>
                                <th class="px-4 py-2 border border-gray-300">Selection Process</th>
                                <th class="px-4 py-2 border border-gray-300">Preparation</th>
                                <th class="px-4 py-2 border border-gray-300">Non Presented Policy</th>
                                <th class="px-4 py-2 border border-gray-300 whitespace-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white text-slate-800">
                            @forelse($authorInfos as $author)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-4 py-2 border border-gray-300 whitespace-nowrap">{{ $author->id }}</td>
                                    <td class="px-4 py-2 border border-gray-300 max-w-[120px] truncate" title="{{ $author->title }}">{{ $author->title }}</td>
                                    <td class="px-4 py-2 border border-gray-300 max-w-[120px] truncate" title="{{ $author->cta_text }}">{{ $author->cta_text }}</td>
                                    <td class="px-4 py-2 border border-gray-300 max-w-[120px] truncate" title="{{ $author->cta_button }}">{{ $author->cta_button }}</td>
                                    <td class="px-4 py-2 border border-gray-300 max-w-[150px] truncate" title="{{ $author->cta_link }}">{{ $author->cta_link }}</td>
                                    <td class="px-4 py-2 border border-gray-300 max-w-[180px] truncate break-words" title="{{ $author->intro_paragraph }}">{{ $author->intro_paragraph }}</td>
                                    <td class="px-4 py-2 border border-gray-300 max-w-[120px] truncate" title="{{ $author->submission_link }}">{{ $author->submission_link }}</td>
                                    <td class="px-4 py-2 border border-gray-300 max-w-[200px] truncate break-words" title="{{ $author->selection_process }}">{{ $author->selection_process }}</td>
                                    <td class="px-4 py-2 border border-gray-300 max-w-[200px] truncate break-words" title="{{ $author->preparation_of_contributions }}">{{ $author->preparation_of_contributions }}</td>
                                    <td class="px-4 py-2 border border-gray-300 max-w-[200px] truncate break-words" title="{{ $author->non_presented_policy }}">{{ $author->non_presented_policy }}</td>
                                    <td class="px-4 py-2 border border-gray-300 space-x-2 whitespace-nowrap">
                                        <a href="{{ route('admin.edit_authorinformationAdmin') }}" 
                                            class="inline-flex items-center justify-center w-20 h-10 rounded bg-yellow-500 text-white font-semibold hover:bg-yellow-600">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.delete_authorinformationAdmin', $author->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('delete this data?')" 
                                                class="inline-flex items-center justify-center w-20 h-10 rounded bg-red-500 text-white font-semibold hover:bg-red-600">
                                                Delete
                                            </button>
                                        </form>
                                        <a href="#" 
                                            class="inline-flex items-center justify-center w-20 h-10 rounded bg-blue-500 text-white font-semibold hover:bg-blue-600">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center px-4 py-6 border border-gray-300 text-gray-500">
                                        Author information is empty
                                    </td>
                                    <td class="px-4 py-2 border border-gray-300 space-x-2 whitespace-nowrap text-center">
                                        <a href="{{ route('admin.edit_authorinformationAdmin') }}" 
                                            class="inline-flex items-center justify-center w-20 h-10 rounded bg-yellow-500 text-white font-semibold hover:bg-yellow-600">Edit</a>
                                        <button class="inline-flex items-center justify-center w-20 h-10 rounded bg-red-500 text-white font-semibold hover:bg-red-600">Delete</button>
                                        <a href="#" class="inline-flex items-center justify-center w-20 h-10 rounded bg-blue-500 text-white font-semibold hover:bg-blue-600">Detail</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>
</body>
</html>
