@extends('layouts.dashboard')

@section('title', 'Detail Dokumen')

@section('content')
<div class="bg-gradient-to-b from-[#d3f3e1] to-[#caf0d9] rounded-3xl shadow-md p-8 space-y-6">

    {{-- Header --}}
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-extrabold text-[#042E1F] tracking-tight">Detail Dokumen</h1>
            <p class="text-emerald-800/70 text-sm mt-1 font-light">Informasi lengkap dokumen yang tersimpan dalam sistem AKREDATA.</p>
        </div>
        <a href="{{ route('dokumen.index') }}" class="bg-white/80 hover:bg-white text-[#042E1F] border border-emerald-900/10 px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm transition">← Kembali</a>
    </div>

    {{-- Card Container --}}
    <div class="bg-white rounded-2xl shadow-sm border border-emerald-900/10 overflow-hidden">
        <div class="bg-gradient-to-r from-[#042E1F] to-[#0c4430] px-8 py-4 text-white flex justify-between items-center">
            <div>
                <h2 class="text-sm font-bold tracking-tight">📁 Berkas Dokumen Akreditasi</h2>
                <p class="text-xs text-green-300/80 font-light mt-0.5">{{ $dokuman->nama_dokumen }}</p>
            </div>
            <span class="bg-white/10 text-green-200 text-xs px-3 py-1 rounded-full border border-white/10 backdrop-blur-sm uppercase font-mono">{{ $dokuman->kategori ?: 'UMUM' }}</span>
        </div>

        <div class="p-8">
            @php $ext = strtolower(pathinfo($dokuman->file, PATHINFO_EXTENSION)); @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">Nama Dokumen</label>
                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm font-semibold text-[#042E1F]">{{ $dokuman->nama_dokumen }}</div>
                </div>

                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">Format Asli Berkas</label>
                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm font-medium text-gray-800 flex items-center gap-2">
                        <span>📄</span>
                        <span class="uppercase font-mono font-bold">{{ $ext }} Document</span>
                    </div>
                </div>

                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">Kategori</label>
                    <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-emerald-50/30 text-sm text-gray-800">{{ $dokuman->kategori ?: '-' }}</div>
                </div>

                <div>
                    <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">Unduh Berkas Mentah</label>
                    <!-- PERBAIKAN: Dialirkan lewat rute secure streaming dengan parameter download=true agar dipaksa force-download langsung dari server PHP -->
                    <a href="{{ route('dokumen.file', $dokuman->id) }}?download=true" class="inline-flex w-full items-center justify-center gap-2 bg-[#4CAF50] hover:bg-[#43a047] text-white px-4 py-3 rounded-xl text-sm font-semibold shadow-sm transition">
                        📥 Download Berkas Asli (.{{ strtoupper($ext) }})
                    </a>
                </div>
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-xs font-semibold uppercase tracking-wider text-[#042E1F]">Keterangan Tambahan</label>
                <div class="w-full border border-emerald-900/15 rounded-xl px-4 py-3 bg-gray-50 text-sm text-gray-600 font-light">{{ $dokuman->keterangan ?: 'Tidak ada keterangan tambahan.' }}</div>
            </div>

            {{-- PANEL PREVIEW BERBASIS EMBEDDED IFRAME LAYAR SEJAJAR --}}
            <div class="border-t border-gray-100 pt-6">
                <label class="block mb-3 text-xs font-bold uppercase tracking-widest text-[#042E1F]">👁️ Pratinjau Dokumen Terpadu (PDF Render Server-Side LibreOffice)</label>
                <div class="w-full overflow-hidden bg-gray-50 rounded-xl border border-gray-200 h-[600px]">
                    @if(in_array($ext, ['png', 'jpg', 'jpeg', 'gif', 'svg']))
                        <div class="flex justify-center items-center h-full p-4 bg-gray-100">
                            <img src="{{ route('dokumen.file', $dokuman->id) }}" class="max-w-full max-h-[550px] rounded-lg shadow-sm">
                        </div>
                    @else
                        <!-- Memanggil Rute Streaming Penampil file_pdf Converter LibreOffice secara inline -->
                        <iframe src="{{ route('dokumen.file', $dokuman->id) }}" class="w-full h-full border-none"></iframe>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
