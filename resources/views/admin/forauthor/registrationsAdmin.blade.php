@extends('layouts.admin')

@section('title', 'List Registrations')

@section('content')

<!-- Main Content -->
<div class="flex-1 flex flex-col">

<<<<<<< HEAD:resources/views/admin/tambah_registrationsAdmin.blade.php
    <!-- Tabs Navigation -->
    <div class="px-6 py-3 flex gap-4 text-sm font-semibold border-b border-slate-700">
        <button id="defaultOpen"
            class="tablink px-4 py-2 rounded-t-md border-b-2 border-transparent text-slate-300 hover:text-white hover:border-teal-400 transition-all"
            onclick="openTab(event, 'Registrations')">Registrations</button>
        <button
            class="tablink px-4 py-2 rounded-t-md border-b-2 border-transparent text-slate-300 hover:text-white hover:border-teal-400 transition-all"
            onclick="openTab(event, 'Fees')">Registration Fee</button>
        <button
            class="tablink px-4 py-2 rounded-t-md border-b-2 border-transparent text-slate-300 hover:text-white hover:border-teal-400 transition-all"
            onclick="openTab(event, 'Payments')">Payment Method</button>
=======
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
>>>>>>> b5bc48c9ac6e2f4b985e6953b495c4d7b449e4ad:resources/views/admin/forauthor/registrationsAdmin.blade.php
    </div>

    <!-- Content Tabs -->
    <main class="flex-1 px-6 py-10 space-y-10">

        <!-- Tab: Registrations -->
        <div id="Registrations" class="tabcontent hidden">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Registrations List</h2>
                <a href="#"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add</a>
                <table class="w-full border-collapse">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">CTA Title</th>
                            <th class="px-4 py-2 border">CTA Button</th>
                            <th class="px-4 py-2 border">CTA Link</th>
                            <th class="px-4 py-2 border">Notes</th>
                            <th class="px-4 py-2 border">Conference Fee</th>
                            <th class="px-4 py-2 border">Registration Procedures</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-100 text-gray-800">
                            <td class="px-4 py-2 border">1</td>
                            <td class="px-4 py-2 border">Please Register Here</td>
                            <td class="px-4 py-2 border">Registration Form</td>
                            <td class="px-4 py-2 border">#</td>
                            <td class="px-4 py-2 border">Maximum 6 pages per paper...</td>
                            <td class="px-4 py-2 border">To be announced.</td>
                            <td class="px-4 py-2 border">Follow payment method listed.</td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center gap-2">
                                    <a href="#"
                                        class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>
                                    <button
                                        class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                                    <a href="#"
                                        class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tab: Registration Fee -->
        <div id="Fees" class="tabcontent hidden">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Registration Fee List</h2>
                <a href="#"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add</a>
                <table class="w-full border-collapse">
                    <thead class="bg-gray-200 text-gray-700">
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
                    <tbody>
                        <tr class="hover:bg-gray-100 text-gray-800">
                            <td class="px-4 py-2 border">1</td>
                            <td class="px-4 py-2 border">IEEE Member</td>
                            <td class="px-4 py-2 border">400</td>
                            <td class="px-4 py-2 border">4,700,000</td>
                            <td class="px-4 py-2 border">300</td>
                            <td class="px-4 py-2 border">4,000,000</td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center gap-2">
                                    <a href="#"
                                        class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>
                                    <button
                                        class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                                    <a href="#"
                                        class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tab: Payment Method -->
        <div id="Payments" class="tabcontent hidden">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Payment Method List</h2>
                <a href="#"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add</a>
                <table class="w-full border-collapse">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Method</th>
                            <th class="px-4 py-2 border">Bank Name</th>
                            <th class="px-4 py-2 border">Account Name</th>
                            <th class="px-4 py-2 border">Virtual Account</th>
                            <th class="px-4 py-2 border">PayPal Email</th>
                            <th class="px-4 py-2 border">Additional Info</th>
                            <th class="px-4 py-2 border">Important Notes</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-100 text-gray-800">
                            <td class="px-4 py-2 border">1</td>
                            <td class="px-4 py-2 border">Bank Transfer</td>
                            <td class="px-4 py-2 border">BNI</td>
                            <td class="px-4 py-2 border">Telkom University – ICOICT</td>
                            <td class="px-4 py-2 border">832106204020127</td>
                            <td class="px-4 py-2 border">kangandrian@telkomuniversity.ac.id</td>
                            <td class="px-4 py-2 border">Transfer full + 5% PayPal fee.</td>
                            <td class="px-4 py-2 border">Include paper ID on payment slip.</td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center gap-2">
                                    <a href="#"
                                        class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</a>
                                    <button
                                        class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                                    <a href="#"
                                        class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</div>

<!-- JS Tab Script -->
<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) tabcontent[i].style.display = "none";
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) tablinks[i].classList.remove("text-white", "border-teal-400");
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.classList.add("text-white", "border-teal-400");
    }
    document.getElementById("defaultOpen").click();
</script>

@endsection
