@extends('layouts.app')

@section('title', 'Keynote Speakers - ICOICT 2025')

@section('content')
    <!-- BODY -->
    <main class="bg-white my-12">
        <div class="max-w-5xl mx-auto px-5">

            <!-- Title -->
            <div class="text-center mb-8">
                <h1 class="relative inline-block text-3xl font-bold tracking-wide text-[#1a1f27]/95">
                    REGISTRATION
                    <!-- Garis bawah -->
                    <span class="block h-1 w-40 mx-auto mt-2 bg-gradient-to-r from-green-500 to-blue-500"></span>
                </h1>
            </div>


            <!-- CTA Box -->
            <div class="mt-10 bg-[#1a1f27] rounded-xl p-8 shadow-xl space-y-8 text-center text-white">
                <p class="mb-2 text-white">
                    Please Register Here
                </p>
                <a href="#"
                   class="inline-flex items-center justify-center rounded-full bg-[#25d366] hover:bg-[#1fb857] transition px-6 py-2 font-semibold shadow">
                    Registration Form
                </a>
            </div>

            <!-- Pricing Table -->
            <div class="overflow-x-auto">
                <div class="overflow-hidden rounded-lg shadow-md border border-gray-200 mt-6">
                    <table class="w-full text-center">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-200 px-4 py-3 text-left">Category</th>
                            <th colspan="2" class="border border-gray-200 px-4 py-3">Physical Mode</th>
                            <th colspan="2" class="border border-gray-200 px-4 py-3">Online Mode</th>
                        </tr>
                        <tr>
                            <th class="border border-gray-200 px-4 py-2"></th>
                            <th class="border border-gray-200 px-4 py-2">USD</th>
                            <th class="border border-gray-200 px-4 py-2">IDR</th>
                            <th class="border border-gray-200 px-4 py-2">USD</th>
                            <th class="border border-gray-200 px-4 py-2">IDR</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd:bg-white even:bg-gray-50">
                            <td class="border border-gray-200 px-4 py-2 text-left">IEEE Member</td>
                            <td class="border border-gray-200 px-4 py-2">400</td>
                            <td class="border border-gray-200 px-4 py-2">4,700,000</td>
                            <td class="border border-gray-200 px-4 py-2">300</td>
                            <td class="border border-gray-200 px-4 py-2">4,000,000</td>
                        </tr>
                        <tr class="odd:bg-white even:bg-gray-50">
                            <td class="border border-gray-200 px-4 py-2 text-left">Non-IEEE Member</td>
                            <td class="border border-gray-200 px-4 py-2">450</td>
                            <td class="border border-gray-200 px-4 py-2">5,700,000</td>
                            <td class="border border-gray-200 px-4 py-2">350</td>
                            <td class="border border-gray-200 px-4 py-2">5,000,000</td>
                        </tr>
                        <tr class="odd:bg-white even:bg-gray-50">
                            <td class="border border-gray-200 px-4 py-2 text-left">Student IEEE Member</td>
                            <td class="border border-gray-200 px-4 py-2">300</td>
                            <td class="border border-gray-200 px-4 py-2">4,000,000</td>
                            <td class="border border-gray-200 px-4 py-2">250</td>
                            <td class="border border-gray-200 px-4 py-2">3,000,000</td>
                        </tr>
                        <tr class="odd:bg-white even:bg-gray-50">
                            <td class="border border-gray-200 px-4 py-2 text-left">Student Non-IEEE Member</td>
                            <td class="border border-gray-200 px-4 py-2">330</td>
                            <td class="border border-gray-200 px-4 py-2">4,500,000</td>
                            <td class="border border-gray-200 px-4 py-2">280</td>
                            <td class="border border-gray-200 px-4 py-2">3,500,000</td>
                        </tr>
                        <tr class="odd:bg-white even:bg-gray-50">
                            <td class="border border-gray-200 px-4 py-2 text-left">Non-Presenter</td>
                            <td class="border border-gray-200 px-4 py-2">150</td>
                            <td class="border border-gray-200 px-4 py-2">1,500,000</td>
                            <td class="border border-gray-200 px-4 py-2">50</td>
                            <td class="border border-gray-200 px-4 py-2">800,000</td>
                        </tr>
                        <tr class="odd:bg-white even:bg-gray-50">
                            <td class="border border-gray-200 px-4 py-2 text-left">Additional Page (fee for 1 page)</td>
                            <td class="border border-gray-200 px-4 py-2">40</td>
                            <td class="border border-gray-200 px-4 py-2">600,000</td>
                            <td class="border border-gray-200 px-4 py-2">40</td>
                            <td class="border border-gray-200 px-4 py-2">600,000</td>
                        </tr>
                        </tbody>
                    </table>
                </div>    
            </div>

            <!-- Notes Section -->
            <div class="mt-6 bg-gray-100 rounded-xl p-6 shadow-lg">
                <h2 class="text-lg font-semibold mb-3">Notes:</h2>
                <ul class="list-disc list-inside space-y-1">
                    <li>Maximum number of pages for a normal paper is 6</li>
                    <li>To be eligible for the IEEE Member rate you must be an active IEEE Member</li>
                    <li>To be eligible for the student rate you must provide your student ID/Letter of proof</li>
                </ul>

                <h2 class="text-lg font-semibold mt-4 mb-2">The conference fee include:</h2>
                <ul class="list-disc list-inside">
                    <li>To be announced.</li>
                </ul>
            </div>

            <!-- Payment Methods -->
            <div class="mt-6 space-y-4 text-black leading-relaxed">
                <h1 class="text-3xl font-bold mb-6 text-center text-[#1a1f27]/95">Payment Methods</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Virtual Account -->
                <div class="bg-gray-100 rounded-xl p-6 shadow-lg">
                    <div class="flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full mb-4">
                        <span class="font-bold text-gray-700">1</span>
                    </div>
                    <h2 class="text-xl font-bold mb-3 text-center text-[#1a1f27]/95">Virtual Account</h2>
                    <ul class="list-disc list-inside text-black leading-relaxed">
                        <li><span class="font-semibold">Bank Name (in full):</span> Bank Negara Indonesia (PERSERO)</li>
                        <li><span class="font-semibold">Account Name:</span> Telkom University – ICOICT 2025</li>
                        <li><span class="font-semibold">Virtual Account Number:</span> 8321066202400127</li>
                    </ul>
                    <p class="text-red-600 mt-3 font-medium">
                        Important: Please include your paper ID information on the payment slip.
                    </p>
                </div>

                <!-- PayPal -->
                <div class="bg-gray-100 rounded-xl p-6 shadow-lg">
                    <div class="flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full mb-4">
                        <span class="font-bold text-gray-700">2</span>
                    </div>
                    <h2 class="text-xl font-bold mb-3 text-center text-[#1a1f27]/95">PayPal</h2>
                    <ul class="list-disc list-inside text-black leading-relaxed">
                        <li><span class="font-semibold">PayPal Email Address:</span> kangandrian@telkomuniversity.ac.id</li>
                    </ul>
                    <p class="font-semibold text-black mt-3">Additional Information:</p>
                    <ol class="list-decimal list-inside text-black leading-relaxed">
                        <li>Transfer the full registration fee plus a 5% PayPal currency conversion fee.</li>
                        <li>Ensure the fee is transferred under the registrant’s name, clearly stated on the payment slip.</li>
                        <li>Include your paper ID information on the payment slip.</li>
                    </ol>
                </div>
            </div>

            <!-- Registration Procedures -->
            <div class="bg-gray-100 rounded-xl p-6 shadow-lg">
                <h2 class="text-xl font-bold mb-3 text-[#1a1f27]/95">Registration Procedures</h2>
                <ol class="list-decimal list-inside text-black leading-relaxed">
                    <li>Complete the payment according to the method of your choice.</li>
                    <li>Register for the conference using the following link:
                        <a href="https://tel-u.ac.id/icoict2025" class="text-sky-500 underline">
                            https://tel-u.ac.id/icoict2025
                        </a>
                    </li>
                    <li>If registering at the IEEE member or student rate, attach a copy of your IEEE member card or student card/verification letter.</li>
                    <li>Ensure all required information and supporting documents (e.g., payment proof/slip) are included before submitting the form.</li>
                </ol>
            </div>
        </div>
    </main>

@endsection