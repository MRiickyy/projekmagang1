<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit dan Tambah Registrations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A] text-slate-100">

<!-- Header -->
<header class="bg-[#1a1f27]/95 backdrop-blur shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-5">
        <h1 class="text-2xl font-bold tracking-normal">
            Edit dan 
            <span class="bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] bg-clip-text text-transparent font-bold">
                Tambah Registrations
            </span>
        </h1>
    </div>
</header>

<!-- Content -->
<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">Form Registrasi</h2>

        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Title -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Title</label>
                <input type="text" name="title" 
                       class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                       placeholder="Registration Title" />
            </div>

            <!-- CTA -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">CTA Text</label>
                <input type="text" name="cta_text"
                       class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                       placeholder="Please Register Here" />
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">CTA Button</label>
                <input type="text" name="cta_button"
                       class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                       placeholder="Registration Form" />
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">CTA Link</label>
                <input type="text" name="cta_link"
                       class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                       placeholder="https://..." />
            </div>

            <!-- Paragraphs -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Intro Paragraph</label>
                <textarea name="intro_paragraph" rows="3"
                          class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                          placeholder="Write introduction here..."></textarea>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Submission Link</label>
                <textarea name="submission_link" rows="2"
                          class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                          placeholder="Enter submission link..."></textarea>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Selection Process</label>
                <textarea name="selection_process" rows="3"
                          class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"></textarea>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Preparation of Contributions</label>
                <textarea name="preparation_of_contributions" rows="3"
                          class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"></textarea>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Non Presented Policy</label>
                <textarea name="non_presented_policy" rows="3"
                          class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"></textarea>
            </div>

            <!-- Notes & Fee -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Notes</label>
                <textarea name="notes" rows="3"
                          class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"></textarea>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Conference Fee Includes</label>
                <textarea name="conference_fee_include" rows="3"
                          class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"></textarea>
            </div>

            <!-- Payment Methods -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Bank Name</label>
                <input type="text" name="bank_name"
                       class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" />
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Account Name</label>
                <input type="text" name="account_name"
                       class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" />
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Virtual Account</label>
                <input type="text" name="virtual_account"
                       class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" />
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Paypal Email</label>
                <input type="email" name="paypal_email"
                       class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" />
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Paypal Info</label>
                <textarea name="paypal_info" rows="2"
                          class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"></textarea>
            </div>

            <!-- Registration Procedures -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Registration Procedures</label>
                <textarea name="registration_procedures" rows="3"
                          class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"></textarea>
            </div>
            
            <!-- Category Fee -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Category Fee</label>
                    <input type="text" name="category" class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-1">Physical Mode (USD)</label>
                        <input type="text" name="usd_physical" class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-1">Physical Mode (IDR)</label>
                        <input type="text" name="idr_physical" class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-1">Online Mode (USD)</label>
                        <input type="text" name="usd_online" class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-1">Online Mode (IDR)</label>
                        <input type="text" name="idr_online" class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" >
                    </div>
                </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="reset" class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Batal
                </button>
                <button type="submit" class="px-6 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</main>

</body>
</html>
