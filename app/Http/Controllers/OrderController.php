<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Hewan;

class OrderController extends Controller
{

    public function create(Request $request)
    {
        // Tampilkan form untuk membuat pesanan baru
        $hewans = Hewan::findOrFail($request->query('idHewan'));
        return view('order', compact('hewans'));
    }

    public function store(Request $request)
    {

        // Validasi input dari request
        $request->validate([
            'alamat_kirim' => 'required',
            'no_whatsapp' => 'required',
            'nama_penerima' => 'required',
        ]);

        $idPengguna = auth()->user()->idPengguna;
        $idHewan = $request->idHewan;

        // Buat pesanan baru dengan idHewan yang tercatat
        Pesanan::create([
            'alamat_kirim' => $request->alamat_kirim,
            'no_whatsapp' => $request->no_whatsapp,
            'nama_penerima' => $request->nama_penerima,
            'idHewan' => $idHewan,
            'idPengguna' => $idPengguna,
        ]);

        // Redirect pengguna ke halaman yang sesuai
        return redirect()->route('shop')->with('success', 'Pesanan berhasil dibuat');
    }
}
