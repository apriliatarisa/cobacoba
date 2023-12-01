<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanTransaksi extends Model
{
    use HasFactory;

    protected $table = 'laporan_transaksi';
    // protected $primaryKey = 'id';
    protected $guarded =[];
    protected $fillable=[
        'id_transaksi',
       'id_laporan', 
        'total_transaksi',
        ];

    public function laporans(): BelongsTo
    {
        return $this->belongsTo(Laporan::class);
    }
    public $timestamps = false;
}
