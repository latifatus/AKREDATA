<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKREDATA - @yield('title','Dashboard')</title>

    <!-- FAVICON LOGO (SUDAH DIPERBAIKI PATH FOLDER IMAGES-NYA) -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <!-- Google Fonts Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>

<body class="bg-[#031c13] text-gray-800">

<div class="flex min-h-screen items-stretch">

    <!-- ================= SIDEBAR ================= -->
    <aside class="w-72 bg-gradient-to-b from-[#021f14] via-[#053322] to-[#021a11] text-white min-h-full flex flex-col justify-between border-r border-emerald-500/20 z-30 flex-shrink-0 shadow-2xl">

        <div>
            <!-- Logo Section -->
            <div class="p-6 border-b border-emerald-500/20 flex flex-col items-center text-center bg-black/20">
                <div class="w-20 h-20 mb-3 flex items-center justify-center transition-transform hover:scale-105 duration-300 drop-shadow-lg">
                    <img src="/images/logo-ti.png" alt="Logo AKREDATA" class="w-full h-full object-contain">
                </div>
                
                <h1 class="text-xl font-bold tracking-widest text-white uppercase drop-shadow-md">
                    AKREDATA
                </h1>
                <p class="mt-1 text-[11px] text-white/80 font-normal leading-normal tracking-wide">
                    Sistem Informasi Pendukung Akreditasi Prodi Teknik Informatika UNIMAL
                </p>
            </div>

            <!-- Navigasi Menu Sidebar -->
            <nav class="mt-5 px-4 space-y-2">

                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-[14px] font-medium tracking-wide text-white 
                   {{ request()->routeIs('dashboard') ? 'bg-emerald-500/30 border border-emerald-400/60 shadow-sm' : 'hover:bg-white/10 hover:text-white' }}">
                    <span class="text-base">🏠</span>
                    <span>Dashboard</span>
                </a>

                <!-- Group Master Data -->
                <div class="pt-3">
                    <p class="text-[11px] font-semibold uppercase text-emerald-300/80 tracking-widest mb-2 px-3 border-b border-white/10 pb-1">
                        MASTER DATA
                    </p>

                    <div class="space-y-1.5">
                        <!-- Data Alumni -->
                        <a href="{{ route('alumni.index') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-[14px] font-medium tracking-wide text-white 
                           {{ request()->routeIs('alumni.*') ? 'bg-emerald-500/30 border border-emerald-400/60 shadow-sm' : 'hover:bg-white/10 hover:text-white' }}">
                            <span class="text-base">👨‍🎓</span>
                            <span>Data Alumni</span>
                        </a>

                        <!-- Publikasi Dosen -->
                        <a href="{{ route('publikasi.index') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-[14px] font-medium tracking-wide text-white 
                           {{ request()->routeIs('publikasi.*') ? 'bg-emerald-500/30 border border-emerald-400/60 shadow-sm' : 'hover:bg-white/10 hover:text-white' }}">
                            <span class="text-base">📚</span>
                            <span>Publikasi Dosen</span>
                        </a>

                        <!-- Dokumen -->
                        <a href="{{ route('dokumen.index') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-[14px] font-medium tracking-wide text-white 
                           {{ request()->routeIs('dokumen.*') ? 'bg-emerald-500/30 border border-emerald-400/60 shadow-sm' : 'hover:bg-white/10 hover:text-white' }}">
                            <span class="text-base">📁</span>
                            <span>Dokumen</span>
                        </a>
                    </div>
                </div>

                <!-- Group Laporan -->
                <div class="pt-3">
                    <p class="text-[11px] font-semibold uppercase text-emerald-300/80 tracking-widest mb-2 px-3 border-b border-white/10 pb-1">
                        LAPORAN
                    </p>

                    <div class="space-y-1.5">
                        <!-- Rekap Tempat Kerja -->
                        <a href="{{ route('laporan.tempatkerja') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-[14px] font-medium tracking-wide text-white 
                           {{ request()->routeIs('laporan.tempatkerja') ? 'bg-emerald-500/30 border border-emerald-400/60 shadow-sm' : 'hover:bg-white/10 hover:text-white' }}">
                            <span class="text-base">📊</span>
                            <span>Rekap Tempat Kerja</span>
                        </a>

                        <!-- Rekap Sumber Pengakuan -->
                        <a href="{{ route('laporan.sumberpengakuan') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-[14px] font-medium tracking-wide text-white 
                           {{ request()->routeIs('laporan.sumberpengakuan') ? 'bg-emerald-500/30 border border-emerald-400/60 shadow-sm' : 'hover:bg-white/10 hover:text-white' }}">
                            <span class="text-base">📈</span>
                            <span>Rekap Sumber Pengakuan</span>
                        </a>

                        <!-- Alumni Profesi Dosen -->
                        <a href="{{ route('laporan.alumniProfesiDosen') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-[14px] font-medium tracking-wide text-white 
                           {{ request()->routeIs('laporan.alumniProfesiDosen') ? 'bg-emerald-500/30 border border-emerald-400/60 shadow-sm' : 'hover:bg-white/10 hover:text-white' }}">
                            <span class="text-base">👨‍🏫</span>
                            <span>Alumni Profesi Dosen</span>
                        </a>
                    </div>
                </div>

            </nav>
        </div>

        <!-- Identitas Akun Login -->
        <div class="p-5 border-t border-emerald-500/20 bg-black/30 mt-6">
            <div class="mb-4 px-1">
                <div class="font-medium text-sm text-white tracking-wide">
                    {{ Auth::user()->name }}
                </div>
                <div class="text-[11px] text-white/80 font-normal mt-0.5">
                    Administrator Prodi
                </div>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full bg-rose-600 hover:bg-rose-700 text-white font-medium text-xs uppercase tracking-wider py-2.5 rounded-xl transition shadow-md hover:shadow-rose-900/50 active:scale-98 cursor-pointer">
                    Keluar Sistem
                </button>
            </form>
        </div>

    </aside>


    <!-- ================= CONTENT AREA ================= -->
    <main class="flex-1 flex flex-col min-w-0 bg-gradient-to-br from-[#eef8f3] via-[#e2f1e8] to-[#d6ebd3]">

        <!-- Header Atas -->
        <header class="bg-white/60 backdrop-blur-md border-b border-emerald-900/10 px-10 py-5 flex justify-between items-center z-20 shadow-sm">
            <div>
                <h2 class="text-2xl font-extrabold text-[#053826] tracking-tight">
                    @yield('title','Dashboard')
                </h2>
                <p class="text-black/80 text-xs font-normal mt-0.5">
                    Sistem Informasi Pendukung Akreditasi Program Studi Teknik Informatika
                </p>
            </div>

            <!-- Identitas User Atas -->
            <div class="flex items-center gap-3.5">
                <div class="w-11 h-11 rounded-full bg-gradient-to-br from-[#06422d] to-[#0b5c40] flex items-center justify-center text-emerald-200 font-bold text-base shadow-md ring-2 ring-emerald-500/20">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="hidden sm:block">
                    <div class="font-semibold text-sm text-[#053826] tracking-wide">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="text-[11px] text-emerald-700/70 font-light">
                        Administrator
                    </div>
                </div>
            </div>
        </header>

        <!-- Section Content -->
        <section class="p-8 bg-transparent flex-1">
            @yield('content')
        </section>

    </main>

</div>

</body>
</html>