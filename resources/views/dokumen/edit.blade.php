@extends('layouts.dashboard')

@section('title', 'Edit Dokumen')

@section('content')

<div class="bg-gradient-to-b from-[#d3f3e1] to-[#caf0d9] rounded-3xl shadow-md p-8">

    {{-- Header --}}
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-extrabold text-[#042E1F] tracking-tight">
                Edit Dokumen
            </h1>

            <p class="text-emerald-800/70 text-sm mt-1 font-light">
                Perbarui informasi dan berkas dokumen pendukung akreditasi.
            </p>
        </div>

        <a href="{{ route('dokumen.index') }}"
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
            <h2 class="text-sm font-bold tracking-tight">✏️ Form Edit Dokumen</h2>
            <p class="text-xs text-green-300/80 font-light mt-0.5">Pastikan data dan file perbaikan sudah sesuai sebelum diperbarui.</p>
        </div>

        {{-- Form --}}
        <form action="{{ route('dokumen.update', $dokuman->id) }}"
            method="POST"
            enctype="multipart/form-data"
            class="p-8">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Nama Dokumen --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Nama Dokumen <span class="text-rose-500">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama_dokumen"
                        value="{{ old('nama_dokumen', $dokuman->nama_dokumen) }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition">
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Kategori Dokumen
                    </label>

                    <input
                        type="text"
                        name="kategori"
                        value="{{ old('kategori', $dokuman->kategori) }}"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition">
                </div>

                {{-- File Saat Ini --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        File Lampiran Saat Ini
                    </label>

                    @if($dokuman->file)

                    <a href="{{ route('dokumen.file', $dokuman->id) }}"
                        target="_blank"
                        class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2.5 rounded-xl text-xs font-semibold transition shadow-sm">
                        <span>📄</span> Lihat File Terlampir
                    </a>

                    @else

                    <div class="border border-emerald-900/15 rounded-xl px-4 py-2.5 bg-emerald-50/30 text-xs text-gray-400 font-light">
                        Belum ada file yang diunggah.
                    </div>

                    @endif
                </div>

                {{-- Upload File --}}
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Ganti File (Opsional)
                    </label>

                    <input
                        type="file"
                        name="file"
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-3 py-1.5 text-xs text-gray-700 file:mr-4 file:px-4 file:py-1.5 file:border-0 file:bg-emerald-100 file:text-emerald-800 file:rounded-lg hover:file:bg-emerald-200 file:font-semibold file:cursor-pointer transition">
                </div>

                {{-- Keterangan --}}
                <div class="md:col-span-2">
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">
                        Keterangan / Catatan Tambahan
                    </label>

                    <textarea
                        name="keterangan"
                        rows="4"
                        placeholder="Tambahkan keterangan rincian dokumen jika ada..."
                        class="w-full border border-emerald-900/20 bg-emerald-50/20 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:bg-white focus:outline-none transition resize-none">{{ old('keterangan', $dokuman->keterangan) }}</textarea>
                </div>

            </div>

            {{-- Action Buttons --}}
            <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-emerald-900/10">

                <a href="{{ route('dokumen.index') }}"
                    class="px-6 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition text-sm font-semibold">
                    Batal
                </a>

                <button
                    type="submit"
                    class="bg-[#042E1F] hover:bg-[#0b4d35] text-white px-8 py-2.5 rounded-xl font-semibold text-sm shadow-md transition-all duration-200 active:scale-95 cursor-pointer">
                    Update Dokumen
                </button>

            </div>

        </form>

    </div>

</div>

@endsection