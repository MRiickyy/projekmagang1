@extends('layouts.admin')

@section('title', 'Edit Payment Method')

@section('content')
<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">Edit Payment Method</h2>

        <form action="{{ route('admin.forauthor.update_paymentmethod_admin', $paymentMethod->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Method Name -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="method_name">Method Name</label>
                <input type="text" id="method_name" name="method_name" 
                    value="{{ $paymentMethod->method_name }}" 
                    readonly
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" />
                <p class="text-xs text-slate-500 mt-1">This field cannot be changed.</p>
            </div>

            <!-- Conditionally show fields -->
            @if($paymentMethod->method_name === 'Virtual Account')
                <div>
                    <label class="block text-sm font-bold mb-1" for="bank_name">Bank Name</label>
                    <input type="text" name="bank_name" id="bank_name"
                        value="{{ old('bank_name', $paymentMethod->bank_name) }}"
                        class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none" />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1" for="account_name">Account Name</label>
                    <input type="text" name="account_name" id="account_name"
                        value="{{ old('account_name', $paymentMethod->account_name) }}"
                        class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none" />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1" for="virtual_account_number">Virtual Account Number</label>
                    <input type="text" name="virtual_account_number" id="virtual_account_number"
                        value="{{ old('virtual_account_number', $paymentMethod->virtual_account_number) }}"
                        class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none" />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1" for="important_notes">Important Notes</label>
                    <textarea name="important_notes" id="important_notes" rows="4"
                        class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none">{{ old('important_notes', $paymentMethod->important_notes) }}</textarea>
                </div>
            @elseif($paymentMethod->method_name === 'PayPal')
                <div>
                    <label class="block text-sm font-bold mb-1" for="paypal_email">PayPal Email Address</label>
                    <input type="text" name="paypal_email" id="paypal_email"
                        value="{{ old('paypal_email', $paymentMethod->paypal_email) }}"
                        class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none" />
                </div>

                <div>
                    <label class="block text-sm font-bold mb-1" for="additional_info">Additional Information</label>
                    <textarea name="additional_info" id="additional_info" rows="4"
                        class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none">{{ old('additional_info', $paymentMethod->additional_info) }}</textarea>
                </div>
            @endif

            <!-- Action Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" onclick="window.history.back()" class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Cancel
                </button>
                <button type="submit" class="px-7 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md hover:opacity-90">
                    Save
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
