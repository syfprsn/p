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
        Schema::create('Pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_transaksi')->constrained('transaksi');
            $table->date('waktu_pembayaran');
            $table->integer('total');
            $table->enum('metode',['tunai','transfer','dana','gopay','qris']);
            $table->string('bukti_pembayaran');
            $table->string('nomor_tujuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Detail_transaksi');
    }
};
