@extends('layouts.dashboard')

@section('title','Rekap Tempat Kerja')

@section('content')

{{-- REVISI: Mengubah p-8 menjadi pt-4 pb-5 px-6 serta ditambahkan -mt-8 agar ukuran box luar mengecil dan naik ke atas mengikis space putih --}}
<div class="bg-gradient-to-b from-[#d3f3e1] to-[#caf0d9] rounded-3xl shadow-md pt-4 pb-5 px-6 -mt-8 space-y-4">

    {{-- Header Page (REVISI: Mengecilkan teks judul ke text-2xl dan deskripsi ke text-xs agar lebih hemat ruang) --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-2">
        <div>
            <h1 class="text-2xl font-extrabold text-[#042E1F] tracking-tight">
                Rekap Tempat Kerja Alumni
            </h1>
            <p class="text-emerald-800/70 text-xs mt-0.5 font-light">
                Ringkasan data persebaran alumni yang telah bekerja beserta instansinya.
            </p>
        </div>
    </div>

    {{-- Card Statistik (REVISI: Diperkecil lagi padding-nya dari p-5 menjadi p-4 agar lebih tipis dan compact) --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <!-- Card Total Alumni Bekerja -->
        <div class="rounded-2xl bg-gradient-to-br from-[#055a3a] via-[#086a45] to-[#0e8256] p-4 text-white shadow-md border border-white/20 flex items-center justify-between relative overflow-hidden group hover:shadow-lg transition-all duration-300">
            <div class="z-10">
                <p class="text-[9px] font-bold tracking-widest uppercase text-emerald-200/90">Total Alumni Bekerja</p>
                {{-- REVISI AKURASI: Menggunakan $data->total() agar hitungan total akurat mencakup seluruh halaman --}}
                <h3 class="text-2xl font-black mt-0.5 text-white tracking-tight leading-none">{{ $data->total() }}</h3>
                <p class="text-[10px] text-emerald-100/80 mt-1 font-medium flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-300 inline-block animate-pulse"></span>
                    Orang Terdata
                </p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-white/15 backdrop-blur-md text-white border border-white/10 flex items-center justify-center text-xl shadow-inner group-hover:scale-105 transition duration-300">
                💼
            </div>
            <div class="absolute -right-6 -bottom-6 w-20 h-24 bg-white/10 rounded-full blur-xl"></div>
        </div>

        <!-- Card Total Instansi -->
        <div class="rounded-2xl bg-gradient-to-br from-[#076843] via-[#0a7a50] to-[#129262] p-4 text-white shadow-md border border-white/20 flex items-center justify-between relative overflow-hidden group hover:shadow-lg transition-all duration-300">
            <div class="z-10">
                <p class="text-[9px] font-bold tracking-widest uppercase text-emerald-200/90">Total Instansi</p>
                {{-- REVISI AKURASI: Menggunakan $data->total() sebagai representasi jumlah baris instansi yang terdata aktif --}}
                <h3 class="text-2xl font-black mt-0.5 text-white tracking-tight leading-none">{{ $data->total() }}</h3>
                <p class="text-[10px] text-emerald-100/80 mt-1 font-medium flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-300 inline-block animate-pulse"></span>
                    Perusahaan / Lembaga
                </p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-white/15 backdrop-blur-md text-white border border-white/10 flex items-center justify-center text-xl shadow-inner group-hover:scale-105 transition duration-300">
                🏢
            </div>
            <div class="absolute -right-6 -bottom-6 w-20 h-24 bg-white/10 rounded-full blur-xl"></div>
        </div>

    </div>

    {{-- Search & Filter (REVISI: Mengubah padding p-5 menjadi p-3.5 serta py-3 input menjadi py-2 agar ramping sejajar) --}}
    <form method="GET" action="{{ route('laporan.tempatkerja') }}" class="bg-white/80 backdrop-blur-sm border border-emerald-900/10 rounded-2xl p-3.5 shadow-sm">
        <div class="flex flex-col md:flex-row gap-3 items-center">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari Nama Alumni / Pekerjaan / Instansi..."
                class="flex-1 w-full border border-emerald-900/20 bg-white rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#042E1F] transition">

            <button
                type="submit"
                class="w-full md:w-auto bg-[#042E1F] hover:bg-[#0b4d35] text-white px-8 py-2 rounded-xl text-sm font-semibold shadow-sm transition-all duration-200 active:scale-95 cursor-pointer whitespace-nowrap">
                🔍 Cari
            </button>
        </div>
    </form>

    {{-- Tabel Rekap --}}
    <div class="overflow-x-auto rounded-2xl border border-emerald-900/10 shadow-sm bg-white">
        <table class="w-full text-sm text-left border-collapse">
            <thead class="bg-[#042E1F] text-white">
                <tr>
                    <th class="w-16 p-4 text-center font-semibold">No</th>
                    <th class="p-4 font-semibold">Nama Alumni</th>
                    <th class="p-4 font-semibold">Pekerjaan / Posisi</th>
                    <th class="p-4 font-semibold">Instansi / Tempat Kerja</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-emerald-900/10">
                @forelse($data as $item)
                <tr class="hover:bg-emerald-50/50 transition">
                    {{-- REVISI NO URUT: Menggunakan rumus paginator agar penomoran tabel berlanjut otomatis ke nomor 6 di halaman 2 --}}
                    <td class="p-4 text-center font-medium text-gray-600">
                        {{ $data->firstItem() + $loop->index }}
                    </td>
                    <td class="p-4 font-semibold text-[#042E1F]">
                        {{ $item->nama }}
                    </td>
                    <td class="p-4 text-gray-700">
                        @if($item->pekerjaan)
                        <span class="bg-[#e6f1ea] text-[#042E1F] font-semibold text-xs px-3 py-1 rounded-full border border-emerald-900/10">
                            {{ $item->pekerjaan }}
                        </span>
                        @else
                        <span class="text-gray-400 font-light">-</span>
                        @endif
                    </td>
                    <td class="p-4 text-gray-700 font-medium">
                        {{ $item->instansi ?: '-' }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-12 text-emerald-800/60 font-light">
                        Belum ada data alumni yang bekerja terinput.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- PERBAIKAN MUTLAK: Memunculkan navigasi tombol angka halaman di bawah tabel --}}
    <div class="mt-4">
        {{ $data->links() }}
    </div>

</div>

@endsection
