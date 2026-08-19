@extends('layouts.dashboard')

@section('title', 'Rekap Sumber Pengakuan')

@section('content')

{{-- REVISI: Mengubah p-8 menjadi pt-4 pb-5 px-6 serta ditambahkan -mt-8 dan space-y-4 agar box luar mengecil, ramping, dan naik ke atas --}}
<div class="bg-gradient-to-b from-[#d3f3e1] to-[#caf0d9] rounded-3xl shadow-md pt-4 pb-5 px-6 -mt-8 space-y-4">

    {{-- Header Page (REVISI: Mengecilkan teks judul ke text-2xl dan deskripsi ke text-xs agar hemat ruang) --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-2">
        <div>
            <h1 class="text-2xl font-extrabold text-[#042E1F] tracking-tight">
                Rekap Sumber Pengakuan / Rekognisi
            </h1>
            <p class="text-emerald-800/70 text-xs mt-0.5 font-light">
                Laporan data pengakuan dan sumber rekognisi alumni Program Studi.
            </p>
        </div>
    </div>

    {{-- Search & Filter (REVISI: Mengecilkan padding menjadi p-3.5, serta merampingkan tinggi komponen menjadi py-2) --}}
    <form method="GET"
        class="bg-white/80 backdrop-blur-sm border border-emerald-900/10 rounded-2xl p-3.5 shadow-sm">

        <div class="flex flex-col md:flex-row gap-3 items-center">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari Nama / Instansi..."
                class="flex-1 w-full border border-emerald-900/20 bg-white rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#042E1F] transition">

            {{-- REVISI UTAMA: Ditambahkan min-w-[160px] dan pr-8 agar dropdown tahun memiliki batas lebar ideal dan tulisan tidak tertimpa/terpotong --}}
            <select
                name="tahun"
                class="w-full md:w-auto min-w-[160px] border border-emerald-900/20 bg-white rounded-xl px-4 pr-8 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#042E1F] transition cursor-pointer">

                <option value="">Semua Tahun</option>

                @for($i = date('Y'); $i >= 2000; $i--)
                <option value="{{ $i }}"
                    {{ request('tahun') == $i ? 'selected' : '' }}>
                    {{ $i }}
                </option>
                @endfor

            </select>

            <button
                type="submit"
                class="w-full md:w-auto bg-[#042E1F] hover:bg-[#0b4d35] text-white px-8 py-2 rounded-xl text-sm font-semibold shadow-sm transition-all duration-200 active:scale-95 cursor-pointer whitespace-nowrap">
                Filter
            </button>

        </div>

    </form>

    {{-- Tabel Rekap --}}
    <div class="overflow-x-auto rounded-2xl border border-emerald-900/10 shadow-sm bg-white">

        <table class="w-full text-sm text-left border-collapse">

            <thead class="bg-[#042E1F] text-white">

                <tr>

                    <th class="p-4 text-center w-12 font-semibold">
                        No
                    </th>

                    <th class="p-4 font-semibold">
                        Nama
                    </th>

                    <th class="p-4 font-semibold">
                        Jenis Pengakuan / Rekognisi
                    </th>

                    <th class="p-4 font-semibold">
                        Instansi
                    </th>

                    <th class="p-4 font-semibold">
                        Sumber Rekognisi
                    </th>

                    <th class="p-4 text-center font-semibold">
                        Tahun
                    </th>

                    <th class="p-4 text-center font-semibold">
                        TS
                    </th>

                    <th class="p-4 text-center font-semibold">
                        Bukti
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-emerald-900/10">

                @forelse($alumni as $item)

                <tr class="hover:bg-emerald-50/50 transition">

                    <td class="p-4 text-center font-medium text-gray-600">
                        {{ $alumni->firstItem() + $loop->index }}
                    </td>

                    <td class="p-4 font-semibold text-[#042E1F]">
                        {{ $item->nama }}
                    </td>

                    <td class="p-4 text-gray-700">
                        @if($item->jenis_pengakuan)
                        @php
                        $nama = explode(' ', $item->jenis_pengakuan);
                        $jenis_pengakuan = count($nama) > 4
                        ? implode(' ', array_slice($nama, 0, 4)) . '...'
                        : $item->jenis_pengakuan;
                        @endphp

                        <span title="{{ $item->jenis_pengakuan }}" class="font-medium">
                            {{ $jenis_pengakuan }}
                        </span>
                        @else
                        <span class="text-gray-400 font-light">-</span>
                        @endif
                    </td>

                    <td class="p-4 text-gray-700">
                        @if($item->instansi)
                        @php
                        $nama = explode(' ', $item->instansi);
                        $instansi = count($nama) > 3
                        ? implode(' ', array_slice($nama, 0, 3)) . '...'
                        : $item->instansi;
                        @endphp

                        <span title="{{ $item->instansi }}">
                            {{ $instansi }}
                        </span>
                        @else
                        <span class="text-gray-400 font-light">-</span>
                        @endif
                    </td>

                    <td class="p-4 text-gray-700">
                        {{ $item->sumber_rekognisi ?? '-' }}
                    </td>

                    <td class="p-4 text-center">
                        @if($item->tahun_bekerja)
                        <span class="bg-[#e6f1ea] text-[#042E1F] font-semibold text-xs px-2.5 py-1 rounded-full">
                            {{ $item->tahun_bekerja }}
                        </span>
                        @else
                        <span class="text-gray-400 font-light">-</span>
                        @endif
                    </td>

                    <td class="p-4 text-center font-mono text-xs font-semibold text-emerald-900">
                        {{ $item->ts ?? '-' }}
                    </td>

                    <td class="p-4 text-center">

                        @if($item->link_bukti)

                        <a href="{{ $item->link_bukti }}"
                            target="_blank"
                            class="inline-flex items-center gap-1 bg-emerald-600 hover:bg-emerald-700 text-white text-xs px-3 py-1.5 rounded-lg transition shadow-sm font-medium">
                            🔗 Lihat
                        </a>

                        @else

                        <span class="text-gray-400 font-light">
                            -
                        </span>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8"
                        class="text-center py-12 text-emerald-800/60 font-light">

                        Belum ada data rekognisi terinput.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Pagination (REVISI: Mengubah mt-6 menjadi mt-4 agar rapat dan seimbang) --}}
    <div class="mt-4">

        {{ $alumni->links() }}

    </div>

</div>

@endsection
