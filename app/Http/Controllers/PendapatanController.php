<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendapatan;
use Carbon\Carbon;
use Mpdf\Mpdf;
use Barryvdh\DomPDF\Facade\Pdf;

class PendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortBy = $request->input('sort_by', 'terbaru');
        $query = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $pendapatans = Pendapatan::query();

        if ($query) {
            $pendapatans->where(function($q) use ($query) {
                $q->where('jenis_pendapatan', 'LIKE', "%{$query}%")
                  ->orWhere('keterangan', 'LIKE', "%{$query}%")
                  ->orWhere('nominal', 'LIKE', "%{$query}%");
            });
        }

        if ($startDate && $endDate) {
            $pendapatans->whereBetween('created_at', [$startDate, $endDate]);
        }

        $pendapatans = $pendapatans->orderBy('created_at', $sortBy == 'terlama' ? 'asc' : 'desc')->get();

        // Format the created_at date
        $pendapatans->map(function ($pendapatan) {
            $pendapatan->formatted_created_at = Carbon::parse($pendapatan->created_at)->format('d M Y');
            return $pendapatan;
        });

        return view('dasboard.pendapatan.index', compact('pendapatans', 'sortBy', 'query', 'startDate', 'endDate'));
    }

    public function exportPdf(Request $request)
    {
        $sortBy = $request->input('sort_by', 'terbaru');
        $query = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $pendapatans = Pendapatan::query();

        if ($query) {
            $pendapatans->where(function($q) use ($query) {
                $q->where('jenis_pendapatan', 'LIKE', "%{$query}%")
                  ->orWhere('keterangan', 'LIKE', "%{$query}%")
                  ->orWhere('nominal', 'LIKE', "%{$query}%");
            });
        }

        if ($startDate && $endDate) {
            $pendapatans->whereBetween('created_at', [$startDate, $endDate]);
        }

        $pendapatans = $pendapatans->orderBy('created_at', $sortBy == 'terlama' ? 'asc' : 'desc')->get();

        $pdf = PDF::loadView('dasboard.pendapatan.index', compact('pendapatans'));

        return $pdf->stream('pendapatan.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dasboard.pendapatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_pendapatan' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required'
        ]);

        $idAdmin = auth()->user()->idAdmin;
        Pendapatan::create([
            'jenis_pendapatan' => $request->jenis_pendapatan,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'idAdmin' => $idAdmin,
        ]);

        return redirect()->route('pendapatan.index')->with('success', 'Pendapatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pendapatan = Pendapatan::findOrFail($id);
        return view('pendapatan.show', compact('pendapatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idPendapatan)
    {
        $pendapatan = Pendapatan::findOrFail($idPendapatan);
        return view('dasboard.pendapatan.edit', compact('pendapatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idPendapatan)
    {
        $request->validate([
            'jenis_pendapatan' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required',
        ]);

        $pendapatan = Pendapatan::findOrFail($idPendapatan);
        $pendapatan->update($request->all());

        return redirect()->route('pendapatan.index')->with('success', 'Pendapatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idPendapatan)
    {
        $pendapatan = Pendapatan::findOrFail($idPendapatan);
        $pendapatan->delete();

        return redirect()->route('pendapatan.index')->with('success', 'Pendapatan berhasil dihapus.');
    }
}