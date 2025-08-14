<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KasController extends Controller
{
    /**
     * Menampilkan semua data kas.
     */
    public function index()
    {
        // Ambil semua kas beserta data siswa
        $kas = Kas::with('siswa')->get();
        return view('kas.index', compact('kas'));
    }

    /**
     * Menampilkan form tambah data kas.
     */
    public function create()
    {
        // Ambil semua siswa untuk pilihan dropdown
        $siswa = Siswa::all();
        return view('kas.create', compact('siswa'));
    }

    /**
     * Menyimpan data kas baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric',
            'keterangan' => 'nullable|string'
        ]);

        Kas::create($request->all());

        return redirect()->route('kas.index')->with('success', 'Data kas berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail kas (opsional).
     */
    public function show(string $id)
    {
        $kas = Kas::with('siswa')->findOrFail($id);
        return view('kas.show', compact('kas'));
    }

    /**
     * Menampilkan form edit kas.
     */
    public function edit(string $id)
    {
        $kas = Kas::findOrFail($id);
        $siswa = Siswa::all();
        return view('kas.edit', compact('kas', 'siswa'));
    }

    /**
     * Memperbarui data kas.
     */
    public function update(Request $request, string $id)
    {
        $kas = Kas::findOrFail($id);

        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric',
            'keterangan' => 'nullable|string'
        ]);

        $kas->update($request->all());

        return redirect()->route('kas.index')->with('success', 'Data kas berhasil diperbarui!');
    }

    /**
     * Menghapus data kas.
     */
    public function destroy(string $id)
    {
        Kas::destroy($id);
        return redirect()->route('kas.index')->with('success', 'Data kas berhasil dihapus!');
    }
}
