<?php

namespace App\Charts;

use App\Models\Pendapatan;
use App\Models\Pengeluaran;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class TotalPendapatanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $saldo = collect();

        $pendapatan = Pendapatan::selectRaw('SUM(nominal) as total, MONTH(created_at) as bulan')
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        $pengeluaran = Pengeluaran::selectRaw('SUM(nominal) as total, MONTH(created_at) as bulan')
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        foreach ($pendapatan as $bulan => $totalPendapatan) {
            $totalPengeluaran = $pengeluaran->get($bulan, 0);
            $saldo[$bulan] = $totalPendapatan - $totalPengeluaran;
        }

        $labels = [];
        $saldoData = [];
        foreach ($saldo as $bulan => $nilai) {
            $namaBulan = Carbon::create()->month($bulan)->format('F');
            $labels[] = $namaBulan;
            $saldoData[] = $nilai;
        }
        $formattedSaldoData = array_map(function ($nilai) {
            return 'Rp ' . number_format($nilai, 0, ',', '.');
        }, $saldoData);

        return $this->chart->barChart()
            ->setTitle('Grafik Saldo per Bulan')
            ->addData('Saldo', $saldoData)
            ->setXAxis($labels)
            ->setGrid(true)
            ->setLabels($formattedSaldoData);
    }
}
