<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendapatan;

class PendapatanController extends Controller
{
    // Menampilkan semua data pendapatan
    public function index()
    {
        $pendapatans = Pendapatan::all();
        return view('dasboard.pendapatan.index', compact('pendapatans'));
    }

    // Menampilkan form untuk membuat pendapatan baru
    public function create()
    {
        return view('dasboard.pendapatan.create');
    }

    // Menyimpan pendapatan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'jenis_pendapatan' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required'
        ]);

        $idAdmin = auth()->user()->idAdmin;
        Pendapatan::create([
            'jenis_pendapatan' => $request->jenis_pendapatan,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'idAdmin' => $idAdmin,
        ]);

        return redirect()->route('pendapatan.index')->with('success', 'Pendapatan berhasil ditambahkan.');
    }

    // Menampilkan detail pendapatan
    public function show($id)
    {
        $pendapatan = Pendapatan::findOrFail($id);
        return view('pendapatan.show', compact('pendapatan'));
    }

    // Menampilkan form untuk mengedit pendapatan
    public function edit($idPendapatan)
    {
        $pendapatan = Pendapatan::findOrFail($idPendapatan);
        return view('dasboard.pendapatan.edit', compact('pendapatan'));
    }

    // Memperbarui pendapatan di database
    public function update(Request $request, $idPendapatan)
    {
        $request->validate([
            'jenis_pendapatan' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required',
        ]);

        $pendapatan = Pendapatan::findOrFail($idPendapatan);
        $pendapatan->update($request->all());

        return redirect()->route('pendapatan.index')->with('success', 'Pendapatan berhasil diperbarui.');
    }

    // Menghapus pendapatan dari database
    public function destroy($idPendapatan)
    {
        $pendapatan = Pendapatan::findOrFail($idPendapatan);
        $pendapatan->delete();

        return redirect()->route('pendapatan.index')->with('success', 'Pendapatan berhasil dihapus.');
    }
}
