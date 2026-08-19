@extends('layouts.dashboard')

@section('title', 'Edit Publikasi Dosen')

@section('content')

<div class="bg-gradient-to-b from-[#d3f3e1] to-[#caf0d9] rounded-3xl shadow-md p-8">

    {{-- Header --}}
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-extrabold text-[#042E1F] tracking-tight">
                Edit Publikasi Dosen
            </h1>

            <p class="text-emerald-800/70 text-sm mt-1 font-light">
                Perbarui data publikasi kolaborasi dosen di bawah ini.
            </p>
        </div>

        <a href="{{ route('publikasi.index') }}"
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
            <h2 class="text-sm font-bold tracking-tight">✏️ Form Edit Data Publikasi</h2>
            <p class="text-xs text-green-300/80 font-light mt-0.5">Pastikan perubahan data publikasi sudah benar sebelum menyimpan.</p>
        </div>

        <form
            action="{{ route('publikasi.update', $publikasi->id) }}"
            method="POST"
            class="p-8">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama Dosen TI --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Nama Dosen TI <span class="text-rose-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama_dosen_ti"
                        value="{{ old('nama_dosen_ti', $publikasi->nama_dosen_ti) }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition">
                </div>

                {{-- Dosen Kolaborasi --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Dosen Kolaborasi
                    </label>

                    <input
                        type="text"
                        name="dosen_kolaborasi"
                        value="{{ old('dosen_kolaborasi', $publikasi->dosen_kolaborasi) }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition">
                </div>

                {{-- Program Studi --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Program Studi Kolaborasi
                    </label>

                    <input
                        type="text"
                        name="prodi_kolaborasi"
                        value="{{ old('prodi_kolaborasi', $publikasi->prodi_kolaborasi) }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition">
                </div>

                {{-- Universitas --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Universitas
                    </label>

                    <input
                        type="text"
                        name="universitas"
                        value="{{ old('universitas', $publikasi->universitas) }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition">
                </div>

                {{-- Judul Publikasi --}}
                <div class="md:col-span-2">
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Judul Publikasi <span class="text-rose-500">*</span>
                    </label>

                    <textarea
                        name="judul"
                        rows="3"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition resize-none">{{ old('judul', $publikasi->judul) }}</textarea>
                </div>

                {{-- Tahun Kolaborasi --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Tahun Kolaborasi <span class="text-rose-500">*</span>
                    </label>

                    <input
                        type="number"
                        name="tahun_kolaborasi"
                        value="{{ old('tahun_kolaborasi', $publikasi->tahun_kolaborasi) }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition">
                </div>

                {{-- Link Publikasi --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Link Publikasi (URL)
                    </label>

                    <input
                        type="url"
                        name="link_publikasi"
                        value="{{ old('link_publikasi', $publikasi->link_publikasi) }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition">
                </div>

            </div>

            {{-- Action Buttons --}}
            <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-emerald-900/10">

                <a
                    href="{{ route('publikasi.index') }}"
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