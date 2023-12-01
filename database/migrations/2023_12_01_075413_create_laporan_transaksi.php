<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_transaksi', function (Blueprint $table) {
        $table->unsignedInteger('id_laporan');
        $table->unsignedInteger('id_transaksi');
        $table->integer('total_transaksi');
        $table->foreign('id_laporan')->references('id_laporan')->on('laporans')->onUpdate('restrict')->onDelete('restrict');
        $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksis')->onUpdate('restrict')->onDelete('restrict');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_transaksi');
    }
};
