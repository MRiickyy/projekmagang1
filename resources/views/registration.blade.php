```blade
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
                {{ $registration->cta_title ?? 'Please Register Here' }}
            </p>
            <a href="{{ $registration->cta_link ?? '#' }}"
                class="inline-flex items-center justify-center rounded-full bg-[#25d366] hover:bg-[#1fb857] transition px-6 py-2 md:px-8 md:py-3 font-semibold shadow">
                {{ $registration->cta_button ?? 'Registration Form' }}
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
                @if($registration->notes)
                    @foreach(explode("\n", $registration->notes) as $note)
                        <li>{{ $note }}</li>
                    @endforeach
                @else
                    <li>Maximum number of pages for a normal paper is 6</li>
                    <li>To be eligible for the IEEE Member rate you must be an active IEEE Member</li>
                    <li>To be eligible for the student rate you must provide your student ID/Letter of proof</li>
                @endif
            </ul>

            <h2 class="text-lg font-semibold mt-4 mb-2">The conference fee include:</h2>
            <ul class="list-disc list-inside">
                @if($registration->conference_fee_include)
                    @foreach(explode("\n", $registration->conference_fee_include) as $item)
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
                @foreach($paymentMethods as $method)
                    <div class="p-6 bg-gray-100 rounded-xl shadow-lg">
                        <h3 class="text-xl text-center font-bold mb-4">{{ $method->method_name }}</h3>

                        @if($method->method_name === 'Virtual Account')
                            <ul class="list-disc pl-5 text-gray-700 space-y-1">
                                <li><strong>Bank Name:</strong> {{ $method->bank_name }}</li>
                                <li><strong>Account Name:</strong> {{ $method->account_name }}</li>
                                <li><strong>Virtual Account Number:</strong> {{ $method->virtual_account_number }}</li>
                            </ul>
                            @if($method->important_notes)
                                <p class="mt-3 text-red-600 font-semibold">
                                    {{ $method->important_notes }}
                                </p>
                            @endif
                        @elseif($method->method_name === 'PayPal')
                            <li><strong>PayPal Email Address:</strong> {{ $method->paypal_email }}</li>

                            @if($method->additional_info)
                                <p class="mt-2 font-bold">Additional Information:</p>
                                <p class="text-gray-700 space-y-1 leading-relaxed">
                                    {{ $method->additional_info }}
                                </p>
                            @endif
                        @endif
                    </div>
                @endforeach
            </div>
        </div>


        <!-- Registration Procedures -->
        <div class="bg-gray-100 rounded-xl p-6 shadow-lg mt-6">
            <h2 class="text-xl font-bold mb-3 text-[#1a1f27]/95">Registration Procedures</h2>
            <ol class="list-decimal list-inside text-black leading-relaxed">
                @if($registration->registration_procedures)
                    @foreach(explode("\n", $registration->registration_procedures) as $procedure)
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
```
