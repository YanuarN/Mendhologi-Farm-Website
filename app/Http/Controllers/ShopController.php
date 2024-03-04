<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hewan;
use App\Models\Kategori;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hewans = Hewan::all();
        $kategoris = Kategori::all();
        return view('shop', compact('hewans', 'kategoris'));
    }

    public function showByCategory(Request $request, $idKategori)
    {
        $kategori = Kategori::findOrFail($idKategori);
        $hewans = Hewan::where('kategori_id', $idKategori)->get();
        $kategoris = Kategori::all(); // Ini mungkin tidak diperlukan jika Anda hanya ingin menampilkan kategori terkait
        return view('shop', compact('hewans', 'kategoris', 'kategori')); // Mengganti 'category' menjadi 'kategori'
    }
    

    public function show($idHewan)
    {
        $hewan = Hewan::findOrFail($idHewan);
        return view('detail', compact('hewan'));
    }
}
