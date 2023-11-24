<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;
    
    protected $table = "produsi";
    protected $fillable = ['tanggal', 'komoditas_kode', 'jml_produksi'];
}
