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
        Schema::create('tbl_mobil', function (Blueprint $table) {
           $table->integer('id_mobil', true) ;
           $table->integer('id_kondisi') ;
           $table->string('merek');
           $table->string('biaya');

           $table->foreign('id_kondisi')->on('tbl_kondisi')
            ->references('id_kondisi')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_mobil');
    }
};
