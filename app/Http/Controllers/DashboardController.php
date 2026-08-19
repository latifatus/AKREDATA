<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Publikasi;
use App\Models\Dokumen;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahAlumni = Alumni::count();
        $jumlahPublikasi = Publikasi::count();
        $jumlahDokumen = Dokumen::count();
        $publikasiTerbaru = Publikasi::latest()->take(5)->get();
        $dokumenTerbaru = Dokumen::latest()->take(5)->get();

        $grafikAlumni = Alumni::select(
            'tahun_lulus',
            DB::raw('COUNT(*) as jumlah')
        )
            ->whereNotNull('tahun_lulus')
            ->groupBy('tahun_lulus')
            ->orderBy('tahun_lulus')
            ->get();

        $labelGrafik = $grafikAlumni->pluck('tahun_lulus');

        $dataGrafik = $grafikAlumni->pluck('jumlah');

        return view('dashboard', compact(
            'jumlahAlumni',
            'jumlahPublikasi',
            'jumlahDokumen',
            'publikasiTerbaru',
            'dokumenTerbaru',
            'labelGrafik',
            'dataGrafik'
        ));
    }
}
