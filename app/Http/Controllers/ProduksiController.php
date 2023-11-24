<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\komoditas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProduksiController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Produksi',
            'komoditas' => komoditas::all(),
            'produksi' => Produksi::join('komoditas', 'komoditas.komoditas_kode', '=', 'produsi.komoditas_kode')
                ->select('produsi.*', 'komoditas.komoditas_nama')
                ->orderBy('created_at', 'desc')->get(),
        );
        return view("produksi.index", $data);
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'tanggal' => 'required',
            'komoditas_kode' => [
                'required',
                Rule::unique('produsi')->where(function ($query) use ($request) {
                    return $query->where('tanggal', $request->tanggal); 
                })
            ],
            'jml_produksi' => 'required|numeric',
        ]); 
        Produksi::create([
            "tanggal" => $request->tanggal,
            "komoditas_kode" => $request->komoditas_kode,
            "jml_produksi" => $request->jml_produksi,
        ]);
        return redirect("produksi")->with("success", "Data produksi Berhasil di tambah");

    }

    public function show($id)
    {
        $p = Produksi::join('komoditas', 'komoditas.komoditas_kode', '=', 'produsi.komoditas_kode')
            ->select('produsi.*', 'komoditas.komoditas_nama')->find($id);
        $produksi = Produksi::find($id);
        return view('produksi.detail_produksi', compact("p"));
    }
    public function update(Request $request, $id)
    {
        Produksi::where('id', $id)
            ->where('id', $id)
            ->update([
                "tanggal" => $request->tanggal,
                "komoditas_kode" => $request->komoditas_kode,
                "jml_produksi" => $request->jml_produksi,
            ]);
        return redirect("produksi")->with("success", "Data Produksi Berhasil di edit");
    }

    public function destroy($id)
    {
        Produksi::where("id", $id)->delete();
        return redirect("produksi")->with("success", "Data Berhasil dihapus");
    }
}
