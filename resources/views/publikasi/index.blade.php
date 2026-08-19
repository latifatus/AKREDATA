@extends('layouts.dashboard')

@section('title','Publikasi Dosen')

@section('content')


<div class="bg-gradient-to-b from-[#d3f3e1] to-[#caf0d9] rounded-3xl shadow-md pt-4 pb-5 px-6 -mt-8">

    <div class="flex justify-between items-center mb-4">

        <div>
            <h1 class="text-2xl font-extrabold text-[#042E1F] tracking-tight">
                Publikasi Dosen
            </h1>


            <p class="text-emerald-800/70 text-xs mt-0.5 font-light">
                Kelola data publikasi kolaborasi dosen Program Studi.
            </p>
        </div>

        <a href="{{ route('publikasi.create') }}"
            class="bg-[#042E1F] hover:bg-[#0b4d35] text-white px-4 py-2 rounded-xl text-xs font-semibold shadow-md transition-all duration-200 active:scale-95 flex items-center gap-1.5">
            <span>+</span> Tambah Data
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
        action="{{ route('publikasi.index') }}"
        class="bg-white/80 backdrop-blur-sm border border-emerald-900/10 rounded-2xl p-5 mb-6 shadow-sm">

        <div class="flex flex-wrap items-end gap-4">

            <div class="flex-1 min-w-[320px]">

                <label class="block text-sm font-medium text-[#042E1F] mb-2">
                    Cari Dosen / Judul / Universitas
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Masukkan nama dosen, judul atau universitas..."
                    class="w-full border border-emerald-900/20 bg-white rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:border-transparent focus:outline-none transition">

            </div>

            <div class="w-52">

                <label class="block text-sm font-medium text-[#042E1F] mb-2">
                    Tahun Kolaborasi
                </label>

                <select
                    name="tahun_kolaborasi"
                    class="w-full border border-emerald-900/20 bg-white rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#042E1F] focus:border-transparent transition">

                    <option value="">Semua Tahun</option>

                    @for($i=date('Y');$i>=2000;$i--)
                    <option value="{{ $i }}"
                        {{ request('tahun_kolaborasi')==$i ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                    @endfor

                </select>

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
                    <th class="p-4 font-semibold">Nama Dosen TI</th>
                    <th class="p-4 font-semibold">Dosen Kolaborasi</th>
                    <th class="p-4 font-semibold">Program Studi</th>
                    <th class="p-4 font-semibold">Universitas</th>
                    <th class="p-4 font-semibold">Judul</th>
                    <th class="p-4 font-semibold text-center">Tahun</th>
                    <th class="p-4 font-semibold text-center">Link</th>
                    <th class="p-4 font-semibold text-center w-36">Aksi</th>

                </tr>

            </thead>

            <tbody class="divide-y divide-emerald-900/10">

                @forelse($publikasi as $item)

                <tr class="hover:bg-emerald-50/50 transition">

                    <td class="p-4 text-center font-medium text-gray-600">
                        {{ $publikasi->firstItem() + $loop->index }}
                    </td>

                    <td class="p-4 font-semibold text-[#042E1F] w-48">
                        @php
                        $nama = explode(' ', $item->nama_dosen_ti);
                        echo count($nama) > 2
                        ? implode(' ', array_slice($nama, 0, 3)) . '...'
                        : $item->nama_dosen_ti;
                        @endphp
                    </td>

                    <td class="p-4 text-gray-700 w-48">
                        @if($item->dosen_kolaborasi)
                        @php
                        $nama = explode(' ', $item->dosen_kolaborasi);
                        echo count($nama) > 2
                        ? implode(' ', array_slice($nama, 0, 3)) . '...'
                        : $item->dosen_kolaborasi;
                        @endphp
                        @else
                        -
                        @endif
                    </td>

                    <td class="p-4 text-gray-600">
                        @if($item->prodi_kolaborasi)
                        @php
                        $nama = explode(' ', $item->prodi_kolaborasi);
                        echo count($nama) > 2
                        ? implode(' ', array_slice($nama, 0, 3)) . '...'
                        : $item->prodi_kolaborasi;
                        @endphp
                        @else
                        -
                        @endif
                    </td>

                    <td class="p-4 text-gray-600">
                        @if($item->universitas)
                        @php
                        $nama = explode(' ', $item->universitas);
                        echo count($nama) > 2
                        ? implode(' ', array_slice($nama, 0, 2)) . '...'
                        : $item->universitas;
                        @endphp
                        @else
                        -
                        @endif
                    </td>

                    <td class="p-4 w-60">
                        <span title="{{ $item->judul }}" class="font-medium text-gray-800">
                            @php
                            $judul = explode(' ', $item->judul);
                            echo count($judul) > 2
                            ? implode(' ', array_slice($judul, 0, 3)) . '...'
                            : $item->judul;
                            @endphp
                        </span>
                    </td>

                    <td class="p-4 text-center">
                        <span class="bg-[#e6f1ea] text-[#042E1F] font-semibold text-xs px-3 py-1 rounded-full">
                            {{ $item->tahun_kolaborasi }}
                        </span>
                    </td>

                    <td class="p-4 text-center">

                        @if($item->link_publikasi)

                        <a href="{{ $item->link_publikasi }}"
                            target="_blank"
                            class="inline-flex items-center gap-1 bg-emerald-600 hover:bg-emerald-700 text-white text-xs px-3 py-1.5 rounded-lg transition shadow-sm font-medium">

                            🔗 Buka

                        </a>

                        @else

                        <span class="text-gray-400 font-light">
                            -
                        </span>

                        @endif

                    </td>

                    <td class="p-4">

                        <div class="flex gap-1.5 justify-center">

                            <a href="{{ route('publikasi.show',$item->id) }}"
                                class="bg-emerald-600 hover:bg-emerald-700 text-white p-2 rounded-lg transition shadow-sm" title="Detail">
                                👁
                            </a>

                            <a href="{{ route('publikasi.edit',$item->id) }}"
                                class="bg-amber-500 hover:bg-amber-600 text-white p-2 rounded-lg transition shadow-sm" title="Edit">
                                ✏
                            </a>

                            <form action="{{ route('publikasi.destroy',$item->id) }}"
                                method="POST" class="inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="button"
                                    data-url="{{ route('publikasi.destroy',$item->id) }}"
                                    data-name="{{ $item->judul }}"
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
                    <td colspan="9"
                        class="text-center py-12 text-emerald-800/60 font-light">
                        Belum ada data publikasi terinput.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $publikasi->links() }}
    </div>

</div>

<x-delete-modal />

@endsection