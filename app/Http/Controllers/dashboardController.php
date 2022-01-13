<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran;
use App\Models\iuran;
use App\Models\datawarga;
use App\Models\datarumah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_iuran = iuran::sum('nominal');
        $total_pengeluaran = pengeluaran::sum('nominal');
        $saldo = $total_iuran-$total_pengeluaran;
        $jumlahwarga = datawarga::count('nama');
        $jumlahrumah = datarumah::count('nomor');



        return view('dashboard', [
            'saldo' => $saldo,
            'jumlahwarga' => $jumlahwarga,
            'jumlahrumah' => $jumlahrumah,
            'total_iuran' => $total_iuran,
            'total_pengeluaran' => $total_pengeluaran
        ]);
    }
}
