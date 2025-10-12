@extends('layouts.admin')

@section('title', 'List Registrations')

@section('content')
<div class="flex-1 flex flex-col">

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
    </div>

    <!-- Content Tabs -->
    <main class="flex-1 px-6 pt-4 pb-10">

        <!-- Tab: Registrations -->
        <div id="Registrations" class="tabcontent hidden">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Registrations List</h2>
                <a href="{{ route('admin.forauthor.add_registrations_admin') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
                    Add
                </a>

                @if($registrations->isEmpty())
                    <p class="text-gray-500 text-sm">No registration data found.</p>
                @else
                    <table class="w-full border-collapse text-sm">
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
                            @foreach($registrations as $item)
                            <tr class="hover:bg-gray-100 text-gray-800">
                                <td class="px-4 py-2 border">{{ $item->id }}</td>
                                <td class="px-4 py-2 border">{{ $item->cta_title }}</td>
                                <td class="px-4 py-2 border">{{ $item->cta_button }}</td>
                                <td class="px-4 py-2 border">{{ $item->cta_link }}</td>
                                <td class="px-4 py-2 border">{{ $item->notes }}</td>
                                <td class="px-4 py-2 border">{{ $item->conference_fee_include }}</td>
                                <td class="px-4 py-2 border">{{ $item->registration_procedures }}</td>
                                <td class="px-4 py-2 border">
                                    <div class="flex justify-center gap-2">
                                        <button class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</button>
                                        <button class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                                        <button class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <!-- Tab: Registration Fee -->
        <div id="Fees" class="tabcontent hidden">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Registration Fee List</h2>
                <a href="{{ route('admin.forauthor.add_registrations_admin') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
                    Add
                </a>

                @if($fees->isEmpty())
                    <p class="text-gray-500 text-sm">No fee data found.</p>
                @else
                    <table class="w-full border-collapse text-sm">
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
                            @foreach($fees as $fee)
                            <tr class="hover:bg-gray-100 text-gray-800">
                                <td class="px-4 py-2 border">{{ $fee->id }}</td>
                                <td class="px-4 py-2 border">{{ $fee->category }}</td>
                                <td class="px-4 py-2 border">{{ $fee->usd_physical }}</td>
                                <td class="px-4 py-2 border">{{ $fee->idr_physical }}</td>
                                <td class="px-4 py-2 border">{{ $fee->usd_online }}</td>
                                <td class="px-4 py-2 border">{{ $fee->idr_online }}</td>
                                <td class="px-4 py-2 border">
                                    <div class="flex justify-center gap-2">
                                        <button class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</button>
                                        <button class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                                        <button class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <!-- Tab: Payment Method -->
        <div id="Payments" class="tabcontent hidden">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Payment Method List</h2>
                <a href="{{ route('admin.forauthor.add_registrations_admin') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
                    Add
                </a>

                @if($paymentMethods->isEmpty())
                    <p class="text-gray-500 text-sm">No payment methods found.</p>
                @else
                    <!-- Dropdown Filter -->
                    <div class="mb-4">
                        <label for="methodFilter" class="block text-sm font-medium text-black mb-2">Filter by Method:</label>
                        <select
                            id="methodFilter"
                            class="w-60 rounded-lg border border-gray-300 bg-white px-3 py-2 text-center text-sm text-gray-800 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                            <option value="" selected disabled hidden>Select Method</option>
                            <option value="virtual">Virtual Account</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>

                    <!-- Table: Virtual Account -->
                    <div id="virtualTable">
                        <table class="w-full border-collapse text-sm">
                            <thead class="bg-gray-200 text-gray-700">
                                <tr>
                                    <th class="px-4 py-2 border">No</th>
                                    <th class="px-4 py-2 border">Bank Name</th>
                                    <th class="px-4 py-2 border">Account Name</th>
                                    <th class="px-4 py-2 border">Virtual Account Number</th>
                                    <th class="px-4 py-2 border">Important Notes</th>
                                    <th class="px-4 py-2 border">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paymentMethods->where('method_name', '!=', 'PayPal') as $pay)
                                <tr class="hover:bg-gray-100 text-gray-800">
                                    <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 border">{{ $pay->bank_name }}</td>
                                    <td class="px-4 py-2 border">{{ $pay->account_name }}</td>
                                    <td class="px-4 py-2 border">{{ $pay->virtual_account_number }}</td>
                                    <td class="px-4 py-2 border">{{ $pay->important_notes }}</td>
                                    <td class="px-4 py-2 border">
                                        <div class="flex justify-center gap-2">
                                            <button class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</button>
                                            <button class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                                            <button class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Table: PayPal -->
                    <div id="paypalTable" class="hidden">
                        <table class="w-full border-collapse text-sm">
                            <thead class="bg-gray-200 text-gray-700">
                                <tr>
                                    <th class="px-4 py-2 border">No</th>
                                    <th class="px-4 py-2 border">PayPal Email</th>
                                    <th class="px-4 py-2 border">Additional Information</th>
                                    <th class="px-4 py-2 border">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paymentMethods->where('method_name', 'PayPal') as $pay)
                                <tr class="hover:bg-gray-100 text-gray-800">
                                    <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 border">{!! $pay->paypal_email !!}</td>
                                    <td class="px-4 py-2 border">{!! $pay->additional_info !!}</td>
                                    <td class="px-4 py-2 border">
                                        <div class="flex justify-center gap-2">
                                            <button class="px-3 py-1 rounded bg-yellow-500 text-white hover:bg-yellow-600">Edit</button>
                                            <button class="px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                                            <button class="px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Detail</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

    </main>
</div>

<!-- JS Tab Script -->
<script>
    function openTab(evt, tabName) {
        const tabcontent = document.getElementsByClassName("tabcontent");
        for (let i = 0; i < tabcontent.length; i++) tabcontent[i].style.display = "none";
        const tablinks = document.getElementsByClassName("tablink");
        for (let i = 0; i < tablinks.length; i++) tablinks[i].classList.remove("text-white", "border-teal-400");
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.classList.add("text-white", "border-teal-400");
    }
    document.getElementById("defaultOpen").click();

    // JS Filter Payment Method
    const filterSelect = document.getElementById('methodFilter');
    const virtualTable = document.getElementById('virtualTable');
    const paypalTable = document.getElementById('paypalTable');

    filterSelect.addEventListener('change', () => {
        if (filterSelect.value === 'paypal') {
            virtualTable.classList.add('hidden');
            paypalTable.classList.remove('hidden');
        } else {
            paypalTable.classList.add('hidden');
            virtualTable.classList.remove('hidden');
        }
    });
</script>
@endsection
