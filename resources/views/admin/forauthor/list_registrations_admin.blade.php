@extends('layouts.admin')

@section('title', 'List Registrations')

@section('content')
<div class="flex-1 flex flex-col">

    <!-- Tabs Navigation -->
    <div class="px-6 py-3 flex gap-4 text-sm font-semibold border-b border-slate-700">
        <button id="defaultOpen" class="tablink px-4 py-2 rounded-t-md border-b-2 border-transparent text-slate-300 hover:text-white hover:border-teal-400"
            onclick="openTab(event, 'registration')">
            Registration
        </button>
        <button class="tablink px-4 py-2 rounded-t-md border-b-2 border-transparent text-slate-300 hover:text-white hover:border-teal-400"
            onclick="openTab(event, 'registration_fee')">
            Registration Fee
        </button>
        <button class="tablink px-4 py-2 rounded-t-md border-b-2 border-transparent text-slate-300 hover:text-white hover:border-teal-400"
            onclick="openTab(event, 'payment_method')">
            Payment Method
        </button>
    </div>

    <!-- ===== TAB: REGISTRATION ===== -->
    <section id="registration" class="tabcontent px-6 py-6 hidden">
        <div class="bg-[#F2F6F9] shadow-md rounded-lg p-6 overflow-x-auto">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Registration List</h2>

            <a href="{{ route('admin.forauthor.add_registrations_admin') }}"
                class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 mb-4 inline-block">
                Add
            </a>

            <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-slate-900">
                    <tr>
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Section</th>
                        <th class="px-4 py-2 border">Content</th>
                        <th class="px-4 py-2 border">Created At</th>
                        <th class="px-4 py-2 border">Updated At</th>
                        <th class="px-4 py-2 border">Action</th>
                    </tr>
                </thead>

                <tbody class="bg-white text-slate-800">
                    @forelse ($registrations as $registration)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border">{{ $registration->id }}</td>
                        <td class="px-4 py-2 border">{{ $registration->section }}</td>
                        <td class="px-4 py-2 border">{{ $registration->content }}</td>
                        <td class="px-4 py-2 border">{{ $registration->created_at }}</td>
                        <td class="px-4 py-2 border">{{ $registration->updated_at }}</td>

                        <td class="px-4 py-2 border">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.forauthor.edit_registrations_admin', $registration->id) }}"
                                    class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form action="{{ route('admin.forauthor.delete_registrations_admin', $registration->id) }}"
                                    method="POST" class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>

                                <a href="{{ route('admin.forauthor.detail_registrations_admin', $registration->id) }}"
                                    class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">
                                    Detail
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">No data available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- ===== TAB: REGISTRATION FEE ===== -->
    <section id="registration_fee" class="tabcontent px-6 py-6 hidden">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Registration Fee</h2>

        <a href="#" class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 mb-4 inline-block">Add</a>

        <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-gray-200 text-slate-900">
                <tr>
                    <th class="px-4 py-2 border">Category</th>
                    <th class="px-4 py-2 border">USD (Physical)</th>
                    <th class="px-4 py-2 border">IDR (Physical)</th>
                    <th class="px-4 py-2 border">USD (Online)</th>
                    <th class="px-4 py-2 border">IDR (Online)</th>
                </tr>
            </thead>
            <tbody class="bg-white text-slate-800">
                @foreach ($fees as $fee)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $fee->category }}</td>
                    <td class="px-4 py-2 border">{{ $fee->usd_physical }}</td>
                    <td class="px-4 py-2 border">{{ $fee->idr_physical }}</td>
                    <td class="px-4 py-2 border">{{ $fee->usd_online }}</td>
                    <td class="px-4 py-2 border">{{ $fee->idr_online }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <!-- ===== TAB: PAYMENT METHOD ===== -->
    <section id="payment_method" class="tabcontent px-6 py-6 hidden">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Payment Method</h2>

        <a href="#" class="px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 mb-4 inline-block">Add</a>

        <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-gray-200 text-slate-900">
                <tr>
                    <th class="px-4 py-2 border">Method Name</th>
                    <th class="px-4 py-2 border">Bank Name</th>
                    <th class="px-4 py-2 border">Account Name</th>
                    <th class="px-4 py-2 border">Virtual Account</th>
                    <th class="px-4 py-2 border">Important Notes</th>
                    <th class="px-4 py-2 border">PayPal Email</th>
                    <th class="px-4 py-2 border">Additional Info</th>
                </tr>
            </thead>
            <tbody class="bg-white text-slate-800">
                @foreach ($paymentMethods as $method)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $method->method_name }}</td>
                    <td class="px-4 py-2 border">{{ $method->bank_name }}</td>
                    <td class="px-4 py-2 border">{{ $method->account_name }}</td>
                    <td class="px-4 py-2 border">{{ $method->virtual_account_number }}</td>
                    <td class="px-4 py-2 border">{{ $method->important_notes }}</td>
                    <td class="px-4 py-2 border">{!! $method->paypal_email !!}</td>
                    <td class="px-4 py-2 border">{!! $method->additional_info !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>

<script>
    function openTab(evt, tabName) {
        const tabcontents = document.querySelectorAll(".tabcontent");
        tabcontents.forEach(tab => tab.classList.add("hidden"));

        const tablinks = document.querySelectorAll(".tablink");
        tablinks.forEach(btn => btn.classList.remove("text-white", "border-teal-400"));

        document.getElementById(tabName).classList.remove("hidden");
        evt.currentTarget.classList.add("text-white", "border-teal-400");
        localStorage.setItem("activeTab", tabName);
    }

    // Simpan tab aktif di localStorage
    document.addEventListener("DOMContentLoaded", () => {
        const activeTab = localStorage.getItem("activeTab") || "registration";
        document.getElementById(activeTab).classList.remove("hidden");
        document.querySelector(`[onclick="openTab(event, '${activeTab}')"]`).classList.add("text-white", "border-teal-400");
    });

    // Konfirmasi delete
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', e => {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This data will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete!',
                cancelButtonText: 'Cancel'
            }).then(result => {
                if (result.isConfirmed) form.submit();
            });
        });
    });
</script>
@endsection
