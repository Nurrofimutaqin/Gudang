<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produksi;
use App\Models\komoditas;

class LaporanController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Produksi',
            'komoditas' => komoditas::all(),
            'produksi' => Produksi::join('komoditas', 'komoditas.komoditas_kode', '=', 'produsi.komoditas_kode')
                ->select(DB::raw('YEAR(produsi.tanggal) as tahun'), DB::raw('MONTH(produsi.tanggal) as bulan'), DB::raw('SUM(produsi.jml_produksi) as total'), DB::raw('komoditas.komoditas_nama'))
                ->whereBetween(DB::raw('MONTH(produsi.tanggal)'), [1, 12])
                ->groupBy('tahun', 'bulan', 'komoditas_nama')
                ->get(),
        );
        return view("laporan.index", $data);
    }

}
