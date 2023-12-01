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
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id_barang');
            $table->unsignedInteger('id_supplier');
            $table->string('nama_barang',255);
            $table->integer('jumlah');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->timestamps();

           $table->foreign('id_supplier')
                ->references('id_supplier')
                ->on('suppliers')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};