@extends('layouts.admin')

@section('title', 'Detail Payment Method')

@section('content')

<!-- Content -->
<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">Detail Payment Method</h2>

        <div class="space-y-5">

            <!-- Method Name -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="method_name">Method Name</label>
                <input type="text" id="method_name" 
                    value="{{ $paymentMethod->method_name ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            @if(strtolower($paymentMethod->method_name) === 'virtual account')
                <!-- Bank Name -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1" for="bank_name">Bank Name</label>
                    <input type="text" id="bank_name" 
                        value="{{ $paymentMethod->bank_name ?? '' }}"
                        class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                        readonly disabled />
                </div>

                <!-- Account Name -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1" for="account_name">Account Name</label>
                    <input type="text" id="account_name" 
                        value="{{ $paymentMethod->account_name ?? '' }}"
                        class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                        readonly disabled />
                </div>

                <!-- Virtual Account -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1" for="virtual_account">Virtual Account Number</label>
                    <input type="text" id="virtual_account" 
                        value="{{ $paymentMethod->virtual_account_number ?? '' }}"
                        class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                        readonly disabled />
                </div>

                <!-- Important Note -->
                @if(!empty($paymentMethod->important_notes))
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-1" for="important_notes">Important Note</label>
                        <textarea id="important_notes" rows="4" readonly disabled
                            class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed">{{ $paymentMethod->important_notes }}</textarea>
                    </div>
                @endif

            @elseif(strtolower($paymentMethod->method_name) === 'paypal')
                <!-- PayPal Email -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-1" for="paypal_email">PayPal Email</label>
                    <input type="text" id="paypal_email" 
                        value="{{ $paymentMethod->paypal_email ?? '' }}"
                        class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                        readonly disabled />
                </div>

                <!-- Additional Information -->
                @if(!empty($paymentMethod->additional_info))
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-1" for="additional_info">Additional Information</label>
                        <textarea id="additional_info" rows="4" readonly disabled
                            class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed">{{ $paymentMethod->additional_info }}</textarea>
                    </div>
                @endif
            @endif

            <!-- Back Button -->
            <div class="flex justify-end pt-4">
                <a href="{{ route('admin.forauthor.list_registrations_admin') }}"
                    class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Back
                </a>
            </div>

        </div>
    </div>
</main>

@endsection
