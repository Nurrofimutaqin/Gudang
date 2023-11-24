<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komoditas extends Model
{
    use HasFactory;
    protected $table = "komoditas";
    protected $fillable = ['komoditas_kode', 'komoditas_nama'];

    public static function getAutoIncrementedValue()
    {
        $lastRecord = self::orderBy('id', 'desc')->first();

        if (!$lastRecord) {
            return 'K001'; // Jika tidak ada record sebelumnya, mulai dari K0001
        }

        $lastValue = substr($lastRecord->komoditas_kode, 1); // Mengambil angka dari kode terakhir
        $newCode = 'K' . str_pad((int)$lastValue + 1, 3, '0', STR_PAD_LEFT); // Tambahkan 1 dan format ulang

        return $newCode;
    }
}
