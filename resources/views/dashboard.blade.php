@extends('layouts.dashboard')

@section('title','Dashboard')

@section('content')

<!-- Wrapper Utama dengan Spacing Lega & Seimbang -->
<div class="-m-8 p-8 bg-gradient-to-b from-[#d4efdf] to-[#aed3bc] min-h-screen space-y-6">

    <!-- 1. HERO BANNER -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#042E1F] via-[#0b4732] to-[#125d43] p-8 shadow-xl border border-white/5">
        <div class="absolute -right-10 -top-10 h-60 w-60 rounded-full bg-white/[0.04] border border-white/5 pointer-events-none"></div>

        <div class="relative flex flex-col md:flex-row justify-between items-center z-10 gap-6">
            <div>
                <span class="uppercase tracking-[4px] text-green-300 font-semibold text-xs bg-white/10 px-3.5 py-1 rounded-full backdrop-blur-sm">
                    AKREDATA
                </span>
                <h1 class="text-3xl md:text-4xl font-extrabold text-white mt-3 tracking-tight">
                    Halo, {{ Auth::user()->name }} 👋
                </h1>
                <p class="mt-2 text-gray-200 text-sm md:text-base max-w-2xl font-light leading-relaxed">
                    Selamat datang di Sistem Informasi Pendukung Akreditasi Program Studi Teknik Informatika Universitas Malikussaleh.
                </p>
            </div>

            <!-- Box Kalender -->
            <div class="rounded-2xl bg-white/[0.08] border border-white/10 backdrop-blur-md px-8 py-4 text-center min-w-[150px] shadow-sm flex-shrink-0">
                <div class="text-3xl font-bold text-white tracking-tight">
                    {{ now('Asia/Jakarta')->format('d') }}
                </div>
                <div class="text-green-300 text-xs uppercase tracking-wider font-semibold mt-1">
                    {{ now('Asia/Jakarta')->translatedFormat('l, F Y') }}
                </div>
            </div>
        </div>
    </div>

    <!-- 2. CARD STATISTIK -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card Alumni -->
        <div class="rounded-2xl bg-gradient-to-br from-[#042E1F] to-[#0a4631] p-6 text-white shadow-md border border-white/5 transition duration-300 hover:-translate-y-1">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-xs font-semibold tracking-wider uppercase text-green-300/80">Total Alumni</p>
                    <h2 class="text-3xl font-extrabold mt-2 tracking-tight">{{ $jumlahAlumni }}</h2>
                </div>
                <div class="text-4xl bg-white/10 p-3 rounded-2xl backdrop-blur-sm">👨‍🎓</div>
            </div>
        </div>

        <!-- Card Publikasi -->
        <div class="rounded-2xl bg-gradient-to-br from-[#4CAF50] to-[#3d9441] p-6 text-white shadow-md border border-white/5 transition duration-300 hover:-translate-y-1">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-xs font-semibold tracking-wider uppercase text-green-100/80">Publikasi</p>
                    <h2 class="text-3xl font-extrabold mt-2 tracking-tight">{{ $jumlahPublikasi }}</h2>
                </div>
                <div class="text-4xl bg-white/10 p-3 rounded-2xl backdrop-blur-sm">📚</div>
            </div>
        </div>

        <!-- Card Dokumen -->
        <div class="rounded-2xl bg-gradient-to-br from-[#125d43] to-[#0b4330] p-6 text-white shadow-md border border-white/5 transition duration-300 hover:-translate-y-1">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-xs font-semibold tracking-wider uppercase text-green-200/80">Dokumen</p>
                    <h2 class="text-3xl font-extrabold mt-2 tracking-tight">{{ $jumlahDokumen }}</h2>
                </div>
                <div class="text-4xl bg-white/10 p-3 rounded-2xl backdrop-blur-sm">📁</div>
            </div>
        </div>
    </div>

    <!-- 3. GRAFIK ALUMNI -->
    <div class="bg-gradient-to-b from-[#b8edcf] to-[#caf0d9] rounded-2xl shadow-sm border border-gray-100/60 p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-[#042E1F] tracking-tight">Statistik Mahasiswa Lulus</h2>
            <span class="bg-[#e6f1ea] text-[#042E1F] font-semibold px-3 py-1 rounded-full text-xs uppercase tracking-wider">Tahun {{ date('Y') }}</span>
        </div>
        <div class="h-64 rounded-xl bg-gray-50/70 border border-gray-100/80 relative p-3">
            <canvas id="grafikAlumni"></canvas>
        </div>
    </div>

    <!-- 4. AKTIVITAS & INFORMASI (3 CARD SEJAJAR) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Card 1: Publikasi Terbaru -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
            <div class="bg-gradient-to-r from-[#042E1F] to-[#0c4430] p-5 text-white flex justify-between items-center">
                <div>
                    <h2 class="text-base font-bold tracking-tight">📚 Publikasi Terbaru</h2>
                    <p class="text-xs text-green-300/80 font-light">Data publikasi dosen prodi</p>
                </div>
                <a href="{{ route('publikasi.index') }}" class="text-green-300 hover:text-white font-semibold text-xs transition-colors">Lihat →</a>
            </div>
            <div class="p-5 flex-1">
                @forelse($publikasiTerbaru->take(3) as $item)
                <div class="border-b border-gray-100 last:border-none py-3 first:pt-0 flex justify-between items-center gap-2">
                    <h3 class="font-medium text-gray-800 text-xs truncate max-w-[200px]" title="{{ $item->judul }}">{{ $item->judul }}</h3>
                    <span class="bg-[#e6f1ea] text-[#042E1F] font-semibold text-[11px] px-2.5 py-1 rounded-full flex-shrink-0">{{ $item->tahun_kolaborasi }}</span>
                </div>
                @empty
                <div class="text-center py-8 text-xs text-gray-400 font-light">Belum ada data publikasi terinput.</div>
                @endforelse
            </div>
        </div>

        <!-- Card 2: Dokumen Terbaru -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
            <div class="bg-gradient-to-r from-[#125d43] to-[#0b4330] p-5 text-white flex justify-between items-center">
                <div>
                    <h2 class="text-base font-bold tracking-tight">📁 Dokumen Terbaru</h2>
                    <p class="text-xs text-green-200/80 font-light">Dokumen akreditasi prodi</p>
                </div>
                <a href="{{ route('dokumen.index') }}" class="text-green-200 hover:text-white font-semibold text-xs transition-colors">Lihat →</a>
            </div>
            <div class="p-5 flex-1">
                @forelse($dokumenTerbaru->take(3) as $item)
                <div class="border-b border-gray-100 last:border-none py-3 first:pt-0 flex justify-between items-center gap-2">
                    <h3 class="font-medium text-gray-800 text-xs truncate max-w-[200px]" title="{{ $item->nama_dokumen }}">{{ $item->nama_dokumen }}</h3>
                    <span class="bg-[#e6f1ea] text-[#042E1F] font-semibold text-[11px] px-2.5 py-1 rounded-full flex-shrink-0">{{ $item->kategori ?: 'Dokumen' }}</span>
                </div>
                @empty
                <div class="text-center py-8 text-xs text-gray-400 font-light">Belum ada data dokumen terinput.</div>
                @endforelse
            </div>
        </div>

        <!-- Card 3: Informasi & Status Sistem (Sejajar di Kanan) -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
            <div class="bg-gradient-to-r from-[#042E1F] via-[#084b33] to-[#0c5a3e] p-5 text-white flex justify-between items-center">
                <div>
                    <h2 class="text-base font-bold tracking-tight">ℹ️ Status Sistem</h2>
                    <p class="text-xs text-green-200/80 font-light">Informasi platform AKREDATA</p>
                </div>
                <span class="bg-emerald-500/20 text-emerald-200 text-[10px] px-2.5 py-1 rounded-full border border-emerald-400/30 backdrop-blur-sm font-medium">
                    ONLINE
                </span>
            </div>
            <div class="p-5 flex-1 divide-y divide-gray-100 text-xs">
                
                {{-- Status --}}
                <div class="py-2.5 first:pt-0 flex justify-between items-center">
                    <span class="text-gray-500">Status Operasional</span>
                    <span class="font-bold text-[#042E1F] flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Aktif
                    </span>
                </div>

                {{-- Versi --}}
                <div class="py-2.5 flex justify-between items-center">
                    <span class="text-gray-500">Versi Aplikasi</span>
                    <span class="font-bold text-[#042E1F] font-mono">v1.0.0</span>
                </div>

                {{-- Program Studi --}}
                <div class="py-2.5 flex justify-between items-center">
                    <span class="text-gray-500">Program Studi</span>
                    <span class="font-bold text-[#042E1F]">Teknik Informatika</span>
                </div>

                {{-- Hak Akses --}}
                <div class="py-2.5 last:pb-0 flex justify-between items-center">
                    <span class="text-gray-500">Hak Akses</span>
                    <span class="font-bold text-[#042E1F]">Administrator</span>
                </div>

            </div>
        </div>

    </div>

</div>

<!-- SCRIPT GRAPH CONFIGURATION -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafikAlumni');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($labelGrafik),
            datasets: [{
                label: 'Jumlah Alumni Lulus',
                data: @json($dataGrafik),
                borderColor: '#4CAF50',
                backgroundColor: 'rgba(76, 175, 80, 0.08)',
                tension: 0.35,
                fill: true,
                pointRadius: 4,
                pointHoverRadius: 6,
                pointBackgroundColor: '#4CAF50',
                borderWidth: 3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        boxWidth: 12,
                        font: { family: 'Poppins', size: 12 }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0, font: { family: 'Poppins', size: 11 } },
                    grid: { color: 'rgba(0, 0, 0, 0.04)' }
                },
                x: {
                    ticks: { font: { family: 'Poppins', size: 11 } },
                    grid: { display: false }
                }
            }
        }
    });
</script>

@endsection