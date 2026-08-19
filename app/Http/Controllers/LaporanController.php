<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // =========================================================================
    // 1. LAPORAN REKAP TEMPAT KERJA (REVISI: MENGUNCI 5 DATA PER HALAMAN)
    // =========================================================================
    public function rekapTempatKerja(Request $request)
    {
        $query = Alumni::query();

        // Hanya tampilkan alumni yang sudah mengisi instansi tempat kerja
        $query->whereNotNull('instansi')
            ->where('instansi', '!=', '');

        // Fitur Pencarian Dinamis (Berdasarkan Nama, Pekerjaan, atau Instansi)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('pekerjaan', 'like', "%{$search}%")
                  ->orWhere('instansi', 'like', "%{$search}%");
            });
        }

        // Kunci paginasi maksimal 5 data per halaman agar pas di monitor
        $data = $query->orderBy('instansi')
            ->orderBy('nama')
            ->paginate(5)
            ->appends($request->all());

        return view('laporan.rekap_tempat_kerja', compact('data'));
    }

    // =========================================================================
    // 2. LAPORAN REKAP SUMBER PENGAKUAN (REVISI: DIKUNCI JADI 5 DATA PER HALAMAN)
    // =========================================================================
    public function rekapSumberPengakuan(Request $request)
    {
        $query = Alumni::query();

        // Hanya tampilkan alumni yang memiliki data rekognisi
        $query->whereNotNull('jenis_pengakuan')
            ->where('jenis_pengakuan', '!=', '');

        // Search Nama / Instansi
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('instansi', 'like', '%' . $request->search . '%');
            });
        }

        // Filter Tahun Bekerja
        if ($request->filled('tahun')) {
            $query->where('tahun_bekerja', $request->tahun);
        }

        // PERBAIKAN: Mengubah pagination dari 10 menjadi 5 data per halaman
        $alumni = $query->orderBy('tahun_bekerja', 'desc')
            ->paginate(5)
            ->appends($request->all());

        return view('laporan.rekap_sumber_pengakuan', compact('alumni'));
    }

    // =========================================================================
    // 3. LAPORAN ALUMNI PROFESI DOSEN (REVISI: DIKUNCI JADI 5 DATA PER HALAMAN)
    // =========================================================================
    public function alumniProfesiDosen(Request $request)
    {
        $query = Alumni::query();

        // Hanya tampilkan alumni yang pekerjaannya Dosen
        $query->where('pekerjaan', 'LIKE', '%Dosen%');

        // Search nama
        if ($request->filled('search')) {
            $query->where('nama', 'LIKE', '%' . $request->search . '%');
        }

        // Filter tahun lulus
        if ($request->filled('tahun_lulus')) {
            $query->where('tahun_lulus', $request->tahun_lulus);
        }

        // PERBAIKAN: Mengubah pagination dari 10 menjadi 5 data per halaman
        $alumni = $query->orderBy('tahun_lulus')
            ->paginate(5)
            ->withQueryString();

        $tahun = Alumni::select('tahun_lulus')
            ->distinct()
            ->orderBy('tahun_lulus')
            ->pluck('tahun_lulus');

        return view('laporan.alumni_profesi_dosen', compact(
            'alumni',
            'tahun'
        ));
    }
}
