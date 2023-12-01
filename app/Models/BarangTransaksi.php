<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangTransaksi extends Model
{
    use HasFactory;

    protected $table = 'barang_transaksi';
    // protected $primaryKey = 'id';
    protected $guarded =[];
    protected $fillable=[
        'id_transaksi',
        'id_barang',
        'jumlah',
        'total_harga'];

    public function barangs(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
