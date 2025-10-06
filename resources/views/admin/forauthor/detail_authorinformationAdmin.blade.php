<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Author Information</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A] text-slate-100">

<!-- Header -->
<header class="bg-[#1a1f27]/95 backdrop-blur shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-5">
        <h1 class="text-2xl font-bold tracking-normal">
            <span class="bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] bg-clip-text text-transparent font-bold">
                Author Information Detail
            </span>
        </h1>
    </div>
</header>

<!-- Content -->
<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">Author Information</h2>

        <div class="space-y-5">

            <!-- Title -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Title</label>
                <p class="px-3 py-2 bg-gray-100 rounded-md border border-gray-400">
                    {{ $authorInfo->title }}
                </p>
            </div>

            <!-- CTA Text -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">CTA Text</label>
                <p class="px-3 py-2 bg-gray-100 rounded-md border border-gray-400">
                    {{ $authorInfo->cta_text }}
                </p>
            </div>

            <!-- CTA Button -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">CTA Button</label>
                <p class="px-3 py-2 bg-gray-100 rounded-md border border-gray-400">
                    {{ $authorInfo->cta_button }}
                </p>
            </div>

            <!-- CTA Link -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">CTA Link</label>
                <p class="px-3 py-2 bg-gray-100 rounded-md border border-gray-400">
                    {{ $authorInfo->cta_link }}
                </p>
            </div>

            <!-- Intro Paragraph -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Intro Paragraph</label>
                <p class="px-3 py-2 bg-gray-100 rounded-md border border-gray-400 whitespace-pre-line">
                    {{ $authorInfo->intro_paragraph }}
                </p>
            </div>

            <!-- Submission Link -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Submission Link</label>
                <p class="px-3 py-2 bg-gray-100 rounded-md border border-gray-400 whitespace-pre-line">
                    {{ $authorInfo->submission_link }}
                </p>
            </div>

            <!-- Selection Process -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Selection Process</label>
                <p class="px-3 py-2 bg-gray-100 rounded-md border border-gray-400 whitespace-pre-line">
                    {{ $authorInfo->selection_process }}
                </p>
            </div>

            <!-- Preparation of Contributions -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Preparation of Contributions</label>
                <p class="px-3 py-2 bg-gray-100 rounded-md border border-gray-400 whitespace-pre-line">
                    {{ $authorInfo->preparation_of_contributions }}
                </p>
            </div>

            <!-- Non Presented Policy -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Non Presented Policy</label>
                <p class="px-3 py-2 bg-gray-100 rounded-md border border-gray-400 whitespace-pre-line">
                    {{ $authorInfo->non_presented_policy }}
                </p>
            </div>

        </div>
        <!-- Button Back -->
        <div class="pt-6">
            <a href="{{ route('admin.forauthor.authorinformationAdmin') }}"
            class="inline-block px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                Back
            </a>
        </div>
    </div>
</main>
</body>
</html>
