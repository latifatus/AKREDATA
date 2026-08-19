@extends('layouts.dashboard')

@section('title', 'Detail Data Alumni')

@section('content')

<div class="bg-gradient-to-b from-[#d3f3e1] to-[#caf0d9] rounded-3xl shadow-md p-8">

    {{-- Header --}}
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-extrabold text-[#042E1F] tracking-tight">
                Detail Alumni
            </h1>

            <p class="text-emerald-800/70 text-sm mt-1 font-light">
                Informasi lengkap rekam data alumni Program Studi.
            </p>
        </div>

        <a href="{{ route('alumni.index') }}"
            class="bg-white/80 hover:bg-white text-[#042E1F] border border-emerald-900/10 px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm transition-all duration-200">
            ← Kembali
        </a>
    </div>

    {{-- Card Container --}}
    <div class="bg-white rounded-2xl shadow-sm border border-emerald-900/10 overflow-hidden">

        <!-- Banner Header Detail -->
        <div class="bg-gradient-to-r from-[#042E1F] to-[#0c4430] px-8 py-4 text-white flex justify-between items-center">
            <div>
                <h2 class="text-sm font-bold tracking-tight">🎓 Informational Profile</h2>
                <p class="text-xs text-green-300/80 font-light mt-0.5">Detail data terdaftar atas nama {{ $alumni->nama }}</p>
            </div>
            <span class="bg-white/10 text-green-200 text-xs px-3 py-1 rounded-full border border-white/10 backdrop-blur-sm">
                NIM: {{ $alumni->nim }}
            </span>
        </div>

        <div class="p-8">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama Alumni --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Nama Alumni
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm font-semibold text-[#042E1F]">
                        {{ $alumni->nama }}
                    </div>
                </div>

                {{-- NIM --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        NIM
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm font-mono text-gray-700">
                        {{ $alumni->nim }}
                    </div>
                </div>

                {{-- Program Studi --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Program Studi
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm text-gray-800">
                        {{ $alumni->prodi }}
                    </div>
                </div>

                {{-- Tahun Lulus --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Tahun Lulus
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm font-medium text-gray-800">
                        {{ $alumni->tahun_lulus }}
                    </div>
                </div>

                {{-- TS --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        TS (Tahun Sidang / Tracing)
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm text-gray-800">
                        {{ $alumni->ts ?: '-' }}
                    </div>
                </div>

                {{-- Pekerjaan --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Pekerjaan
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm text-gray-800">
                        {{ $alumni->pekerjaan ?: '-' }}
                    </div>
                </div>

                {{-- Instansi --}}
                <div class="md:col-span-2">
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Instansi / Tempat Kerja
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm text-gray-800">
                        {{ $alumni->instansi ?: '-' }}
                    </div>
                </div>

                {{-- Sumber Rekognisi --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Sumber Rekognisi
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm text-gray-800">
                        {{ $alumni->sumber_rekognisi ?: '-' }}
                    </div>
                </div>

                {{-- Jenis Pengakuan --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Jenis Pengakuan
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm text-gray-800">
                        {{ $alumni->jenis_pengakuan ?: '-' }}
                    </div>
                </div>

                {{-- Tahun Bekerja --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Tahun Mulai Bekerja
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm text-gray-800">
                        {{ $alumni->tahun_bekerja ?: '-' }}
                    </div>
                </div>

                {{-- Link Bukti --}}
                <div class="md:col-span-2">
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Link Bukti Dokumen
                    </label>

                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm">
                        @if($alumni->link_bukti)
                        <a href="{{ $alumni->link_bukti }}"
                            target="_blank"
                            class="text-[#042E1F] hover:text-[#0b4d35] font-semibold underline flex items-center gap-1">
                            <span>🔗 Buka Tautan Bukti (Google Drive)</span>
                        </a>
                        @else
                        <span class="text-gray-400 font-light">- Tidak ada tautan terlampir -</span>
                        @endif
                    </div>
                </div>

            </div>

            {{-- Action Buttons --}}
            <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-emerald-900/10">

                <a href="{{ route('alumni.index') }}"
                    class="px-6 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition text-sm font-semibold">
                    Kembali
                </a>

                <a href="{{ route('alumni.edit', $alumni->id) }}"
                    class="bg-amber-500 hover:bg-amber-600 text-white px-8 py-2.5 rounded-xl font-semibold text-sm shadow-md transition-all duration-200 active:scale-95 flex items-center gap-2">
                    <span>✏️</span> Edit Data
                </a>

            </div>

        </div>

    </div>

</div>

@endsection