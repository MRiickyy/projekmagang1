@extends('layouts.app')

@section('title', 'Registration - ICOICT 2025')

@section('content')
<main class="bg-white my-12">
    <div class="max-w-7xl mx-auto px-5">

        <!-- Title -->
        <div class="text-center mb-8">
            <h1 class="relative inline-block text-3xl md:text-4xl font-bold tracking-wide text-[#1a1f27]/95">
                REGISTRATION
                <span class="block h-1 w-40 mx-auto mt-2 bg-gradient-to-r from-green-500 to-blue-500"></span>
            </h1>
        </div>

        <!-- CTA Box -->
        <div class="mt-10 bg-[#1a1f27] rounded-xl p-8 shadow-xl space-y-6 text-center text-white">
            <p class="mb-2 text-white text-lg md:text-xl">
                {{ $registration['cta']->cta_title ?? 'Please Register Here' }}
            </p>
            <a href="{{ $registration['cta']->cta_link ?? '#' }}"
                class="inline-flex items-center justify-center rounded-full bg-[#25d366] hover:bg-[#1fb857] transition px-6 py-2 md:px-8 md:py-3 font-semibold shadow">
                {{ $registration['cta']->cta_button ?? 'Registration Form' }}
            </a>
        </div>

        <!-- Pricing Table -->
        <div class="overflow-x-auto mt-10">
            <div class="overflow-hidden rounded-lg shadow-md border border-gray-200">
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
                        @foreach($fees as $fee)
                            <tr class="odd:bg-white even:bg-gray-50">
                                <td class="border border-gray-200 px-4 py-2 text-left">{{ $fee->category }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ $fee->usd_physical }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ number_format($fee->idr_physical) }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ $fee->usd_online }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ number_format($fee->idr_online) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Notes Section -->
        <div class="mt-6 bg-gray-100 rounded-xl p-6 shadow-lg">
            <h2 class="text-lg font-semibold mb-3">Notes:</h2>
            <ul class="list-disc list-inside space-y-1">
                @if(isset($registration['notes']) && $registration['notes']->content)
                    @foreach(explode("\n", $registration['notes']->content) as $note)
                        <li>{{ $note }}</li>
                    @endforeach
                @else
                    <li>Maximum number of pages for a normal paper is 6</li>
                    <li>To be eligible for the IEEE Member rate you must be an active IEEE Member</li>
                    <li>To be eligible for the student rate you must provide your student ID/Letter of proof</li>
                @endif
            </ul>

            <h2 class="text-lg font-semibold mt-4 mb-2">The conference fee includes:</h2>
            <ul class="list-disc list-inside">
                @if(isset($registration['conference_fee_include']) && $registration['conference_fee_include']->content)
                    @foreach(explode("\n", $registration['conference_fee_include']->content) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                @else
                    <li>To be announced.</li>
                @endif
            </ul>
        </div>

        <!-- Payment Methods -->
        <div class="mt-6 space-y-4 text-black leading-relaxed">
            <h1 class="text-3xl font-bold mb-6 text-center text-[#1a1f27]/95">Payment Methods</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Gabungan semua Virtual Account -->
                @php
                    $virtualAccounts = $paymentMethods->where('method_name', 'Virtual Account');
                    $paypal = $paymentMethods->where('method_name', 'PayPal');
                @endphp

                @if($virtualAccounts->count() > 0)
                    <div class="p-6 bg-gray-100 rounded-xl shadow-lg">
                        <h3 class="text-xl text-center font-bold mb-4">Virtual Account</h3>

                        <!-- Tampilkan info VA -->
                        @foreach($virtualAccounts as $index => $va)
                            <div class="mb-4 pb-3 @if($index < $virtualAccounts->count() - 1) border-b border-gray-300 @endif">
                                <p><span class="font-bold">Bank Name:</span> {{ $va->bank_name }}</p>
                                <p><span class="font-bold">Account Name:</span> {{ $va->account_name }}</p>
                                <p><span class="font-bold">Virtual Account Number:</span> {{ $va->virtual_account_number }}</p>
                            </div>
                        @endforeach

                        <!-- Gabungkan semua important_notes di bawah semua VA -->
                        @php
                            $allImportantNotes = $virtualAccounts->pluck('important_notes')->filter();
                        @endphp

                        @if($allImportantNotes->count() > 0)
                            @foreach($allImportantNotes as $note)
                                <p class="text-red-600 font-semibold mt-2">{{ $note }}</p>
                            @endforeach
                        @endif
                    </div>
                @endif

                <!-- PayPal -->
                @if($paypal->count() > 0)
                    <div class="p-6 bg-gray-100 rounded-xl shadow-lg">
                        <h3 class="text-xl text-center font-bold mb-4">PayPal</h3>

                        <p class="font-bold mb-2">PayPal Email Address:</p>

                        <ul class="list-disc list-inside space-y-1 text-gray-800">
                            @foreach($paypal as $method)
                                <li>{{ $method->paypal_email }}</li>
                            @endforeach
                        </ul>

                        @php
                            $additionalInfo = $paypal->pluck('additional_info')->filter()->unique()->implode("\n");
                            $infoItems = preg_split('/\r\n|\r|\n/', trim($additionalInfo));
                            $infoItems = array_filter($infoItems, fn($item) => !empty(trim($item)));
                        @endphp

                        @if(!empty($infoItems))
                            <p class="mt-4 font-bold">Additional Information:</p>
                            <ul class="list-disc list-inside text-gray-700 leading-relaxed space-y-1">
                                @foreach($infoItems as $info)
                                    <li>{{ $info }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <!-- Registration Procedures -->
        <div class="bg-gray-100 rounded-xl p-6 shadow-lg mt-6">
            <h2 class="text-xl font-bold mb-3 text-[#1a1f27]/95">Registration Procedures</h2>
            <ol class="list-decimal list-inside text-black leading-relaxed">
                @if(isset($registration['registration_procedures']) && $registration['registration_procedures']->content)
                    @foreach(explode("\n", $registration['registration_procedures']->content) as $procedure)
                        <li>{!! $procedure !!}</li>
                    @endforeach
                @else
                    <li>Complete the payment according to the method of your choice.</li>
                    <li>Register for the conference using the link provided.</li>
                    <li>If registering at the IEEE member or student rate, attach proof of eligibility.</li>
                    <li>Ensure all required information and supporting documents are included before submitting.</li>
                @endif
            </ol>
        </div>

    </div>
</main>
@endsection
