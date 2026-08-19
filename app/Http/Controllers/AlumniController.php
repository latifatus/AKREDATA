<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index(Request $request)
    {
        $query = Alumni::query();
        

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('nim', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('tahun_lulus')) {
            $query->where('tahun_lulus', $request->tahun_lulus);
        }
        $query->orderBy('tahun_lulus', 'desc');
        
        // PERBAIKAN: Mengubah pagination dari 10 menjadi 5 data agar pas satu layar penuh tanpa scroll
        $alumni = $query->paginate(5);

        $alumni->appends($request->all());

        return view('alumni.index', compact('alumni'));
    }

    public function create()
    {
        return view('alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|max:100',
            'nim' => 'required',
            'tahun_lulus' => 'required|digits:4|integer|min:1900|max:' . date('Y'),

            'sumber_rekognisi' => 'nullable',
            'jenis_pengakuan' => 'nullable',
            'link_bukti' => 'nullable|url',
            'tahun_bekerja' => 'nullable|digits:4|integer|min:2000|max:' . date('Y'),

        ], [
            'nama.required' => 'Nama alumni wajib diisi.',
            'nama.min' => 'Nama minimal 3 karakter.',
            'nim.required' => 'NIM wajib diisi.',
            'tahun_lulus.required' => 'Tahun lulus wajib di isi.',
            'link_bukti.nullable' => 'Isi Link dengan benar',
        ]);

        Alumni::create($request->all());

        return redirect()
            ->route('alumni.index')
            ->with('success', 'Data alumni berhasil ditambahkan.');
    }

    public function show(Alumni $alumni)
    {

        return view('alumni.show', compact('alumni'));
    }

    public function edit(Alumni $alumni)
    {
        return view('alumni.edit', compact('alumni'));
    }

    public function update(Request $request, Alumni $alumni)
    {
        $request->validate([
            'nama' => 'required|min:3|max:100',
            'nim' => 'required',
            'tahun_lulus' => 'required|digits:4|integer|min:1900|max:' . date('Y'),

            'sumber_rekognisi' => 'nullable',
            'jenis_pengakuan' => 'nullable',
            'link_bukti' => 'nullable|url',
            'tahun_bekerja' => 'nullable|digits:4|integer|min:2000|max:' . date('Y'),

        ], [
            'nama.required' => 'Nama alumni wajib diisi.',
            'nama.min' => 'Nama minimal 3 karakter.',
            'nim.required' => 'NIM wajib diisi.',
            'tahun_lulus.required' => 'Tahun lulus wajib di isi.',
            'link_bukti.nullable' => 'Isi Link dengan benar',
        ]);

        $alumni->update($request->all());

        return redirect()
            ->route('alumni.index')
            ->with('success', 'Data alumni berhasil diubah.');
    }

    public function destroy(Alumni $alumni)
    {
        $alumni->delete();

        return redirect()
            ->route('alumni.index')
            ->with('success', 'Data alumni berhasil dihapus.');
    }
}
