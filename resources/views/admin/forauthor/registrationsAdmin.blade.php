<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Registrations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
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
                    <a href="/author-informations" class="block px-3 py-2 rounded hover:bg-[#334155]">Author Informations</a>
                    <a href="/registrations" class="block px-3 py-2 rounded text-[#00e676] font-semibold">Registrations</a>
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
                <h1 class="text-xl font-bold">Registrations</h1>
                <div class="space-x-6 text-sm">
                    <span>Selamat datang, <strong>admin123</strong></span>
                    <a href="#" class="hover:underline">Lihat website</a>
                    <a href="#" class="hover:underline">Logout</a>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 px-6 py-10" x-data="{ tab: 'registrations' }">
            <div class="w-full bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
                
                <!-- Tab Navigation -->
                <div class="flex space-x-4 mb-6 border-b pb-2">
                    <button @click="tab = 'registrations'" 
                            :class="tab === 'registrations' ? 'border-b-2 border-blue-500 text-blue-600 font-semibold' : 'text-gray-600'" 
                            class="px-3 py-2 focus:outline-none">
                        Registrations
                    </button>
                    <button @click="tab = 'fee'" 
                            :class="tab === 'fee' ? 'border-b-2 border-blue-500 text-blue-600 font-semibold' : 'text-gray-600'" 
                            class="px-3 py-2 focus:outline-none">
                        Registration Fee
                    </button>
                    <button @click="tab = 'payment'" 
                            :class="tab === 'payment' ? 'border-b-2 border-blue-500 text-blue-600 font-semibold' : 'text-gray-600'" 
                            class="px-3 py-2 focus:outline-none">
                        Payment Method
                    </button>
                </div>

                <!-- Section: Registrations -->
                <div x-show="tab === 'registrations'">
                    <h2 class="text-lg font-semibold text-slate-900 mb-4">Registrations</h2>
                    <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                        <thead class="bg-gray-200 text-slate-900">
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">CTA Title</th>
                                <th class="px-4 py-2 border">CTA Button</th>
                                <th class="px-4 py-2 border">CTA Link</th>
                                <th class="px-4 py-2 border">Notes</th>
                                <th class="px-4 py-2 border">Conference Fee</th>
                                <th class="px-4 py-2 border">Bank Name</th>
                                <th class="px-4 py-2 border">Account Name</th>
                                <th class="px-4 py-2 border">Virtual Account</th>
                                <th class="px-4 py-2 border">Paypal Email</th>
                                <th class="px-4 py-2 border">Paypal Info</th>
                                <th class="px-4 py-2 border">Registration Procedures</th>
                                <th class="px-4 py-2 border">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white text-slate-800">
                            <tr>
                                <td class="px-4 py-2 border">1</td>
                                <td class="px-4 py-2 border">Please Register Here</td>
                                <td class="px-4 py-2 border">Registrasion Form</td>
                                <td class="px-4 py-2 border">#</td>
                                <td class="px-4 py-2 border">• Maximum number of pages for a normal paper is 6...</td>
                                <td class="px-4 py-2 border">• To be announced.</td>
                                <td class="px-4 py-2 border">Bank Negara Indonesia (PERSERO)</td>
                                <td class="px-4 py-2 border">Telkom University – ICOICT 2025</td>
                                <td class="px-4 py-2 border">832106204020127</td>
                                <td class="px-4 py-2 border">kangandrian@telkomuniversity.ac.id</td>
                                <td class="px-4 py-2 border">Transfer the full registration fee plus a 5% PayPa...</td>
                                <td class="px-4 py-2 border">Complete the payment according to the method of yo...</td>
                                <td class="px-4 py-2 border space-x-2">
                                    <a href="#" class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>
                                    <a href="#" class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</a>
                                    <a href="#" class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Section: Registration Fee -->
                <div x-show="tab === 'fee'">
                    <h2 class="text-lg font-semibold text-slate-900 mb-4">Registration Fee</h2>
                    <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                        <thead class="bg-gray-200 text-slate-900">
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Category</th>
                                <th class="px-4 py-2 border">USD Physical</th>
                                <th class="px-4 py-2 border">IDR Physical</th>
                                <th class="px-4 py-2 border">USD Online</th>
                                <th class="px-4 py-2 border">IDR Online</th>
                                <th class="px-4 py-2 border">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white text-slate-800">
                            <tr>
                                <td class="px-4 py-2 border">1</td>
                                <td class="px-4 py-2 border">IEE Member</td>
                                <td class="px-4 py-2 border">400</td>
                                <td class="px-4 py-2 border">4700000</td>
                                <td class="px-4 py-2 border">300</td>
                                <td class="px-4 py-2 border">4000000</td>
                                <td class="px-4 py-2 border space-x-2">
                                    <a href="#" class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>
                                    <a href="#" class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</a>
                                    <a href="#" class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Section: Payment Method -->
                <div x-show="tab === 'payment'">
                    <h2 class="text-lg font-semibold text-slate-900 mb-4">Payment Method</h2>
                    <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                        <thead class="bg-gray-200 text-slate-900">
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Method</th>
                                <th class="px-4 py-2 border">Bank Name</th>
                                <th class="px-4 py-2 border">Account Name</th>
                                <th class="px-4 py-2 border">Virtual Account</th>
                                <th class="px-4 py-2 border">PayPal Email</th>
                                <th class="px-4 py-2 border">Additional Information</th>
                                <th class="px-4 py-2 border">Important Notes</th>
                                <th class="px-4 py-2 border">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white text-slate-800">
                            <tr>
                                <td class="px-4 py-2 border">1</td>
                                <td class="px-4 py-2 border">Payment Method</td>
                                <td class="px-4 py-2 border">Bank Negara Indonesia (PERSERO)</td>
                                <td class="px-4 py-2 border">Telkom University – ICOICT 2025</td>
                                <td class="px-4 py-2 border">832106204020127</td>
                                <td class="px-4 py-2 border">kangandrian@telkomuniversity.ac.id</td>
                                <td class="px-4 py-2 border">Transfer the full registration fee plus a 5% PayPal...</td>
                                <td class="px-4 py-2 border">Please include your paper ID information on the payment slip.</td>
                                <td class="px-4 py-2 border space-x-2">
                                    <a href="#" class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>
                                    <a href="#" class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</a>
                                    <a href="#" class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>
</body>
</html>
