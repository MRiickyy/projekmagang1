@extends('layouts.app')

@section('title', 'Keynote Speakers - ICOICT 2025')

@section('content')
<!-- SPEAKERS -->
<section class="max-w-7xl mx-auto my-12 px-5">
    <h3 class="text-center text-3xl font-bold mb-10">
        CONTACT
        <span class="block h-1 w-40 mx-auto mt-2 bg-gradient-to-r from-green-500 to-blue-500"></span>
    </h3>

    <!-- CONTACT INFO -->
    <h3 class="font-bold text-gray-800 mb-4">CONTACT US AT</h3>
    <div class="flex flex-col space-y-4 mb-10 w-full">
        <div class="flex items-center gap-4 bg-gray-100 rounded-xl shadow p-4 w-full">
            <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-blue-600 text-white">
                <i class="fas fa-globe text-lg"></i>
            </div>
            <div class="w-full">
                <p class="font-bold text-gray-900">Conference Website</p>
                <p class="text-sm text-gray-600">https://conference-website.com</p>
            </div>
        </div>

        <div class="flex items-center gap-4 bg-gray-100 rounded-xl shadow p-4 w-full">
            <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-green-500 text-white">
                <i class="fas fa-envelope text-lg"></i>
            </div>
            <div class="w-full">
                <p class="font-bold text-gray-900">Official Email Address</p>
                <p class="text-sm text-gray-600">conference@email.com</p>
            </div>
        </div>

        <div class="flex items-center gap-4 bg-gray-100 rounded-xl shadow p-4 w-full">
            <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-purple-600 text-white">
                <i class="fas fa-file-alt text-lg"></i>
            </div>
            <div class="w-full">
                <p class="font-bold text-gray-900">EDAS Submission Link</p>
                <p class="text-sm text-gray-600">https://edas.info/conference</p>
            </div>
        </div>

        <div class="flex items-center gap-4 bg-gray-100 rounded-xl shadow p-4 w-full">
            <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-orange-500 text-white">
                <i class="fas fa-phone text-lg"></i>
            </div>
            <div class="w-full">
                <p class="font-bold text-gray-900">Phone ( WhatsApp )</p>
                <p class="text-sm text-gray-600">+62 812 3456 7890</p>
            </div>
        </div>
    </div>


    <!-- CONTACT FORM -->
    <h3 class="font-bold text-gray-800 mb-4">SEND US A MESSAGE</h3>
    <form class="space-y-4 w-full">
        <div>
            <label class="block font-medium">Name</label>
            <input type="text" placeholder="Your Name"
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div>
            <label class="block font-medium">Email</label>
            <input type="email" placeholder="Your Email"
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div>
            <label class="block font-medium">Message</label>
            <textarea placeholder="Your Message" rows="4"
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-[#47BA77] hover:bg-green-600 text-white px-6 py-2 rounded-full shadow">
                Send Message
            </button>
        </div>
    </form>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</section>


<!-- MAPS LOCATION -->
<section class="bg-[#0a2a43] text-white py-12 mt-12">
    <div class="max-w-7xl mx-auto px-5">
        <h2 class="text-center text-3xl font-bold mb-8">Maps Location
            <span class="block h-1 w-32 mx-auto mt-2 bg-gradient-to-r from-green-500 to-blue-500"></span>
        </h2>

        <div class="flex justify-center">
            <iframe class="w-full md:w-4/5 h-96 rounded-lg shadow-lg"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63363.17630783987!2d107.5731166!3d-6.9034443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7d2e5c4e2df%3A0x301e8f1fc28da30!2sBandung%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1700000000000"
                allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

@endsection