@extends('layouts.dashboard')

@section('title', 'Detail Publikasi Dosen')

@section('content')

<div class="bg-gradient-to-b from-[#d3f3e1] to-[#caf0d9] rounded-3xl shadow-md p-8">

    {{-- Header --}}
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-extrabold text-[#042E1F] tracking-tight">
                Detail Publikasi
            </h1>

            <p class="text-emerald-800/70 text-sm mt-1 font-light">
                Informasi lengkap data publikasi kolaborasi dosen Program Studi.
            </p>
        </div>

        <a href="{{ route('publikasi.index') }}"
            class="bg-white/80 hover:bg-white text-[#042E1F] border border-emerald-900/10 px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm transition-all duration-200">
            ← Kembali
        </a>
    </div>

    {{-- Card Container --}}
    <div class="bg-white rounded-2xl shadow-sm border border-emerald-900/10 overflow-hidden">

        <!-- Banner Header Detail -->
        <div class="bg-gradient-to-r from-[#042E1F] to-[#0c4430] px-8 py-4 text-white flex justify-between items-center">
            <div>
                <h2 class="text-sm font-bold tracking-tight">📚 Detail Karya Ilmiah / Publikasi</h2>
                <p class="text-xs text-green-300/80 font-light mt-0.5">Dosen Pengampu: {{ $publikasi->nama_dosen_ti }}</p>
            </div>
            <span class="bg-white/10 text-green-200 text-xs px-3 py-1 rounded-full border border-white/10 backdrop-blur-sm">
                Tahun {{ $publikasi->tahun_kolaborasi }}
            </span>
        </div>

        <div class="p-8">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama Dosen TI --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Nama Dosen TI
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm font-semibold text-[#042E1F]">
                        {{ $publikasi->nama_dosen_ti }}
                    </div>
                </div>

                {{-- Dosen Kolaborasi --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Dosen Kolaborasi
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm text-gray-800">
                        {{ $publikasi->dosen_kolaborasi ?: '-' }}
                    </div>
                </div>

                {{-- Program Studi --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Program Studi Kolaborasi
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm text-gray-800">
                        {{ $publikasi->prodi_kolaborasi ?: '-' }}
                    </div>
                </div>

                {{-- Universitas --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Universitas
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm text-gray-800">
                        {{ $publikasi->universitas ?: '-' }}
                    </div>
                </div>

                {{-- Tahun --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Tahun Kolaborasi
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm font-medium text-gray-800">
                        {{ $publikasi->tahun_kolaborasi }}
                    </div>
                </div>

                {{-- Link --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Tautan Publikasi (URL)
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm">
                        @if($publikasi->link_publikasi)
                        <a href="{{ $publikasi->link_publikasi }}"
                            target="_blank"
                            class="text-[#042E1F] hover:text-[#0b4d35] font-semibold underline flex items-center gap-1">
                            <span>🔗 Buka Tautan Publikasi</span>
                        </a>
                        @else
                        <span class="text-gray-400 font-light">- Tidak ada tautan terlampir -</span>
                        @endif
                    </div>
                </div>

                {{-- Judul --}}
                <div class="md:col-span-2">
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Judul Publikasi
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm font-medium text-gray-800 leading-relaxed">
                        {{ $publikasi->judul }}
                    </div>
                </div>

            </div>

            {{-- Action Buttons --}}
            <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-emerald-900/10">

                <a href="{{ route('publikasi.index') }}"
                    class="px-6 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition text-sm font-semibold">
                    Kembali
                </a>

                <a href="{{ route('publikasi.edit', $publikasi->id) }}"
                    class="bg-amber-500 hover:bg-amber-600 text-white px-8 py-2.5 rounded-xl font-semibold text-sm shadow-md transition-all duration-200 active:scale-95 flex items-center gap-2">
                    <span>✏️</span> Edit Data
                </a>

            </div>

        </div>

    </div>

</div>

@endsection