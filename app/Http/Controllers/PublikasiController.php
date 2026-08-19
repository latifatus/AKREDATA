<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;
use App\Imports\PublikasiImport;
use App\Exports\PublikasiExport;
use Maatwebsite\Excel\Facades\Excel;

class PublikasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Publikasi::query();

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('nama_dosen_ti', 'like', "%{$search}%")
                    ->orWhere('dosen_kolaborasi', 'like', "%{$search}%")
                    ->orWhere('universitas', 'like', "%{$search}%")
                    ->orWhere('judul', 'like', "%{$search}%");
            });
        }

        // Filter Tahun
        if ($request->filled('tahun_kolaborasi')) {

            $query->where(
                'tahun_kolaborasi',
                $request->tahun_kolaborasi
            );
        }

        // PERBAIKAN: Mengubah pagination dari 10 menjadi 5 data agar pas satu layar penuh tanpa scroll
        $publikasi = $query
            ->latest()
            ->paginate(5);

        // Supaya search & filter tidak hilang saat pindah halaman
        $publikasi->appends($request->all());

        return view(
            'publikasi.index',
            compact('publikasi')
        );
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(
            new PublikasiImport,
            $request->file('file')
        );

        return redirect()
            ->route('publikasi.index')
            ->with(
                'success',
                'Data publikasi berhasil diimport.'
            );
    }

    public function export()
    {
        return Excel::download(
            new PublikasiExport,
            'data_publikasi.xlsx'
        );
    }

    public function create()
    {
        return view('publikasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dosen_ti' => 'required',
            'judul' => 'required',
            'tahun_kolaborasi' => 'required',
        ]);

        Publikasi::create($request->all());

        return redirect()
            ->route('publikasi.index')
            ->with(
                'success',
                'Data publikasi berhasil ditambahkan.'
            );
    }

    public function show(Publikasi $publikasi)
    {
        return view(
            'publikasi.show',
            compact('publikasi')
        );
    }

    public function edit(Publikasi $publikasi)
    {
        return view(
            'publikasi.edit',
            compact('publikasi')
        );
    }

    public function update(
        Request $request,
        Publikasi $publikasi
    ) {
        $request->validate([
            'nama_dosen_ti' => 'required',
            'judul' => 'required',
            'tahun_kolaborasi' => 'required',
        ]);

        $publikasi->update($request->all());

        return redirect()
            ->route('publikasi.index')
            ->with(
                'success',
                'Data publikasi berhasil diubah.'
            );
    }

    public function destroy(Publikasi $publikasi)
    {
        $publikasi->delete();

        return redirect()
            ->route('publikasi.index')
            ->with(
                'success',
                'Data publikasi berhasil dihapus.'
            );
    }
}
