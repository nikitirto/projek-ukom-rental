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
        Schema::create('tbl_sewa', function (Blueprint $table) {
            $table->integer('id_sewa', true);
            $table->integer('id_customer');
            $table->integer('id_mobil');
            $table->integer('id_rek');
            $table->date('tgl_sewa');
            $table->date('tgl_kembali');
            $table->date('tgl_transaksi');

            $table->foreign('id_customer')->on('tbl_customer')
            ->references('id_customer')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_mobil')->on('tbl_mobil')
            ->references('id_mobil')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_rek')->on('tbl_rekening')
            ->references('id_rek')->onDelete('cascade')->onUpdate('cascade');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sewa');
    }
};
