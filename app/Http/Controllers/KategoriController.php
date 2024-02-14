<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('dasboard.kategori.index', compact('kategoris'));
    }
    

    public function create()
    {
        return view('dasboard.kategori.create');
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

        return redirect('kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show($idKategori)
    {
        $kategori = Kategori::findOrFail($idKategori);
        return view('kategori.show', compact('kategori'));
    }
    
    public function edit($idKategori)
    {
        $kategori = Kategori::findOrFail($idKategori);
        return view('dasboard.kategori.edit', compact('kategori'));
    }
    
    public function update(Request $request, $idKategori)
    {
        // Validasi data input jika diperlukan
        $request->validate([
            'nama_kategori' => 'required',
        ]);
    
        // Update data kategori ke database
        $kategori = Kategori::findOrFail($idKategori);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
    
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }
    
    public function destroy($idKategori)
    {
        $kategori = Kategori::findOrFail($idKategori);
        $kategori->delete();
    
        return redirect()->route('dasboard.kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}