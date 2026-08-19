@extends('layouts.dashboard')

@section('title', 'Edit Data Alumni')

@section('content')

<div class="bg-gradient-to-b from-[#d3f3e1] to-[#caf0d9] rounded-3xl shadow-md p-8">

    {{-- Header --}}
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-extrabold text-[#042E1F] tracking-tight">
                Edit Data Alumni
            </h1>

            <p class="text-emerald-800/70 text-sm mt-1 font-light">
                Perbarui data alumni Program Studi di bawah ini.
            </p>
        </div>

        <a href="{{ route('alumni.index') }}"
            class="bg-white/80 hover:bg-white text-[#042E1F] border border-emerald-900/10 px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm transition-all duration-200">
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
            <h2 class="text-sm font-bold tracking-tight">✏️ Form Edit Data Alumni</h2>
            <p class="text-xs text-green-300/80 font-light mt-0.5">Pastikan perubahan data sudah benar sebelum menyimpan.</p>
        </div>

        <form
            action="{{ route('alumni.update', $alumni->id) }}"
            method="POST"
            class="p-8">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama Alumni --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Nama Alumni <span class="text-rose-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama', $alumni->nama) }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition"
                        placeholder="Masukkan nama alumni">
                </div>

                {{-- NIM --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        NIM <span class="text-rose-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="nim"
                        value="{{ old('nim', $alumni->nim) }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition font-mono"
                        placeholder="Masukkan NIM">
                </div>

                {{-- Program Studi --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Program Studi <span class="text-rose-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="prodi"
                        value="{{ old('prodi', $alumni->prodi) }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition"
                        placeholder="Masukkan program studi">
                </div>

                {{-- Tahun Lulus --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Tahun Lulus <span class="text-rose-500">*</span>
                    </label>

                    <input
                        type="number"
                        name="tahun_lulus"
                        value="{{ old('tahun_lulus', $alumni->tahun_lulus) }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition"
                        placeholder="Contoh: 2025">
                </div>

                {{-- TS --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        TS
                    </label>

                    <input
                        type="text"
                        name="ts"
                        value="{{ old('ts', $alumni->ts) }}"
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
                        value="{{ old('pekerjaan', $alumni->pekerjaan) }}"
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
                        value="{{ old('instansi', $alumni->instansi) }}"
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
                        value="{{ old('sumber_rekognisi', $alumni->sumber_rekognisi) }}"
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
                        value="{{ old('jenis_pengakuan', $alumni->jenis_pengakuan) }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition"
                        placeholder="Cth: Sertifikat Profesi / Penghargaan">
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
                        max="{{ date('Y') + 10 }}"
                        value="{{ old('tahun_bekerja', $alumni->tahun_bekerja) }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition"
                        placeholder="Contoh: 2025">
                </div>

                {{-- Link Bukti --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Link Bukti (Google Drive)
                    </label>

                    <input
                        type="url"
                        name="link_bukti"
                        value="{{ old('link_bukti', $alumni->link_bukti) }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition"
                        placeholder="Masukkan URL tautan dokumen bukti">
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
                    Update Data
                </button>

            </div>

        </form>

    </div>

</div>

@endsection