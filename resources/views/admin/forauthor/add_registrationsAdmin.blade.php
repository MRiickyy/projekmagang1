@extends('layouts.admin')

@section('title', 'Add Registration')

@section('content')
<div class="flex-1 flex flex-col">
    <main class="flex-1 px-6 py-10 flex justify-center">
        <div class="w-full max-w-4xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800" x-data="{ section: '' }">
            
            <h2 class="text-lg font-semibold text-slate-900 mb-6">Registration Information</h2>

            @if(session('success'))
                <div class="mb-4 p-3 rounded bg-green-100 text-green-800 border border-green-300">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form utama --}}
            <form action="{{ route('admin.forauthor.store_registrationsAdmin') }}" method="POST">
                @csrf

                <!-- Section -->
                <div class="mb-4">
                    <label class="block font-bold mb-2">Section</label>
                    <select name="section" x-model="section" required class="w-full border rounded px-3 py-2">
                        <option value="">-- Pilih Section --</option>
                        <option value="registrations">Registrations</option>
                        <option value="registration_fee">Registration Fee</option>
                        <option value="payment_method">Payment Method</option>
                    </select>
                </div>

                <!-- Registrations -->
                <template x-if="section === 'registrations'">
                    <div class="space-y-3 mb-4">
                        <div>
                            <label class="block font-bold mb-1">CTA Title</label>
                            <input type="text" name="cta_title" placeholder="Registration Title" class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block font-bold mb-1">CTA Button</label>
                            <input type="text" name="cta_button" placeholder="Registration Form" class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block font-bold mb-1">CTA Link</label>
                            <input type="text" name="cta_link" placeholder="https://..." class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label class="block font-bold mb-1">Notes</label>
                            <textarea name="notes" rows="3" class="w-full border rounded px-3 py-2"></textarea>
                        </div>
                        <div>
                            <label class="block font-bold mb-1">Conference Fee Include</label>
                            <input type="text" name="conference_fee_include" class="w-full border rounded px-3 py-2">
                        </div>
                        <div>
                            <label class="block font-bold mb-1">Registration Procedures</label>
                            <input type="text" name="registrations_procedures" class="w-full border rounded px-3 py-2">
                        </div>
                        
                        <!-- Buttons -->
                        <div class="flex justify-end gap-3 pt-6">
                            <a href="{{ route('admin.forauthor.registrationsAdmin') }}" class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                                Cancel
                            </a>
                            <button type="submit" class="px-7 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md">
                                Save
                            </button>
                        </div>
                    </div>
                </template>

                <!-- Registration Fee -->
                <template x-if="section === 'registration_fee'">
                    <div class="space-y-3 mb-4">
                        <div>
                            <label class="block font-bold mb-1">Category Fee</label>
                            <input type="text" name="category" class="w-full border rounded px-3 py-2">
                        </div>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-bold mb-1">Physical Mode (USD)</label>
                                <input type="text" name="usd_physical" class="w-full border rounded px-3 py-2">
                            </div>
                            <div>
                                <label class="block font-bold mb-1">Physical Mode (IDR)</label>
                                <input type="text" name="idr_physical" class="w-full border rounded px-3 py-2">
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-bold mb-1">Online Mode (USD)</label>
                                <input type="text" name="usd_online" class="w-full border rounded px-3 py-2">
                            </div>
                            <div>
                                <label class="block font-bold mb-1">Online Mode (IDR)</label>
                                <input type="text" name="idr_online" class="w-full border rounded px-3 py-2">
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end gap-3 pt-6">
                            <a href="{{ route('admin.forauthor.registrationsAdmin') }}" class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                                Cancel
                            </a>
                            <button type="submit" class="px-7 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md">
                                Save
                            </button>
                        </div>
                    </div>
                </template>

                <!-- Payment Method -->
                <template x-if="section === 'payment_method'">
                    <div class="space-y-3 mb-4" x-data="{ method: '' }">
                        <div>
                            <label class="block font-bold mb-1">Method Name</label>
                            <select name="method_name" x-model="method" required class="w-full border rounded px-3 py-2">
                                <option value="">-- Pilih Method --</option>
                                <option value="Virtual Account">Virtual Account</option>
                                <option value="PayPal">PayPal</option>
                            </select>
                        </div>

                        <!-- Virtual Account -->
                        <template x-if="method === 'Virtual Account'">
                            <div class="space-y-3">
                                <div>
                                    <label class="block font-bold mb-1">Bank Name</label>
                                    <input type="text" name="bank_name" class="w-full border rounded px-3 py-2">
                                </div>
                                <div>
                                    <label class="block font-bold mb-1">Account Name</label>
                                    <input type="text" name="account_name" class="w-full border rounded px-3 py-2">
                                </div>
                                <div>
                                    <label class="block font-bold mb-1">Virtual Account Number</label>
                                    <input type="text" name="virtual_account_number" class="w-full border rounded px-3 py-2">
                                </div>
                                <div>
                                    <label class="block font-bold mb-1">Important Notes</label>
                                    <textarea name="important_notes" rows="2" class="w-full border rounded px-3 py-2"></textarea>
                                </div>
                            </div>
                        </template>

                        <!-- PayPal -->
                        <template x-if="method === 'PayPal'">
                            <div class="space-y-3">
                                <div>
                                    <label class="block font-bold mb-1">PayPal Email</label>
                                    <input type="email" name="paypal_email" class="w-full border rounded px-3 py-2">
                                </div>
                                <div>
                                    <label class="block font-bold mb-1">Additional Info</label>
                                    <textarea name="additional_info" rows="2" class="w-full border rounded px-3 py-2"></textarea>
                                </div>
                            </div>
                        </template>

                        <!-- Tombol -->
                        <div class="flex justify-end gap-3 pt-6">
                            <a href="{{ route('admin.forauthor.registrationsAdmin') }}" class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                                Cancel
                            </a>
                            <button type="submit" class="px-7 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md">
                                Save
                            </button>
                        </div>
                    </div>
                </template>
            </form>
        </div>
    </main>
</div>
@endsection
