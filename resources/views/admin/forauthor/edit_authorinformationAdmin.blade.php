<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Author Information Edit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A] text-slate-100">

<!-- Header -->
<header class="bg-[#1a1f27]/95 backdrop-blur shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-5">
        <h1 class="text-2xl font-bold tracking-normal">
            <span class="bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] bg-clip-text text-transparent font-bold">
                Author Information Edit
            </span>
        </h1>
    </div>
</header>

<!-- Content -->
<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">Author Information</h2>

        <form action="{{ route('admin.forauthor.update_authorinformation') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf


            <!-- Title -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="title">Title</label>
                <input type="text" name="title"
                       value="{{ old('title', $authorInfo->title ?? '') }}" 
                       class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
            </div>

            <!-- CTA Text -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="cta_text">CTA Text</label>
                <input type="text" name="cta_text" 
                       value="{{ old('cta_text', $authorInfo->cta_text ?? '') }}"
                       class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
            </div>

            <!-- CTA Button -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="cta_button">CTA Button</label>
                <input type="text" name="cta_button" 
                       value="{{ old('cta_button', $authorInfo->cta_button ?? '') }}"
                       class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
            </div>

            <!-- CTA Link -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="cta_link">CTA Link</label>
                <input type="text" name="cta_link"
                       value="{{ old('cta_link', $authorInfo->cta_link ?? '') }}"
                       class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
            </div>

            <!-- Intro Paragraph -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="intro_paragraph">Intro Paragraph</label>
                <textarea name="intro_paragraph" rows="4"
                          class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">{{ old('intro_paragraph', $authorInfo->intro_paragraph ?? '') }}</textarea>

            </div>

            <!-- Submission Link -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="submission_link">Submission Link</label>
                <textarea name="submission_link" rows="2"
                          class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">{{ old('submission_link', $authorInfo->submission_link ?? '') }}</textarea>
            </div>

            <!-- Selection Process -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="selection_process">Selection Process</label>
                <textarea name="selection_process" rows="4"
                          class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">{{ old('selection_process', $authorInfo->selection_process ?? '') }}</textarea>
            </div>

            <!-- Preparation of Contributions -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="preparation_of_contributions">Preparation of Contributions</label>
                <textarea name="preparation_of_contributions" rows="4"
                          class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">{{ old('preparation_of_contributions', $authorInfo->preparation_of_contributions ?? '') }}</textarea>
            </div>

            <!-- Non Presented Policy -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="non_presented_policy">Non Presented Policy</label>
                <textarea name="non_presented_policy" rows="4"
                          class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">{{ old('non_presented_policy', $authorInfo->non_presented_policy ?? '') }}</textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" 
                        onclick="window.history.back()" 
                        class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Cancel
                </button>
                <button type="submit" 
                        class="px-7 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md">
                    Save
                </button>
            </div>
        </form>
    </div>
</main>
</body>
</html>
