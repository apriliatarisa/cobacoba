<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Barang extends Model
{
     use HasApiTokens, HasFactory, Notifiable;
    
   protected $table = 'barangs';
   protected $primaryKey = 'id_barang';
   protected $fillable=[
   'id_supplier',
   'nama_barang',
   'jumlah',
   'harga_beli',
   'harga_jual'];
   
   public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }
   
    public function transaksis()
    {
        return $this->belongsToMany(Transaksi::class, 'barang_transaksi');
    }

}