<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesanan;
use App\Models\Hewan;
use App\Models\Pendapatan;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::select('pesanans.*', 'hewans.jenis', 'pesanans.nama_penerima', 'pesanans.no_whatsapp')
                           ->leftJoin('hewans', 'pesanans.idHewan', '=', 'hewans.idHewan')
                           ->get();
                           
        $pesanan = Pesanan::has('hewan')->get();

        return view('dasboard.pesanan.index', compact('pesanan'));
    }

    public function selesai(string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $hewan = Hewan::findOrFail($pesanan->idHewan);
    


        $pesanan->delete();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diselesaikan');
    }

    public function destroy(string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $hewan = Hewan::findOrFail($pesanan->idHewan);
    
        // Mengambil idAdmin dari pengguna yang sedang terautentikasi
        $idAdmin = Auth::id();
    
        // Menyimpan data pendapatan
        $pendapatan = new Pendapatan();
        $pendapatan->jenis_pendapatan = 'hewan terjual';
        $pendapatan->nominal = $hewan->harga;
        $pendapatan->keterangan = 'Penjualan hewan';
        $pendapatan->idAdmin = $idAdmin;
        $pendapatan->save();
    
        // Mengubah status hewan menjadi siap jual
        Hewan::where('idHewan', $hewan->idHewan)->update(['isReady' => true]);
    
        // Menghapus pesanan
        $pesanan->delete();
        
        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus');
    }
    
}
