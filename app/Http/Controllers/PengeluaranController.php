<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use Carbon\Carbon;

class PengeluaranController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->input('bulan');
        $sortBy = $request->input('sort_by', 'terbaru');
        $query = $request->input('search');
    
        $pengeluarans = Pengeluaran::query();
    
        if ($query) {
            $pengeluarans->where(function($q) use ($query) {
                $q->where('jenis_pengeluaran', 'LIKE', "%{$query}%")  // Ganti 'jenis_pendapatan' menjadi 'jenis_pengeluaran'
                  ->orWhere('keterangan', 'LIKE', "%{$query}%")
                  ->orWhere('nominal', 'LIKE', "%{$query}%");
            });
        }
    
        if ($bulan) {
            $tahun = substr($bulan, 0, 4);
            $bulan = substr($bulan, 5, 2);
            $pengeluarans->whereYear('created_at', $tahun)
                       ->whereMonth('created_at', $bulan);
        }
    
        $pengeluarans = $pengeluarans->orderBy('created_at', $sortBy == 'terlama' ? 'asc' : 'desc')->get();
    
        // Format the created_at date
        $pengeluarans->map(function ($pengeluaran) {
            $pengeluaran->formatted_created_at = Carbon::parse($pengeluaran->created_at)->format('d M Y');
            return $pengeluaran;
        });
        
        return view('dasboard.pengeluaran.index', compact('pengeluarans', 'sortBy', 'bulan', 'query'));
    }

    public function create()
    {
        return view('dasboard.pengeluaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_pengeluaran' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required'
        ]);

        $idAdmin = auth()->user()->idAdmin;
        Pengeluaran::create([
            'jenis_pengeluaran' => $request->jenis_pengeluaran,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'idAdmin' => $idAdmin,
        ]);

        return redirect()->route('pengeluaran.index')
            ->with('success', 'Pengeluaran berhasil ditambahkan.');
    }

    public function show($idPengeluaran)
    {
        $pengeluaran = Pengeluaran::findOrFail($idPengeluaran);
        return view('pengeluarans.show', compact('pengeluaran'));
    }

    public function edit($idPengeluaran)
    {
        $pengeluaran = Pengeluaran::findOrFail($idPengeluaran);
        return view('pengeluarans.edit', compact('pengeluaran'));
    }

    public function update(Request $request, $idPengeluaran)
    {
        $request->validate([
            'jenis_pengeluaran' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required',
        ]);

        $pengeluaran = Pengeluaran::findOrFail($idPengeluaran);
        $pengeluaran->update($request->all());

        return redirect()->route('pengeluarans.index')
            ->with('success', 'Pengeluaran berhasil diperbarui.');
    }

    public function destroy($idPengeluaran)
    {
        $pengeluaran = Pengeluaran::findOrFail($idPengeluaran);
        $pengeluaran->delete();

        return redirect()->route('pengeluarans.index')
            ->with('success', 'Pengeluaran berhasil dihapus.');
    }
}
