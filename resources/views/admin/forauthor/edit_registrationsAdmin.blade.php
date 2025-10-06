<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit dan Tambah Registrations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Script untuk tab switching
        function showSection(sectionId) {
            document.querySelectorAll(".tab-section").forEach(sec => sec.classList.add("hidden"));
            document.getElementById(sectionId).classList.remove("hidden");

            document.querySelectorAll(".tab-button").forEach(btn => btn.classList.remove("border-b-4", "border-teal-400", "text-teal-400"));
            document.getElementById(sectionId + "-btn").classList.add("border-b-4", "border-teal-400", "text-teal-400");
        }
        document.addEventListener("DOMContentLoaded", () => {
            showSection("registrations"); // default tampilkan registrations
        });
    </script>
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A] text-slate-100">

<!-- Header -->
<header class="bg-[#1a1f27]/95 backdrop-blur shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-5">
        <h1 class="text-2xl font-bold tracking-normal">
            <span class="bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] bg-clip-text text-transparent font-bold">
                Registrations Edit
            </span>
        </h1>
    </div>
</header>

<!-- Tabs -->
<nav class="max-w-7xl mx-auto px-6 mt-6">
    <div class="flex space-x-6 text-lg font-semibold">
        <button id="registrations-btn" onclick="showSection('registrations')" 
                class="tab-button pb-2 transition">
            Registrations
        </button>
        <button id="fee-btn" onclick="showSection('fee')" 
                class="tab-button pb-2 transition">
            Registration Fee
        </button>
        <button id="payment-btn" onclick="showSection('payment')" 
                class="tab-button pb-2 transition">
            Payment Method
        </button>
    </div>
</nav>

<!-- Content -->
<main class="flex-1 flex justify-center items-start px-4 py-8">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <!-- Registrations Section -->
        <section id="registrations" class="tab-section hidden">
            <h2 class="text-base font-semibold text-slate-900 mb-6">Registration Form</h2>
            <form action="#" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">CTA Title</label>
                    <input type="text" name="cta_title" placeholder="Registration Title"
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">CTA Button</label>
                    <input type="text" name="cta_button" placeholder="Registration Form"
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">CTA Link</label>
                    <input type="text" name="cta_link" placeholder="https://..."
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Notes</label>
                    <textarea name="notes" rows="3"
                              class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Conference Fee Include</label>
                    <input type="text" name="conference_fee_include"
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Bank Name</label>
                    <input type="text" name="bank_name"
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Account Name</label>
                    <input type="text" name="account_name"
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Virtual Account</label>
                    <input type="text" name="virtual_account"
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">PayPal Email</label>
                    <input type="text" name="paypal_email"
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">PayPal Info</label>
                    <input type="text" name="paypal_info"
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Registration Procedures</label>
                    <input type="text" name="registrations_procedures"
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
            </form>
        </section>

        <!-- Registration Fee Section -->
        <section id="fee" class="tab-section hidden">
            <h2 class="text-base font-semibold text-slate-900 mb-6">Registration Fee</h2>
            <form action="#" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Category Fee</label>
                    <input type="text" name="category" 
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-1">Physical Mode (USD)</label>
                        <input type="text" name="usd_physical"
                               class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-1">Physical Mode (IDR)</label>
                        <input type="text" name="idr_physical"
                               class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-1">Online Mode (USD)</label>
                        <input type="text" name="usd_online"
                               class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-1">Online Mode (IDR)</label>
                        <input type="text" name="idr_online"
                               class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                    </div>
                </div>
            </form>
        </section>

        <!-- Payment Method Section -->
        <section id="payment" class="tab-section hidden">
            <h2 class="text-base font-semibold text-slate-900 mb-6">Payment Method</h2>
            <form action="#" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Method Name</label>
                    <input type="text" name="method_name"
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Bank Name</label>
                    <input type="text" name="bank_name"
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Account Name</label>
                    <input type="text" name="account_name"
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Virtual Account</label>
                    <input type="text" name="virtual_account"
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Paypal Email</label>
                    <input type="email" name="paypal_email"
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Paypal Info</label>
                    <textarea name="additional_info" rows="2"
                              class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1">Important Notes</label>
                    <input type="text" name="important_notes"
                           class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"/>
                </div>
            </form>
        </section>

        <!-- Buttons -->
        <div class="flex justify-end gap-3 pt-6">
            <button type="reset" class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                Cancel
            </button>
            <button type="submit" class="px-7 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md">
                Save
            </button>
        </div>
    </div>
</main>

</body>
</html>