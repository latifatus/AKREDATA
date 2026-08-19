@extends('layouts.dashboard')

@section('title', 'Tambah Data Alumni')

@section('content')

<div class="bg-gradient-to-b from-[#d3f3e1] to-[#caf0d9] rounded-3xl shadow-md p-8">

    {{-- Header --}}
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-extrabold text-[#042E1F] tracking-tight">
                Tambah Data Alumni
            </h1>

            <p class="text-emerald-800/70 text-sm mt-1 font-light">
                Silakan lengkapi data alumni di bawah ini.
            </p>
        </div>

        <a href="{{ route('alumni.index') }}"
            class="bg-emerald-100/80 hover:bg-white text-[#042E1F] border border-emerald-900/10 px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm transition-all duration-200">
            ← Kembali
        </a>
    </div>

    {{-- Error Alert --}}
    @if ($errors->any())
    <div class="mb-6 rounded-2xl border border-rose-300 bg-rose-50/90 p-5 shadow-sm">
        <h3 class="font-bold text-rose-800 text-sm mb-2 flex items-center gap-2">
            <span>⚠️</span> Terjadi kesalahan pengisian form:
        </h3>

        <ul class="list-disc list-inside text-xs text-rose-700 space-y-1 font-light">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Form Container --}}
    <div class="bg-white rounded-2xl shadow-sm border border-emerald-900/10 overflow-hidden">

        <!-- Banner Header Form -->
        <div class="bg-gradient-to-r from-[#042E1F] to-[#0c4430] px-8 py-4 text-white">
            <h2 class="text-sm font-bold tracking-tight">📝 Formulir Data Alumni</h2>
            <p class="text-xs text-green-300/80 font-light mt-0.5">Isi seluruh kolom yang ditandai dengan wajib diisi.</p>
        </div>

        <form
            action="{{ route('alumni.store') }}"
            method="POST"
            class="p-8">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama Alumni --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Nama Alumni <span class="text-rose-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama') }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition"
                        placeholder="Masukkan nama alumni">

                    <p class="text-[11px] text-emerald-800/60 mt-1 font-light">
                        * Wajib diisi sesuai ijazah
                    </p>
                </div>

                {{-- NIM --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        NIM <span class="text-rose-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="nim"
                        value="{{ old('nim') }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition font-mono"
                        placeholder="Masukkan NIM">

                    <p class="text-[11px] text-emerald-800/60 mt-1 font-light">
                        * Wajib diisi dengan Nomor Induk Mahasiswa
                    </p>
                </div>

                {{-- Program Studi --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Program Studi <span class="text-rose-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="prodi"
                        value="{{ old('prodi', 'Teknik Informatika') }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition"
                        placeholder="Masukkan program studi">

                    <p class="text-[11px] text-emerald-800/60 mt-1 font-light">
                        * Wajib diisi
                    </p>
                </div>

                {{-- Tahun Lulus --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Tahun Lulus <span class="text-rose-500">*</span>
                    </label>

                    <input
                        type="number"
                        name="tahun_lulus"
                        min="1900"
                        max="{{ date('Y') }}"
                        value="{{ old('tahun_lulus') }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition"
                        placeholder="Contoh: 2025">

                    <p class="text-[11px] text-emerald-800/60 mt-1 font-light">
                        * Wajib isi, rentang tahun (1999 - {{ date('Y') }})
                    </p>
                </div>

                {{-- TS --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        TS
                    </label>

                    <input
                        type="text"
                        name="ts"
                        value="{{ old('ts') }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition"
                        placeholder="Contoh: TS-2">
                </div>

                {{-- Pekerjaan --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Pekerjaan
                    </label>

                    <input
                        type="text"
                        name="pekerjaan"
                        value="{{ old('pekerjaan') }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition"
                        placeholder="Masukkan pekerjaan saat ini">
                </div>

                {{-- Instansi --}}
                <div class="md:col-span-2">
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Instansi / Tempat Kerja
                    </label>

                    <input
                        type="text"
                        name="instansi"
                        value="{{ old('instansi') }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition"
                        placeholder="Masukkan instansi tempat bekerja">
                </div>

                {{-- Sumber Rekognisi --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Sumber Rekognisi
                    </label>

                    <input
                        type="text"
                        name="sumber_rekognisi"
                        value="{{ old('sumber_rekognisi') }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition"
                        placeholder="Cth: Masyarakat / Dunia Kerja / Pemerintahan">
                </div>

                {{-- Jenis Pengakuan --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Jenis Pengakuan / Rekognisi
                    </label>

                    <input
                        type="text"
                        name="jenis_pengakuan"
                        value="{{ old('jenis_pengakuan') }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition"
                        placeholder="Cth: Sertifikat Profesi / Penghargaan">
                </div>

                {{-- Link Bukti --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Link Bukti (Google Drive)
                    </label>

                    <input
                        type="url"
                        name="link_bukti"
                        value="{{ old('link_bukti') }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition"
                        placeholder="Masukkan URL tautan dokumen bukti">
                </div>

                {{-- Tahun Bekerja --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Tahun Mulai Bekerja
                    </label>

                    <input
                        type="number"
                        name="tahun_bekerja"
                        min="1900"
                        max="{{ date('Y') }}"
                        value="{{ old('tahun_bekerja') }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition"
                        placeholder="Contoh: 2025">

                    <p class="text-[11px] text-emerald-800/60 mt-1 font-light">
                        Tahun bekerja dianjurkan di atas tahun lulus
                    </p>
                </div>

            </div>

            {{-- Action Buttons --}}
            <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-emerald-900/10">

                <a
                    href="{{ route('alumni.index') }}"
                    class="px-6 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition text-sm font-semibold">
                    Batal
                </a>

                <button
                    type="submit"
                    class="bg-[#042E1F] hover:bg-[#0b4d35] text-white px-8 py-2.5 rounded-xl font-semibold text-sm shadow-md transition-all duration-200 active:scale-95 cursor-pointer">
                    Simpan Data
                </button>

            </div>

        </form>

    </div>

</div>

@endsection