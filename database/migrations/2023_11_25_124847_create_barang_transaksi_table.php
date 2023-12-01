<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('barang_transaksi', function (Blueprint $table) {
        $table->unsignedInteger('id_barang');
        $table->unsignedInteger('id_transaksi');
        $table->integer('jumlah');
        $table->integer('total_harga');
        $table->foreign('id_barang')->references('id_barang')->on('barangs')->onUpdate('restrict')->onDelete('restrict');
        $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksis')->onUpdate('restrict')->onDelete('restrict');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_transaksi');
    }
};
