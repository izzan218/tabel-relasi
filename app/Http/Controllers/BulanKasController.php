<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Siswa;
use App\Models\BulanKas;
use Illuminate\Http\Request;

class BulanKasController extends Controller
{
    /**
     * Tampilkan semua data BulanKas.
     */
    public function index()
    {
        $bulankas = BulanKas::all();
        return view('bulankas.index', compact('bulankas'));
    }

    /**
     * Form tambah BulanKas.
     */
    public function create()
    {
        return view('bulankas.create');
    }

    /**
     * Simpan data BulanKas baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required|string|max:50',
            'jumlah_target' => 'required|integer',
        ]);

        BulanKas::create([
            'bulan' => $request->bulan,
            'jumlah_target' => $request->jumlah_target
        ]);

        return redirect()->route('bulankas.index')->with('success', 'Data bulan kas berhasil ditambahkan.');
    }

    /**
     * Form edit BulanKas.
     */
    public function edit($id)
    {
        $bulankas = BulanKas::findOrFail($id);
        return view('bulankas.edit', compact('bulankas'));
    }

    /**
     * Update data BulanKas.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bulan' => 'required|string|max:50',
            'jumlah_target' => 'required|integer',
        ]);

        $bulankas = BulanKas::findOrFail($id);
        $bulankas->update([
            'bulan' => $request->bulan,
            'jumlah_target' => $request->jumlah_target
        ]);

        return redirect()->route('bulankas.index')->with('success', 'Data bulan kas berhasil diperbarui.');
    }

    /**
     * Hapus data BulanKas.
     */
    public function destroy($id)
    {
        $bulankas = BulanKas::findOrFail($id);
        $bulankas->delete();

        return redirect()->route('bulankas.index')->with('success', 'Data bulan kas berhasil dihapus.');
    }
}
