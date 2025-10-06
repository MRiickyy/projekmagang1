<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Description Speaker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A] text-slate-100">

<!-- Header -->
<header class="bg-[#1a1f27]/95 backdrop-blur shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-5">
        <h1 class="text-2xl font-bold tracking-normal">
            <span class="bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] bg-clip-text text-transparent">
                Description Speaker
            </span>
        </h1>
    </div>
</header>

<!-- Main Content -->
<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">Create Description Speaker</h2>

        <!-- Form -->
        <form action="#" method="POST" class="space-y-5">

            <!-- Speaker -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="speaker_id">Speaker ID</label>
                <input type="number" id="speaker_id" name="speaker_id" placeholder="Enter Speaker ID"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
            </div>

            <!-- Title -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="title">Title</label>
                <select id="title" name="title"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                    <option value="" disabled selected>Select Description Type</option>
                    <option value="abstract">Abstract</option>
                    <option value="research_focus">Research Focus</option>
                    <option value="professional_event">Professional Event</option>
                    <option value="training_workshop">Training / Workshop</option>
                </select>
            </div>

            <!-- Content -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="content">Content</label>
                <textarea id="content" name="content" rows="5" placeholder="Enter content here..."
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" onclick="window.history.back()"
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
