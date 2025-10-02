<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit dan Tambah Speakers</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A] text-slate-100">

<!-- Header -->
<header class="bg-[#1a1f27]/95 backdrop-blur shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-5">
        <h1 class="text-2xl font-bold tracking-normal">
            Edit dan 
            <span class="bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] bg-clip-text text-transparent font-bold">
                Tambah Speakers
            </span>
        </h1>
    </div>
</header>



    <!-- Content -->
    <main class="flex-1 flex justify-center items-start px-4 py-10">
        <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
            
            <h2 class="text-base font-semibold text-slate-900 mb-6">Informasi Speakers</h2>

            <form action="#" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Name</label>
                    <input type="text" name="name" 
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                </div>

                <!-- University -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">University</label>
                    <input type="text" name="university" 
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                </div>

                <!-- Upload Image -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Image</label>
                    <input type="file" name="image" 
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2">
                    <p class="text-xs text-slate-600 mt-1">Format: JPG, PNG, GIF, WEBP (Maks. 5MB)</p>
                </div>

                <!-- Biodata -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Biodata</label>
                    <input type="text" name="biodata" 
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                </div>

                <!-- Full Biodata -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Full Biodata</label>
                    <textarea name="full_biodata" rows="4"
                              class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"></textarea>
                </div>

                <!-- Speaker Type -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-2">Speaker Type</label>
                    <div class="border border-gray-400 bg-gray-100 rounded-md px-4 py-3 space-y-2">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="speaker_type" value="keynote" class="focus:ring-0">
                            Keynote Speakers
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="speaker_type" value="tutorial" class="focus:ring-0">
                            Tutorial Speakers
                        </label>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-3 pt-4">
                    <button type="reset" 
                            class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-6 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>
