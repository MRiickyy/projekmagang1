{{-- resources/views/callpaper.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Call for Papers 2025</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans">

  {{-- Navbar --}}
  <nav class="bg-[#1a1f27]/95 backdrop-blur sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-5 py-4 flex items-center justify-between">
      <a href="/" class="text-2xl font-extrabold bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] bg-clip-text text-transparent">
        ICOICT 2025
      </a>
      <div class="hidden md:flex items-center gap-8 font-semibold text-slate-200">
        <a href="#" class="hover:text-[#9ae6b4]">Call for Papers</a>
        <a href="#" class="hover:text-[#9ae6b4]">Speakers</a>
        <a href="#" class="hover:text-[#9ae6b4]">Committees</a>
        <a href="#" class="hover:text-[#9ae6b4]">Events</a>
        <a href="#" class="hover:text-[#9ae6b4]">For Authors</a>
      </div>
    </div>
  </nav>

  {{-- Hero --}}
  <header class="min-h-[70vh] flex items-center bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A]">
    <div class="max-w-7xl mx-auto px-5 py-16 grid md:grid-cols-2 gap-8 items-center">
      <div>
        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight text-white">
          THE 13TH ICOICT 
          <span class="bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] bg-clip-text text-transparent">
            2025
          </span>
        </h1>
        <p class="mt-4 text-slate-200 text-xl max-w-xl">
          International Conference on Information and Communication Technology
        </p>
        <div class="mt-6 flex items-center gap-3">
          <a href="#" class="px-7 py-3 rounded-full shadow-lg bg-slate-800/70 hover:bg-slate-700 text-white text-lg">
            Register Now
          </a>
          <a href="#" class="px-7 py-3 rounded-full shadow-lg bg-[#25d366] hover:bg-[#1fb857] text-black font-semibold text-lg">
            Submit Your Paper
          </a>
        </div>
      </div>
    </div>
  </header>

  {{-- Call for Papers --}}
  <section class="max-w-7xl mx-auto px-5 py-16">
    <h2 class="text-center text-3xl md:text-4xl font-extrabold text-slate-800 mb-12">CALL FOR PAPERS</h2>
    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
      <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
        <h5 class="font-bold text-lg mb-3">Artificial Intelligence & Machine Learning</h5>
        <ul class="list-disc list-inside text-slate-600">
          <li>Learning Algorithms & Methods</li>
          <li>Explainable AI</li>
          <li>Computer Vision</li>
          <li>Natural Language Processing</li>
          <li>AI in Healthcare</li>
          <li>AI in Education</li>
        </ul>
      </div>
      <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
        <h5 class="font-bold text-lg mb-3">Data Science and Its Implementation</h5>
        <ul class="list-disc list-inside text-slate-600">
          <li>Big Data Analytics</li>
          <li>Statistical Methods</li>
          <li>Text Mining</li>
          <li>Recommender Systems</li>
          <li>Business Intelligence</li>
          <li>Computational Statistics</li>
        </ul>
      </div>
      <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
        <h5 class="font-bold text-lg mb-3">IoT System and Infrastructure</h5>
        <ul class="list-disc list-inside text-slate-600">
          <li>IoT Architecture</li>
          <li>5G Technology</li>
          <li>Cloud Computing</li>
          <li>Edge Computing</li>
          <li>Smart Cities</li>
          <li>Sensor Networks</li>
        </ul>
      </div>
      <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition">
        <h5 class="font-bold text-lg mb-3">Information Technology Applications</h5>
        <ul class="list-disc list-inside text-slate-600">
          <li>IT in Smart Cities</li>
          <li>Cybersecurity</li>
          <li>E-Learning</li>
          <li>Business Analytics</li>
          <li>Emerging IT Tech</li>
        </ul>
      </div>
    </div>
  </section>

  {{-- Submission Guidelines --}}
  <section class="max-w-4xl mx-auto px-5 py-12">
    <h3 class="text-2xl font-bold mb-4 text-slate-800">SUBMISSION GUIDELINES</h3>
    <p class="text-slate-600 leading-relaxed">
      All papers must be original, technical-type paper, not published or under consideration elsewhere, 
      and must be submitted electronically in PDF format. Accepted papers will be submitted to IEEE Xplore.
    </p>
  </section>

  {{-- Important Dates --}}
  <section class="bg-slate-100 py-16">
    <div class="max-w-5xl mx-auto px-5 text-center">
      <h3 class="text-2xl font-bold text-slate-800">IMPORTANT DATE (ROUND 2)</h3>
      <div class="grid gap-6 md:grid-cols-3 mt-10">
        <div class="bg-white shadow-md rounded-xl p-6">
          <b class="block text-lg text-slate-800">Paper Submission Deadline</b>
          <span class="text-slate-600">April 25, 2025</span>
        </div>
        <div class="bg-white shadow-md rounded-xl p-6">
          <b class="block text-lg text-slate-800">Notification of Acceptance</b>
          <span class="text-slate-600">May 16, 2025</span>
        </div>
        <div class="bg-white shadow-md rounded-xl p-6">
          <b class="block text-lg text-slate-800">Camera-Ready Paper Deadline</b>
          <span class="text-slate-600">June 20, 2025</span>
        </div>
      </div>
    </div>
  </section>

  {{-- Join Section --}}
  <section class="text-center py-16 bg-gradient-to-r from-[#1f3c77] to-[#0f172a] text-white">
    <h4 class="text-2xl font-bold">JOIN US!</h4>
    <p class="mt-3 max-w-2xl mx-auto">Share your insights and contribute to advancing knowledge in AI, IoT, and Data Science Technologies.</p>
    <a href="#" class="mt-6 inline-block px-7 py-3 rounded-full bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] bg-clip-text text-transparent">
      Submit Your Paper
    </a>
      <div class="mt-6 flex justify-center gap-4">
    <!-- Tombol Learn More -->
    <a href="#"
       class="inline-flex items-center gap-2 px-7 py-3 rounded-full bg-white/10 hover:bg-white/20 text-white font-semibold shadow-lg transition">
      <!-- Icon Graduation Cap -->
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7m0-7l-9-5m9 5l9-5" />
      </svg>
      Learn More
    </a>

    <!-- Tombol Submit Your Paper -->
    <a href="#"
       class="inline-flex items-center gap-2 px-7 py-3 rounded-full bg-[#25d366] hover:bg-[#1fb857] text-white font-semibold shadow-lg transition">
      <!-- Icon Document -->
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
      </svg>
      Submit Your Paper
    </a>
  </div>

  </section>

  {{-- Footer Baru --}}
  <footer class="bg-[#1a1f27] text-gray-300 py-10 mt-10">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">

      <div>
        <h2 class="text-lg font-semibold text-white mb-3">Organized By</h2>
        <p>Telkom University Indonesia</p>
      </div>

      <div>
        <h2 class="text-lg font-semibold text-white mb-3">Co-Hosts</h2>
        <p>Multimedia University Malaysia</p>
      </div>

      <div>
        <h2 class="text-lg font-semibold text-white mb-3">Sponsored By</h2>
        <p>IEEE Indonesia Section</p>
      </div>

    </div>
    <div class="border-t border-gray-700 mt-8 pt-6 text-center text-sm text-gray-400">
      <p>© 2025 ICOICT. All Rights Reserved.</p>
    </div>
  </footer>

</body>
</html>
