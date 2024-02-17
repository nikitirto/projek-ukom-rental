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
        Schema::create('tbl_kondisi', function (Blueprint $table) {
            $table->integer('id_kondisi', true);
            $table->integer('id_servis');
            $table->text('deskripsi');

            $table->foreign('id_servis')->on('tbl_servis')
            ->references('id_servis')->onDelete('cascade')->onUpdate('cascade');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_kondisi');
    }
};
