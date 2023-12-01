<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $table = 'suppliers';
    protected $primaryKey = 'id_supplier';
    protected $fillable = ['supplier','telp'];
    
    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}