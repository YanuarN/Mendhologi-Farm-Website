<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluarans = Pengeluaran::all();
        return view('dasboard.pengeluaran.index', compact('pengeluarans'));
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
