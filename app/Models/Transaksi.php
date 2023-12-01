<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory;
   
    protected $table = 'transaksis';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['tgl_transaksi', 'id_user','items','total', 'tunai','kembali'];

public function barangs()
    {
        return $this->belongsToMany(Barang::class, 'barang_transaksi');
    }

public function laporans()
    {
        return $this->belongsToMany(Laporan::class, 'laporan_transaksi');
    }
}
