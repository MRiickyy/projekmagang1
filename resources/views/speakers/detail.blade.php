@extends('layouts.app')

@section('title', 'Keynote Speakers - ICOICT 2025')

@section('content')
<!-- SPEAKERS -->
<section class="max-w-7xl mx-auto my-12 px-5">
    <!-- <h3 class="text-center text-3xl font-bold mb-10">
        KEYNOTE SPEAKER
        <span class="block h-1 w-40 mx-auto mt-2 bg-gradient-to-r from-green-500 to-blue-500"></span>
    </h3> -->

    <!-- CARD -->
    <div class="bg-gray-50 rounded-xl shadow-lg p-6 flex flex-col md:flex-row gap-6 items-center md:items-center">
        <!-- Image -->
        <img src="https://2025.icoict.org/wp-content/uploads/sites/13/2024/11/Eisuke-Kita-1.png" alt="{{ $speaker->name }}"
            class="w-40 h-40 object-cover rounded-lg">

        <div class="flex-1 space-y-4">
            <div>
                <h4 class="text-xl font-bold">{{ $speaker->name }}</h4>
                <p class="text-red-600 font-semibold">{{ $speaker->university }}</p>
                <p class="text-gray-700 mt-2">
                    {{ $speaker->biodata }}
                </p>
            </div>

            <!-- Research Fields -->
            <div>
                <h5 class="font-semibold text-gray-800 mb-2">Research Fields:</h5>
                <div class="flex flex-wrap gap-2">
                    <span
                        class="bg-gradient-to-br from-[#2B3545] to-[#3B4A60] text-white px-3 py-1 rounded-full text-sm">
                        Mathematical model of vehicle platoon and traffic flow control
                    </span>
                    <span
                        class="bg-gradient-to-br from-[#2B3545] to-[#3B4A60] text-white px-3 py-1 rounded-full text-sm">
                        Vehicle robot platoon simulation
                    </span>
                    <span
                        class="bg-gradient-to-br from-[#2B3545] to-[#3B4A60] text-white px-3 py-1 rounded-full text-sm">
                        Artificial intelligence
                    </span>
                    <span
                        class="bg-gradient-to-br from-[#2B3545] to-[#3B4A60] text-white px-3 py-1 rounded-full text-sm">
                        Machine learning
                    </span>
                    <span
                        class="bg-gradient-to-br from-[#2B3545] to-[#3B4A60] text-white px-3 py-1 rounded-full text-sm">
                        Agricultural Applications
                    </span>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- REWARDS -->
<section class="max-w-7xl mx-auto my-12 px-5">
    <h3 class="text-2xl font-bold mb-6">
        REWARDS
        <span class="block h-1 w-32 mt-2 bg-gradient-to-r from-green-500 to-blue-500"></span>
    </h3>

    <div class="grid md:grid-cols-2 gap-4">
        <div class="bg-gray-50 shadow-lg p-4">
            <h4 class="font-bold">Japan Society of Mechanical Engineers</h4>
            <p class="text-gray-600">Encouragement Award (Research)</p>
        </div>
        <div class="bg-gray-50 shadow-lg p-4">
            <h4 class="font-bold">Information Processing Society</h4>
            <p class="text-gray-600">Computer Science Committee Encouragement Award</p>
        </div>
        <div class="bg-gray-50 shadow-lg p-4">
            <h4 class="font-bold">Intelligent Information Fuzzy Society</h4>
            <p class="text-gray-600">13th Intelligent Systems Symposium Presentation Award</p>
        </div>
        <div class="bg-gray-50 shadow-lg p-4">
            <h4 class="font-bold">Information Processing Society</h4>
            <p class="text-gray-600">72nd Theoretical Modeling and Problem Solving Study Group Presentation Award</p>
        </div>
        <div class="bg-gray-50 shadow-lg p-4">
            <h4 class="font-bold">Grand Prize in the CST Solution Competition</h4>
            <p class="text-gray-600">Information and Communication Engineers</p>
        </div>
        <div class="bg-gray-50 shadow-lg p-4">
            <h4 class="font-bold">Japan Society of Mechanical Engineers Design Division</h4>
            <p class="text-gray-600">Category Award (Contribution Award)</p>
        </div>
    </div>
</section>

<!-- SOCIETY -->
<section class="max-w-7xl mx-auto my-12 px-5">
    <h3 class="text-2xl font-bold mb-6">
        SOCIETY
        <span class="block h-1 w-32 mt-2 bg-gradient-to-r from-green-500 to-blue-500"></span>
    </h3>

    <ol class="space-y-3 list-decimal list-inside">
        <div class="bg-gray-50 shadow-lg p-4">
            <li>The Institute of Electrical and Electronics Engineers</li>
        </div>
        <div class="bg-gray-50 shadow-lg p-4">
            <li>Information Processing Society of Japan</li>
        </div>
        <div class="bg-gray-50 shadow-lg p-4">
            <li>Japan Society of Mechanical Engineering</li>
        </div>
    </ol>
</section>
@endsection