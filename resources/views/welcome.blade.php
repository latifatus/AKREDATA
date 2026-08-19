<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKREDATA - Teknik Informatika</title>
    <!-- Google Fonts Poppins Terbuka Sempurna -->
     <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-[#99f7cefd] flex items-center justify-center min-h-screen p-6 md:p-12 selection:bg-green-600 selection:text-white">

    <!-- Card Container Utama (Mewah & Lebar) -->
    <div class="bg-white rounded-[32px] shadow-[0_35px_70px_-15px_rgba(0,0,0,0.5)] flex flex-col md:flex-row max-w-7xl w-full overflow-hidden min-h-[600px] border border-white/10">
        
        <!-- ================= SISI KIRI (INFORMASI & BRANDING) ================= -->
        <div class="w-full md:w-1/2 p-8 md:p-16 flex flex-col justify-between items-center text-center relative bg-gradient-to-b from-[#aef1cf] to-[#e6f1ea]">
            
            <!-- Ornamen Lingkaran Abstrak Sesuai Gambar Referensi -->
            <div class="absolute top-0 left-0 w-48 h-48 border border-green-800/[0.07] rounded-full -translate-x-16 -translate-y-16 pointer-events-none"></div>
            <div class="absolute top-12 left-24 w-32 h-32 border border-green-800/[0.05] rounded-full pointer-events-none"></div>
            <div class="absolute bottom-20 left-16 w-5 h-5 border border-green-700/20 rounded-full pointer-events-none"></div>
            <div class="absolute bottom-10 left-28 w-10 h-10 bg-green-700/[0.08] rounded-full pointer-events-none"></div>
            
            <!-- Pola Titik Grid Kiri Atas -->
            <div class="absolute top-8 left-8 grid grid-cols-5 gap-1.5 opacity-20 pointer-events-none">
                <div class="w-1 h-1 bg-green-900 rounded-full"></div><div class="w-1 h-1 bg-green-900 rounded-full"></div><div class="w-1 h-1 bg-green-900 rounded-full"></div><div class="w-1 h-1 bg-green-900 rounded-full"></div><div class="w-1 h-1 bg-green-900 rounded-full"></div>
                <div class="w-1 h-1 bg-green-900 rounded-full"></div><div class="w-1 h-1 bg-green-900 rounded-full"></div><div class="w-1 h-1 bg-green-900 rounded-full"></div><div class="w-1 h-1 bg-green-900 rounded-full"></div><div class="w-1 h-1 bg-green-900 rounded-full"></div>
            </div>

            <!-- Konten Tengah -->
            <div class="w-full flex flex-col items-center my-auto z-10">
                <!-- Logo Bersih Tanpa Border Sesuai Request Terbaru -->
                <div class="w-40 h-40 mb-6 flex items-center justify-center transition-transform hover:scale-105 duration-300">
                    <img src="/images/logo-ti.png" alt="Logo AKREDATA" class="w-full h-full object-contain" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <span class="hidden text-xs text-gray-400 font-bold uppercase tracking-wider text-center">Logo<br>AKREDATA</span>
                </div>
                
                <!-- Judul Aplikasi -->
                <h1 class="text-4xl md:text-5xl font-extrabold text-[#042E1F] tracking-[0.07em] uppercase">AKREDATA</h1>
                <p class="text-xs font-semibold text-green-800/60 uppercase tracking-[0.2em] mt-2">Sistem Informasi Pendukung Akreditasi</p>
                
                <!-- Dot Divider Elegan -->
                <div class="flex items-center gap-2 my-5">
                    <div class="w-2 h-2 bg-[#042E1F] rounded-full"></div>
                </div>
                
                <!-- Teks Deskripsi Ringan & Rapi -->
                <p class="text-sm text-gray-700 leading-relaxed max-w-md font-normal px-4">
                    Kelola data pendukung akreditasi program studi <br class="hidden sm:block">
                    <span class="font-bold text-[#042E1F]">Teknik Informatika Universitas Malikussaleh</span> <br>
                    dengan lebih terintegrasi, aman, dan mudah diakses.
                </p>
            </div>

            <!-- Footer Hak Cipta Kiri -->
            <footer class="text-[11px] text-green-900/40 tracking-widest uppercase w-full border-t border-green-800/10 pt-4 z-10">
                © 2026 AKREDATA UNIMAL. All Rights Reserved.
            </footer>
        </div>

        <!-- ================= SISI KANAN (AKSES MENU UTAMA) ================= -->
        <div class="w-full md:w-1/2 bg-[#042E1F] p-8 md:p-16 flex flex-col justify-between items-center text-white relative">
            
            <!-- Ornamen Garis Modern Kanan Atas -->
            <div class="absolute top-8 right-8 opacity-10 pointer-events-none">
                <svg width="120" height="120" viewBox="0 0 100 100" fill="none" xmlns="http://w3.org">
                    <line x1="0" y1="20" x2="100" y2="20" stroke="white" stroke-width="1.5"/>
                    <line x1="20" y1="40" x2="100" y2="40" stroke="white" stroke-width="1.5"/>
                    <line x1="40" y1="60" x2="100" y2="60" stroke="white" stroke-width="1.5"/>
                </svg>
            </div>

            <!-- Spacer Atas untuk Penyeimbang Posisi -->
            <div class="hidden md:block h-4"></div>

            <!-- Blok Konten Utama Kanan -->
            <div class="w-full max-w-sm my-auto z-10">
                <h2 class="text-3xl md:text-4xl font-bold tracking-tight text-white mb-2 text-center md:text-left">Selamat Datang!</h2>
                <p class="text-sm text-gray-300/90 font-light mb-10 text-center md:text-left leading-relaxed">Silakan pilih menu di bawah ini untuk mengakses dashboard akun Anda.</p>
                
                <!-- Menu Tombol Aksi -->
                <div class="space-y-4 w-full">
                    <!-- Tombol Masuk (Hijau Terang Solid) -->
                    <a href="/login"
                       class="w-full bg-[#4CAF50] hover:bg-[#43a047] text-white font-semibold py-4 px-6 rounded-xl flex items-center justify-center gap-2 transition-all duration-300 shadow-[0_10px_25px_-5px_rgba(76,175,80,0.3)] transform active:scale-[0.98] tracking-wider text-sm cursor-pointer">
                        <svg xmlns="http://w3.org" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
                        <span>MASUK KE SISTEM</span>
                    </a>

                    <!-- Garis Atau Tipis -->
                    <div class="relative flex py-3 items-center w-full">
                        <div class="flex-grow border-t border-white/10"></div>
                        <span class="flex-shrink mx-4 text-white/30 text-xs uppercase tracking-widest font-medium">atau</span>
                        <div class="flex-grow border-t border-white/10"></div>
                    </div>

                    <!-- Tombol Daftar (Outline Minimalis) -->
                    <a href="/register"
                       class="w-full border border-white/20 hover:border-white/60 hover:bg-white/[0.03] text-gray-200 hover:text-white font-medium py-4 px-6 rounded-xl flex items-center justify-center transition-all duration-300 tracking-wider text-sm cursor-pointer">
                        <span>BELUM PUNYA AKUN? DAFTAR</span>
                    </a>
                </div>
            </div>

            <!-- Pola Titik Grid Kanan Bawah -->
            <div class="absolute bottom-8 right-8 grid grid-cols-5 gap-1.5 opacity-10 pointer-events-none">
                <div class="w-1 h-1 bg-white rounded-full"></div><div class="w-1 h-1 bg-white rounded-full"></div><div class="w-1 h-1 bg-white rounded-full"></div><div class="w-1 h-1 bg-white rounded-full"></div><div class="w-1 h-1 bg-white rounded-full"></div>
                <div class="w-1 h-1 bg-white rounded-full"></div><div class="w-1 h-1 bg-white rounded-full"></div><div class="w-1 h-1 bg-white rounded-full"></div><div class="w-1 h-1 bg-white rounded-full"></div><div class="w-1 h-1 bg-white rounded-full"></div>
                <div class="w-1 h-1 bg-white rounded-full"></div><div class="w-1 h-1 bg-white rounded-full"></div><div class="w-1 h-1 bg-white rounded-full"></div><div class="w-1 h-1 bg-white rounded-full"></div><div class="w-1 h-1 bg-white rounded-full"></div>
            </div>
        </div>

    </div>

</body>
</html>
