<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori');
    }

    public function store(Request $request)
    {
        // Validasi data input jika diperlukan
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        // Simpan data kategori ke database
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect('/kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input jika diperlukan
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        // Update data kategori ke database
        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
