<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hewan;
use App\Models\Kategori;

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

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|max:2048', 
            'jenis' => 'required',
            'berat' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'kategori' => 'required'
        ]);
    
        $idAdmin = auth()->user()->idAdmin;
        $fotoPath = $request->file('foto')->store('public');
        $fileName = basename($fotoPath);
        Hewan::create([
            'foto' => $fileName,
            'jenis' => $request->jenis,
            'berat' => $request->berat,
            'harga' => $request->harga,
            'idAdmin' => $idAdmin,
            'idKategori' => $request->kategori
        ]);
    
        return redirect()->route('hewan.index')->with('success', 'Hewan berhasil ditambahkan.');
    }

    
    public function show($idHewan)
    {
        $hewan = Hewan::findOrFail($idHewan);
        return view('hewan.show', compact('hewan'));
    }

   
    public function edit($idHewan)
    {
        $hewan = Hewan::findOrFail($idHewan);
        $kategoris = Kategori::all();
        return view('dasboard.hewan.edit', compact('hewan', 'kategoris'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'required|image|max:2048',
            'jenis' => 'required',
            'berat' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'kategori' => 'required'
        ]);
        $fotoPath = $request->file('foto')->store('public');
        $fileName = basename($fotoPath);
        $hewan = Hewan::findOrFail($id);
        $hewan->update([
            'foto' => $fileName,
            'jenis' => $request->jenis,
            'berat' => $request->berat,
            'harga' => $request->harga,
            'idKategori' => $request->kategori
        ]);
    
        return redirect()->route('hewan.index')->with('success', 'Hewan berhasil diperbarui.');
    }
    

    
    public function destroy($id)
    {
        $hewan = Hewan::findOrFail($id);
        $hewan->delete();

        return redirect()->route('hewan.index')->with('success', 'Hewan berhasil dihapus.');
    }
}