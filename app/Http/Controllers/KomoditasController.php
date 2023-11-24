<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\komoditas;
use Illuminate\Validation\Rule;

class KomoditasController extends Controller
{
    public function index(){
        $data = array(
        'komoditas' => komoditas::all(),
        'kode' => komoditas::getAutoIncrementedValue(),
        );
        return view("komoditas.index", $data);
    }
    public function store(Request $request){
        $request->validate([
            'komoditas_kode'     => 'required|unique:komoditas', 
            'komoditas_nama'     => 'required|max:30'
        ]);
        komoditas::create([
            "komoditas_kode" => $request->komoditas_kode,
            "komoditas_nama" => $request->komoditas_nama
        ]);
        return redirect("komoditas")->with("success","Data Komoditas Berhasil di tambah");
    }
    public function show($id){
        $komoditas = komoditas::find($id);
        return view('komoditas.detail_komoditas', compact("komoditas"));
    }
    public function update(Request $request, $id){
        komoditas::where('id', $id)
        ->where('id', $id)
        ->update([
            'komoditas_nama' => $request->komoditas_nama,
        ]);
        return redirect("komoditas")->with("success","Data Komoditas Berhasil di edit");
    }

    public function destroy($id){
        komoditas::where("id", $id)->delete();
        return redirect("komoditas")->with("success","Data Berhasil dihapus");
    }
}
