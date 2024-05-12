<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Hewan;

class OrderController extends Controller
{

    public function create(Request $request)
    {
        $hewans = Hewan::findOrFail($request->query('idHewan'));
        return view('order', compact('hewans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat_kirim' => 'required',
            'no_whatsapp' => 'required',
            'nama_penerima' => 'required',
        ]);

        $idPengguna = auth()->user()->idPengguna;
        $idHewan = $request->idHewan;

        Pesanan::create([
            'alamat_kirim' => $request->alamat_kirim,
            'no_whatsapp' => $request->no_whatsapp,
            'nama_penerima' => $request->nama_penerima,
            'idHewan' => $idHewan,
            'idPengguna' => $idPengguna,
        ]);

        $jumlahHewanDiupdate = Hewan::where('idHewan', $idHewan)->where('isReady', true)->decrement('isReady');

        if ($jumlahHewanDiupdate > 0) {
            return redirect()->route('shop.index')->with('success', 'Pesanan berhasil dibuat dan status isReady telah diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal membuat pesanan. Barang tidak tersedia atau status isReady sudah tidak aktif.');
        }
    }
}
