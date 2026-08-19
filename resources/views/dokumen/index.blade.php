@extends('layouts.dashboard')

@section('title','Dokumen')

@section('content')

<div class="bg-gradient-to-b from-[#d3f3e1] to-[#caf0d9] rounded-3xl shadow-md p-8">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-extrabold text-[#042E1F] tracking-tight">
                Data Dokumen
            </h1>
            <p class="text-emerald-800/70 text-sm mt-1 font-light">
                Kelola seluruh dokumen pendukung akreditasi Program Studi.
            </p>
        </div>

        <a href="{{ route('dokumen.create') }}"
            class="bg-[#042E1F] hover:bg-[#0b4d35] text-white px-6 py-3 rounded-xl font-semibold shadow-md transition-all duration-200 active:scale-95 flex items-center gap-2">
            <span>+</span> Tambah Dokumen
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
    <div class="bg-emerald-100 border border-emerald-300 text-emerald-800 px-5 py-4 rounded-xl mb-6 flex items-center gap-2">
        <span>✅</span>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    {{-- Search & Filter --}}
    <form method="GET"
        action="{{ route('dokumen.index') }}"
        class="bg-white/80 backdrop-blur-sm border border-emerald-900/10 rounded-2xl p-5 mb-6 shadow-sm">

        <div class="flex flex-wrap items-end gap-4">
            <div class="flex-1 min-w-[320px]">
                <label class="block text-sm font-medium text-[#042E1F] mb-2">
                    Cari Dokumen
                </label>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama dokumen atau kategori..."
                    class="w-full border border-emerald-900/20 bg-white rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:border-transparent focus:outline-none transition">
            </div>

            <button
                type="submit"
                class="bg-[#042E1F] hover:bg-[#0b4d35] text-white px-8 py-2.5 rounded-xl font-semibold shadow-sm transition-all duration-200 active:scale-95 cursor-pointer">
                Filter
            </button>
        </div>

    </form>

    {{-- Table --}}
    <div class="overflow-x-auto rounded-2xl border border-emerald-900/10 shadow-sm bg-white">

        <table class="w-full text-sm text-left border-collapse">
            <thead class="bg-[#042E1F] text-white">
                <tr>
                    <th class="p-4 font-semibold text-center w-12">No</th>
                    <th class="p-4 font-semibold">Nama Dokumen</th>
                    <th class="p-4 font-semibold">Jenis File</th>
                    <th class="p-4 font-semibold">Kategori</th>
                    <th class="p-4 font-semibold text-center">File</th>
                    <th class="p-4 font-semibold text-center w-36">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-emerald-900/10">
                @forelse($dokumen as $item)
                <tr class="hover:bg-emerald-50/50 transition">
                    <td class="p-4 text-center font-medium text-gray-600">
                        {{ $dokumen->firstItem() + $loop->index }}
                    </td>

                    <td class="p-4 font-semibold text-[#042E1F]">
                        {{ $item->nama_dokumen }}
                    </td>

                    <td class="p-4 text-gray-600">
                        <span class="uppercase text-[11px] font-mono bg-gray-100 px-2 py-1 rounded border border-gray-200">
                            {{ $item->jenis_file }}
                        </span>
                    </td>

                    <td class="p-4 text-gray-600">
                        @if($item->kategori)
                        <span class="bg-[#e6f1ea] text-[#042E1F] font-semibold text-xs px-3 py-1 rounded-full">
                            {{ $item->kategori }}
                        </span>
                        @else
                        <span class="text-gray-400 font-light">-</span>
                        @endif
                    </td>

                    <td class="p-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <!-- Tombol Lihat: Menuju Ke Rute Langsung Preview-Direct Full Screen Base64 -->
                            <a
                                href="{{ route('dokumen.preview.direct', $item->id) }}"
                                target="_blank"
                                class="inline-flex items-center gap-1 bg-[#4CAF50] hover:bg-[#43a047] text-white text-xs px-3 py-1.5 rounded-lg transition shadow-sm font-medium whitespace-nowrap">
                                Lihat
                            </a>

                            <!-- PERBAIKAN TOMBOL UNDUH: Mengarahkan rute streaming untuk memaksa unduhan file asli dari backend -->
                            <a
                                href="{{ route('dokumen.file', $item->id) }}?download=true"
                                class="inline-flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1.5 rounded-lg transition shadow-sm font-medium whitespace-nowrap">
                                Unduh
                            </a>
                        </div>
                    </td>

                    <td class="p-4">
                        <div class="flex justify-center gap-1.5">
                            <a href="{{ route('dokumen.show', $item->id) }}"
                                class="bg-emerald-600 hover:bg-emerald-700 text-white p-2 rounded-lg transition shadow-sm" title="Detail">
                                👁
                            </a>

                            <a href="{{ route('dokumen.edit', $item->id) }}"
                                class="bg-amber-500 hover:bg-amber-600 text-white p-2 rounded-lg transition shadow-sm" title="Edit">
                                ✏
                            </a>

                            <form action="{{ route('dokumen.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="button"
                                    data-url="{{ route('dokumen.destroy', $item->id) }}"
                                    data-name="{{ $item->nama_dokumen }}"
                                    onclick="openDeleteModal(this)"
                                    class="bg-rose-500 hover:bg-rose-600 text-white p-2 rounded-lg transition shadow-sm cursor-pointer" title="Hapus">
                                    🗑
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-12 text-emerald-800/60 font-light">
                        Belum ada dokumen terinput.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $dokumen->links() }}
    </div>

</div>

<x-delete-modal />

@endsection
