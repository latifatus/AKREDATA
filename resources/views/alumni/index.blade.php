@extends('layouts.dashboard')

@section('title','Data Alumni')

@section('content')

{{-- REVISI: Menggunakan pt-4 pb-5 px-6 agar pembungkus gradasi hijau atasnya semakin mengecil dan hemat ruang --}}
<div class="bg-gradient-to-b from-[#d3f3e1] to-[#caf0d9] rounded-3xl shadow-md pt-4 pb-5 px-6 -mt-8">

    {{-- Header (REVISI: Mengubah mb-6/mb-5 menjadi mb-4 agar jarak ke kotak pencarian di bawahnya lebih dekat) --}}
    <div class="flex justify-between items-center mb-4">

        <div>
            {{-- REVISI: Mengubah teks judul dari text3xl menjadi text-2xl agar lebih kecil dan ramping --}}
            <h1 class="text-2xl font-extrabold text-[#042E1F] tracking-tight">
                Data Alumni
            </h1>

            {{-- REVISI: Mengubah text-sm menjadi text-xs agar deskripsi sub-judul ikut mengecil ideal --}}
            <p class="text-emerald-800/70 text-xs mt-0.5 font-light">
                Kelola data alumni Program Studi Teknik Informatika.
            </p>
        </div>

        {{-- REVISI: Mengubah px-5 py-2.5 menjadi px-4 py-2 dan text-sm menjadi text-xs agar ukuran tombol "+ Tambah Data" mengecil pas --}}
        <a href="{{ route('alumni.create') }}"
            class="bg-[#042E1F] hover:bg-[#0b4d35] text-white px-4 py-2 rounded-xl text-xs font-semibold shadow-md transition-all duration-200 active:scale-95 flex items-center gap-1.5">
            <span>+</span> Tambah Data
        </a>

    </div>

    {{-- Search & Filter --}}
    <form method="GET"
        action="{{ route('alumni.index') }}"
        class="bg-white/80 backdrop-blur-sm border border-emerald-900/10 rounded-2xl p-4 mb-5 shadow-sm">

        <div class="flex flex-wrap items-end gap-4">

            {{-- Search --}}
            <div class="flex-1 min-w-[280px]">

                <label class="block text-xs font-semibold uppercase tracking-wider text-[#042E1F] mb-1.5">
                    Cari Nama / NIM
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Masukkan nama atau NIM..."
                    class="w-full border border-emerald-900/20 bg-white rounded-xl px-4 py-2 text-sm focus:ring-2 focus:ring-[#042E1F] focus:border-transparent focus:outline-none transition">

            </div>

            {{-- Tahun --}}
            <div class="w-48">

                <label class="block text-xs font-semibold uppercase tracking-wider text-[#042E1F] mb-1.5">
                    Tahun Lulus
                </label>

                <select
                    name="tahun_lulus"
                    class="w-full border border-emerald-900/20 bg-white rounded-xl px-4 py-2 text-sm focus:ring-2 focus:ring-[#042E1F] focus:border-transparent transition">

                    <option value="">Semua Tahun</option>

                    @for($i=date('Y');$i>=2000;$i--)
                    <option value="{{ $i }}"
                        {{ request('tahun_lulus')==$i ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                    @endfor

                </select>

            </div>

            {{-- Filter --}}
            <button
                type="submit"
                class="bg-[#042E1F] hover:bg-[#0b4d35] text-white px-8 py-2 rounded-xl font-semibold shadow-sm transition-all duration-200 active:scale-95 cursor-pointer text-sm">

                Filter

            </button>

        </div>

    </form>

    {{-- Alert --}}
    @if(session('success'))
    <div class="bg-emerald-100 border border-emerald-300 text-emerald-800 px-5 py-4 rounded-xl mb-5 flex items-center gap-2">
        <span>✅</span>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    {{-- Table --}}
    <div class="overflow-x-auto rounded-2xl border border-emerald-900/10 shadow-sm bg-white">

        <table class="w-full text-sm text-left">

            <thead class="bg-[#042E1F] text-white">

                <tr>

                    <th class="p-4 font-semibold text-center w-16">No</th>

                    <th class="p-4 font-semibold">NIM</th>

                    <th class="p-4 font-semibold">Nama</th>

                    <th class="p-4 font-semibold">Tahun Lulus</th>

                    <th class="p-4 font-semibold text-center w-36">Aksi</th>

                </tr>

            </thead>

            <tbody class="divide-y divide-emerald-900/10">

                @forelse($alumni as $item)

                <tr class="hover:bg-emerald-50/50 transition">

                    <td class="p-4 text-center font-medium text-gray-600">
                        {{ $alumni->firstItem() + $loop->index }}
                    </td>

                    <td class="p-4 font-mono text-gray-700">
                        {{ $item->nim }}
                    </td>

                    <td class="p-4 font-semibold text-[#042E1F]">
                        {{ $item->nama }}
                    </td>

                    <td class="p-4 text-gray-600">
                        <span class="bg-[#e6f1ea] text-[#042E1F] font-semibold text-xs px-3 py-1 rounded-full">
                            {{ $item->tahun_lulus }}
                        </span>
                    </td>

                    <td class="p-4">

                        <div class="flex justify-center gap-2">

                            <a href="{{ route('alumni.show',$item->id) }}"
                                class="bg-emerald-600 hover:bg-emerald-700 text-white p-2 rounded-lg transition shadow-sm" title="Detail">
                                👁
                            </a>

                            <a href="{{ route('alumni.edit',$item->id) }}"
                                class="bg-amber-500 hover:bg-amber-600 text-white p-2 rounded-lg transition shadow-sm" title="Edit">
                                ✏
                            </a>

                            <button
                                type="button"
                                data-url="{{ route('alumni.destroy',$item->id) }}"
                                data-name="{{ $item->nama }}"
                                onclick="openDeleteModal(this)"
                                class="bg-rose-500 hover:bg-rose-600 text-white p-2 rounded-lg transition shadow-sm cursor-pointer" title="Hapus">

                                🗑

                            </button>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="text-center py-12 text-emerald-800/60 font-light">

                        Belum ada data alumni terinput.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Pagination --}}
    <div class="mt-5">
        {{ $alumni->links() }}
    </div>

</div>

<x-delete-modal />

@endsection
