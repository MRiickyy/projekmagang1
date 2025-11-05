@extends('layouts.admin')

@section('title', 'Add Payment Method')

@section('content')

<main class="flex-1 px-6 py-10 flex justify-center">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
        <h2 class="text-lg font-semibold text-slate-900 mb-6">Add Payment Method</h2>

        <form action="{{ route('admin.forauthor.store_paymentmethod_admin') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Method Type -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Method Type</label>
                <select name="method_name" id="methodSelect"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" required>
                    <option value="">-- Choose Payment Method --</option>
                    <option value="Bank Transfer" {{ old('method_name') == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                    <option value="PayPal" {{ old('method_name') == 'PayPal' ? 'selected' : '' }}>PayPal</option>
                </select>
                @error('method_name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Virtual Account Fields -->
            <div id="virtualAccountFields" class="space-y-4 hidden">
                <!-- Bank Name -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-2">Bank Name</label>
                    <input type="text" name="bank_name" value="{{ old('bank_name') }}"
                        class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                        placeholder="e.g. BCA, Mandiri, etc.">
                    @error('bank_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Account Name -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-2">Account Name</label>
                    <input type="text" name="account_name" value="{{ old('account_name') }}"
                        class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                        placeholder="e.g. John Doe">
                    @error('account_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Virtual Account Number -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-2">Bank Number</label>
                    <input type="text" name="bank_number" value="{{ old('bank_number') }}"
                        class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                        placeholder="e.g. 1234567890">
                    @error('bank_number')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Important Notes -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-2">Important Notes</label>
                    <textarea name="important_notes" rows="4"
                        class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                        placeholder="Write any important reminders or conditions...">{{ old('important_notes') }}</textarea>
                    @error('important_notes')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- PayPal Fields -->
            <div id="paypalFields" class="space-y-4 hidden">
                <!-- PayPal Email -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-2">PayPal Email</label>
                    <input type="email" name="paypal_email" value="{{ old('paypal_email') }}"
                        class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                        placeholder="e.g. example@paypal.com">
                    @error('paypal_email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Additional Info -->
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-2">Additional Info</label>
                    <textarea name="additional_info" rows="4"
                        class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                        placeholder="Provide any extra details...">{{ old('additional_info') }}</textarea>
                    @error('additional_info')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" onclick="window.history.back()"
                    class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Cancel
                </button>
                <button type="submit"
                    class="px-6 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md">
                    Save
                </button>
            </div>
        </form>
    </div>
</main>

<!-- Script: Dynamic Form Display -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const methodSelect = document.getElementById('methodSelect');
        const vaFields = document.getElementById('virtualAccountFields');
        const paypalFields = document.getElementById('paypalFields');

        function toggleFields() {
            const value = methodSelect.value;
            vaFields.classList.toggle('hidden', value !== 'Virtual Account');
            paypalFields.classList.toggle('hidden', value !== 'PayPal');
        }

        methodSelect.addEventListener('change', toggleFields);
        toggleFields(); // Run once on load (to show old value if exists)
    });
</script>

@endsection
