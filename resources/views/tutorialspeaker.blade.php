@extends('layouts.app')

@section('title', 'Tutorial Speakers - ICOICT 2025')

@section('content')
<!-- SPEAKERS -->
<section class="max-w-5xl mx-auto my-12 px-6">
    <h3 class="text-center text-2xl font-bold mb-10">TUTORIAL SPEAKERS
        <!-- Garis bawah -->
        <span class="block h-1 w-40 mx-auto mt-2 bg-gradient-to-r from-green-500 to-blue-500"></span>
    </h3>

    <!-- CARD -->
    <div class="bg-gray-100 rounded-lg shadow-md flex items-start mb-6 overflow-hidden">
        <img src="https://2025.icoict.org/wp-content/uploads/sites/13/2024/11/Eisuke-Kita-1.png"
            alt="Prof. Eisuke Kita" class="w-40 h-40 object-cover rounded-xl m-4">
        <div class="flex flex-col justify-between p-4 flex-1">
            <div>
                <h4 class="text-lg font-bold mb-2">Prof. Eisuke Kita | Nagoya University</h4>
                <div class="relative">
                    <p id="desc"
                        class="text-sm leading-relaxed max-h-24 overflow-hidden transition-all duration-500">
                        Prof. <strong>Eisuke Kita</strong> (北 栄祐) is a dean and a professor at the Graduate School of Informatics
                        of <strong>Nagoya University</strong>. He received his Doctor of Engineering degree from the Graduate
                        School of Engineering of Nagoya University. His research fields include mathematical model of vehicle
                        platoon and traffic flow control. Prof. Kita has also contributed to various international collaborations
                        in traffic systems...
                    </p>

                    <!-- Fade di bawah -->
                    <div id="fade"
                        class="absolute bottom-0 left-0 right-0 h-12 bg-gradient-to-t from-gray-100 to-transparent pointer-events-none"></div>
                </div>
            </div>
            <a href="#"
                class="self-end bg-[#0a2a43] hover:bg-[#103d60] text-white px-5 py-2 rounded-full text-sm flex items-center gap-2">
                Read More
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>

    <!-- COPY CARD -->
    <div class="bg-gray-100 rounded-lg shadow-md flex items-start mb-6 overflow-hidden">
        <img src="https://via.placeholder.com/150" alt="Speaker 2" class="w-40 h-40 object-cover rounded-xl m-4">
        <div class="flex flex-col justify-between p-4 flex-1">
            <div>
                <h4 class="text-lg font-bold mb-2">Prof. John Doe | Example University</h4>
                <div class="relative">
                    <p id="desc"
                        class="text-sm leading-relaxed max-h-24 overflow-hidden transition-all duration-500">
                        Prof. <strong>Eisuke Kita</strong> (北 栄祐) is a dean and a professor at the Graduate School of Informatics
                        of <strong>Nagoya University</strong>. He received his Doctor of Engineering degree from the Graduate
                        School of Engineering of Nagoya University. His research fields include mathematical model of vehicle
                        platoon and traffic flow control. Prof. Kita has also contributed to various international collaborations
                        in traffic systems...
                    </p>

                    <!-- Fade putih di bawah -->
                    <div id="fade"
                        class="absolute bottom-0 left-0 right-0 h-12 bg-gradient-to-t from-gray-100 to-transparent pointer-events-none"></div>
                </div>
            </div>
            <a href="#"
                class="self-end bg-[#0a2a43] hover:bg-[#103d60] text-white px-5 py-2 rounded-full text-sm flex items-center gap-2">
                Read More
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>

</section>
@endsection