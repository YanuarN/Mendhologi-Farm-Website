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
    public function index(Request $request)
    {
        $sortBy = $request->sort_by;
        $query = Hewan::query();

        switch ($sortBy) {
            case 'Kambing': // Sort by kambing (ID kategori 1)
                $query->orderBy('idKategori')->where('idKategori', 1);
                break;
            case 'Sapi': // Sort by sapi (ID kategori 6)
                $query->orderBy('idKategori')->where('idKategori', 6);
                break;
            case 'Domba': // Sort by domba (ID kategori 7)
                $query->orderBy('idKategori')->where('idKategori', 7);
                break;
            default:
                $query->orderBy('idKategori');
        }
        $hewans = $query->get();
        $kategoris = Kategori::all();

        return view('shop', compact('hewans', 'kategoris'));
    }
    
    public function show($idHewan)
    {
        $hewan = Hewan::findOrFail($idHewan);
        return view('detail', compact('hewan'));
    }
}
