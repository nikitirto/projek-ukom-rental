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
        Schema::create('tbl_customer', function (Blueprint $table) {
            $table->integer('id_customer', true);
            $table->integer('id_user');
            $table->text('alamat_rumah');
            $table->text('foto_ktp');
            $table->string('nama_lengkap');
            $table->integer('kode_pos');
            $table->integer('no_telp');

            $table->foreign('id_user')->on('tbl_user')
            ->references('id_user')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_customer');
    }
};
