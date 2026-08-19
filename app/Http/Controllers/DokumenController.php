<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\HttpFoundation\Response;

class DokumenController extends Controller
{
    public function index(Request $request)
    {
        $query = Dokumen::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_dokumen', 'like', '%' . $request->search . '%')
                  ->orWhere('kategori', 'like', '%' . $request->search . '%');
            });
        }

        $dokumen = $query->latest()->paginate(10);
        $dokumen->appends($request->all());

        return view('dokumen.index', compact('dokumen'));
    }

    public function create()
    {
        return view('dokumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokumen' => 'required',
            'file' => 'required|file',
        ]);

        $path = $request->file('file')->store('dokumen', 'public');

        // Menyimpan data asli ke kolom 'file' dan menyetel 'file_pdf' ke null sebelum diconvert
        Dokumen::create([
            'nama_dokumen' => $request->nama_dokumen,
            'kategori'     => $request->kategori,
            'keterangan'   => $request->keterangan,
            'file'          => $path,
            'file_pdf'      => null, 
        ]);

        // Otomatis memicu jalannya Laravel Command LibreOffice setelah data tersimpan
        try {
            Artisan::call('convert:documents');
        } catch (\Exception $e) {
            // Fail-safe handler
        }

        return redirect()
            ->route('dokumen.index')
            ->with('success', 'Dokumen berhasil ditambahkan.');
    }

    // =========================================================================
    // METHOD DETAIL INFORMATION (SHOW)
    // =========================================================================
    public function show(Dokumen $dokuman)
    {
        return view('dokumen.show', compact('dokuman'));
    }

    // =========================================================================
    // METHOD PREVIEW DIRECT: UNTUK TOMBOL LIHAT HIJAU (FULL SCREEN)
    // =========================================================================
    public function previewDirect(Dokumen $dokuman)
    {
        return view('dokumen.preview-full', compact('dokuman'));
    }

    // =========================================================================
    // METHOD VIEW FILE: SEBAGAI SUMBER STREAMING UTAMA IFRAME / IMG TAG
    // =========================================================================
    public function viewFile(Dokumen $dokuman)
    {
        // 🌟 PERBAIKAN UTAMA: Ambil ekstensi asli berkas agar nama file unduhan tetap memiliki ekstensi yang benar (.docx/.xlsx)
        $originalExt = strtolower(pathinfo($dokuman->file, PATHINFO_EXTENSION));
        // Bersihkan nama dokumen dari karakter yang dilarang oleh sistem operasi sebagai nama file
        $cleanFileName = str_replace(['/', '\\', ':', '*', '?', '"', '<', '>', '|'], '-', $dokuman->nama_dokumen) . '.' . $originalExt;

        // Jika mendeteksi query ?download=true dari tombol unduh index/show, paksa download berkas asli
        if (request()->has('download') && request()->query('download') === 'true') {
            if (!Storage::disk('public')->exists($dokuman->file)) {
                abort(404, 'Berkas fisik asli tidak ditemukan.');
            }
            // 🌟 PERBAIKAN NAMA FILE: Parameter kedua disisipkan $cleanFileName agar saat diunduh namanya berubah sesuai inputan form Anda
            return Storage::disk('public')->download($dokuman->file, $cleanFileName);
        }

        // Jalur Preview Standar: Jika file_pdf tersedia gunakan file_pdf. Jika tidak ada gunakan file asli.
        $targetFile = $dokuman->file_pdf && Storage::disk('public')->exists($dokuman->file_pdf) 
            ? $dokuman->file_pdf 
            : $dokuman->file;

        if (!Storage::disk('public')->exists($targetFile)) {
            abort(404, 'Berkas fisik dokumen tidak ditemukan.');
        }

        $path = Storage::disk('public')->path($targetFile);
        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        $fileBytes = File::get($path);
        $mimeType = File::mimeType($path);

        // Standardisasi Content-Type Response Inline Browser agar tidak ke-download otomatis saat preview
        if ($ext === 'pdf') {
            $mimeType = 'application/pdf';
        } elseif (in_array($ext, ['png', 'jpg', 'jpeg', 'gif', 'svg'])) {
            $mimeType = 'image/' . ($ext === 'jpg' ? 'jpeg' : $ext);
        }

        return response($fileBytes, 200)->withHeaders([
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . $cleanFileName . '"',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }

    public function edit(Dokumen $dokuman)
    {
        return view('dokumen.edit', compact('dokuman'));
    }

    public function update(Request $request, Dokumen $dokuman)
    {
        $request->validate([
            'nama_dokumen' => 'required',
        ]);

        $data = [
            'nama_dokumen' => $request->nama_dokumen,
            'kategori'     => $request->kategori,
            'keterangan'   => $request->keterangan,
        ];

        if ($request->hasFile('file')) {
            // Hapus fisik berkas asli lama jika ada
            if (Storage::disk('public')->exists($dokuman->file)) {
                Storage::disk('public')->delete($dokuman->file);
            }
            // Hapus fisik berkas PDF konversi lama jika ada
            if ($dokuman->file_pdf && Storage::disk('public')->exists($dokuman->file_pdf)) {
                Storage::disk('public')->delete($dokuman->file_pdf);
            }

            $data['file'] = $request->file('file')->store('dokumen', 'public');
            $data['file_pdf'] = null; // Set null kembali saat update file baru
        }

        $dokuman->update($data);

        // Jika melakukan update berkas, picu kembali otomatis command LibreOffice
        if ($request->hasFile('file')) {
            try {
                Artisan::call('convert:documents');
            } catch (\Exception $e) {
                // Fail-safe
            }
        }

        return redirect()
            ->route('dokumen.index')
            ->with('success', 'Dokumen berhasil diubah.');
    }

    public function destroy(Dokumen $dokuman)
    {
        // Hapus fisik file asli
        if (Storage::disk('public')->exists($dokuman->file)) {
            Storage::disk('public')->delete($dokuman->file);
        }

        // Hapus fisik file PDF hasil convert
        if ($dokuman->file_pdf && Storage::disk('public')->exists($dokuman->file_pdf)) {
            Storage::disk('public')->delete($dokuman->file_pdf);
        }

        $dokuman->delete();

        return redirect()
            ->route('dokumen.index')
            ->with('success', 'Dokumen berhasil dihapus.');
    }
}
