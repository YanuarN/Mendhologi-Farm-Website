<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendapatan;
use App\Models\Pengeluaran;
use App\Charts\TotalPendapatanChart;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AdminLogin extends Controller
{

    public function index(TotalPendapatanChart $chart)
    {
        $pendapatan = Pendapatan::sum('nominal');
        $pengeluaran = Pengeluaran::sum('nominal');
        $totalPesanan = Pesanan::count();
        $totalUser = User::count();
        $saldo = $pendapatan - $pengeluaran;

        $chart = $chart->build();

        return view('dasboard.index', compact('pendapatan', 'pengeluaran', 'saldo', 'chart', 'totalPesanan', 'totalUser'));
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (FacadesAuth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'username' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ])->onlyInput('username');
    }
  
}
