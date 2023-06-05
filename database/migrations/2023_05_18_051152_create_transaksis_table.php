<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_customer');
            
            $table->foreign('id_customer')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('nomor_transaksi');
            $table->timestamp('tanggal_transaksi');
            $table->integer('diskon');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
