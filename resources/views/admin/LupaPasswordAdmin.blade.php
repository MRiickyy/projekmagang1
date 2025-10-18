<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lupa Password Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A] text-slate-100">

  <div class="w-full max-w-md bg-gradient-to-br from-[#0f172a] to-[#1f2937] p-8 rounded-2xl shadow-xl">
    <h2 class="text-2xl font-bold text-center text-white mb-6">Lupa Password Admin</h2>

    <!-- STEP 1: Masukkan Email -->
    <form id="step1" class="space-y-4">
      <p class="text-sm text-slate-300 mb-2 text-center">
        Masukkan email untuk menerima kode verifikasi reset password.
      </p>
      <div>
        <input type="email" placeholder="Masukkan Email"
          class="w-full px-4 py-2 border border-slate-600 bg-slate-800/50 text-slate-200 rounded-lg
                 focus:ring-2 focus:ring-[#1dd1a1] focus:outline-none placeholder-slate-400">
      </div>
      <button type="button" onclick="goToStep(2)"
        class="w-full bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8]
               text-black font-semibold py-2 rounded-lg hover:opacity-90 transition">
        Kirim Kode Verifikasi
      </button>
    </form>

    <!-- STEP 2: Masukkan Kode dan Password Baru -->
    <form id="step2" class="space-y-4 hidden">
      <p class="text-sm text-slate-300 mb-2 text-center">
        Masukkan kode yang dikirim ke email Anda dan buat password baru.
      </p>

      <!-- Input kode verifikasi -->
      <div>
        <input type="text" placeholder="Masukkan Kode dari Email"
          class="w-full px-4 py-2 border border-slate-600 bg-slate-800/50 text-slate-200 rounded-lg
                 focus:ring-2 focus:ring-[#1dd1a1] focus:outline-none placeholder-slate-400">
      </div>

      <!-- Input password baru -->
      <div>
        <input type="password" placeholder="Masukkan Password Baru"
          class="w-full px-4 py-2 border border-slate-600 bg-slate-800/50 text-slate-200 rounded-lg
                 focus:ring-2 focus:ring-[#1dd1a1] focus:outline-none placeholder-slate-400">
      </div>
      <div>
        <input type="password" placeholder="Konfirmasi Password Baru"
          class="w-full px-4 py-2 border border-slate-600 bg-slate-800/50 text-slate-200 rounded-lg
                 focus:ring-2 focus:ring-[#1dd1a1] focus:outline-none placeholder-slate-400">
      </div>

      <!-- Tombol aksi -->
      <button type="button"
        class="w-full bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8]
               text-black font-semibold py-2 rounded-lg hover:opacity-90 transition">
        Simpan Password Baru
      </button>
      <button type="button" onclick="goToStep(1)"
        class="w-full bg-slate-700 text-slate-200 py-2 rounded-lg hover:bg-slate-600 transition">
        ← Kembali
      </button>
    </form>

    <div class="mt-4 text-center">
      <a href="{{ url('/login') }}" class="text-sm text-[#38bdf8] hover:underline">← Kembali ke Login</a>
    </div>
  </div>

  <!-- SCRIPT UNTUK GANTI LANGKAH -->
  <script>
    function goToStep(step) {
      document.getElementById('step1').classList.add('hidden');
      document.getElementById('step2').classList.add('hidden');
      document.getElementById(`step${step}`).classList.remove('hidden');
    }
  </script>

</body>
</html>
