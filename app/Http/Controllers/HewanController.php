<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hewan;
use App\Models\Kategori;
use App\Models\Admin;

class HewanController extends Controller
{
    // Menampilkan semua data hewan
    public function index()
    {
        $hewans = Hewan::all();
        return view('dasboard.hewan.index', compact('hewans'));
    }

    // Menampilkan form untuk membuat hewan baru
    public function create()
    {
        return view('dasboard.hewan.create', [
            'kategoris' => Kategori::all()
        ]);
    }

    // Menyimpan hewan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required',
            'jenis' => 'required',
            'berat' => 'required',
            'harga' => 'required',
        ]);

        $idAdmin = auth() -> user()->id;
    
        Hewan::create($request->all());

        return redirect()->route('dasboard.hewan.index')->with('success', 'Hewan berhasil ditambahkan.');
    }

    // Menampilkan detail hewan
    public function show($id)
    {
        $hewan = Hewan::findOrFail($id);
        return view('hewan.show', compact('hewan'));
    }

    // Menampilkan form untuk mengedit hewan
    public function edit($id)
    {
        $hewan = Hewan::findOrFail($id);
        return view('dasboard.hewan.edit', compact('hewan'));
    }

    // Memperbarui hewan di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'required',
            'jenis' => 'required',
            'berat' => 'required',
            'harga' => 'required',
        ]);

        $hewan = Hewan::findOrFail($id);
        $hewan->update($request->all());

        return redirect()->route('dasboard.hewan.index')->with('success', 'Hewan berhasil diperbarui.');
    }

    // Menghapus hewan dari database
    public function destroy($id)
    {
        $hewan = Hewan::findOrFail($id);
        $hewan->delete();

        return redirect()->route('dasboard.hewan.index')->with('success', 'Hewan berhasil dihapus.');
    }
}
