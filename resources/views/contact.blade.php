@extends('layouts.app')

@section('title', 'Contact')

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
        @foreach($contactInfos as $contact)
        <div class="flex items-center gap-4 bg-gray-100 rounded-xl shadow p-4 w-full">
            {{-- Icon + warna berdasarkan type, tapi type tidak ditampilkan --}}
            <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full 
                    @if($contact->type === 'website') bg-blue-600
                    @elseif($contact->type === 'email') bg-green-500
                    @elseif($contact->type === 'edas') bg-purple-600
                    @elseif($contact->type === 'phone') bg-orange-500 @endif
                    text-white">
                @if($contact->type === 'website') <i class="fas fa-globe text-lg"></i>
                @elseif($contact->type === 'email') <i class="fas fa-envelope text-lg"></i>
                @elseif($contact->type === 'edas') <i class="fas fa-file-alt text-lg"></i>
                @elseif($contact->type === 'phone') <i class="fas fa-phone text-lg"></i> @endif
            </div>

            {{-- Konten: hanya title & value --}}
            <div class="w-full">
                <p class="font-bold text-gray-900">{{ $contact->title}}</p>
                <p class="text-sm text-gray-600">{{ $contact->value }}</p>
            </div>
        </div>
        @endforeach
    </div>



    <!-- CONTACT FORM -->
    <h3 class="font-bold text-gray-800 mb-4">SEND US A MESSAGE</h3>
    <form action="{{ route('contact.send', ['event_year' => $event->year, 'event_name' => $event->name]) }}" method="POST" class="space-y-4 w-full">
        @csrf
        <div>
            <label class="block font-medium">Name</label>
            <input type="text" name="name" placeholder="Your Name"
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div>
            <label class="block font-medium">Email</label>
            <input type="email" name="email" placeholder="Your Email"
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div>
            <label class="block font-medium">Message</label>
            <textarea name="message" placeholder="Your Message" rows="4"
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
            @if($map)
            <iframe class="w-full md:w-4/5 h-96 rounded-lg shadow-lg" src="{{ $map->link }}" allowfullscreen=""
                loading="lazy">
            </iframe>
            @else
            <p class="text-gray-300 text-center py-10">
                Map location has not been determined.
            </p>
            @endif
        </div>

    </div>
</section>

@endsection