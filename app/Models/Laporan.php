<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporans';
    protected $primaryKey = 'id_laporan';
    protected $fillable=[
    'nama_laporan',
   ];


public function transaksis()
    {
        return $this->belongsToMany(Transaksi::class, 'barang_transaksi');
    }

}